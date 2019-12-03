<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Mod_Platillo extends CI_Model {
    
        // Constructor
        public function __construct()
        {
            parent::__construct();
            $this->db->initialize();
        }

        // Obtiene el listado de platillos
        public function Listado($pagina)
        {
            $this->db->select('
                *,
                (
                    select
                        count(pi_id_platillo)
                    from
                        platillos_ingredientes
                    where
                    pi_id_platillo = pa_id                 
                ) as totalIngredientes
            ');
            $this->db->limit(PAGINACION_REGISTROS_POR_PAGINA, $pagina);
            $query = $this->db->get("platillos");
    
            if ($query->num_rows() > 0) 
            {
                // var_dump($query->result_array());
                return $query->result_array();
            }    

            return false;
        }

        // Obtiene la información de un platillo
        public function Obtener($id)
        {
            $this->db->select('
                *,
                (
                    select
                        count(pi_id_platillo)
                    from
                        platillos_ingredientes
                    where
                    pi_id_platillo = pa_id                 
                ) as totalIngredientes
            ');

            $response = 
                $this->db
                    ->from('usuarios')
                    ->where("pa_id = $id")
                    ->get('platillos');
    
            return ($response->num_rows() > 0) ? $response->row(0) : false;
        }

        // Obtiene el total de registros de platillos
        public function Total()
        {
            return $this->db->count_all("platillos");
        }

        // ELimina un platillo
        public function Eliminar($id)
        {
            $response = array(
                'message' => 'No se pudo eliminar el platillo',
                'done' => false
            );

            $platillo = $this->Obtener($id);
            if ($platillo){
                    $this->db->where('pa_id', $id);
                    $this->db->delete('platillos');

                    $response['message'] = 'Se eliminó el platillo';
                    $response['done'] = true;
            }else
                $response['message'] = ' No existe el platillo que intenta eliminar';
            
            return $response;
        }

        // Guarda un platillo
        public function Guardar()
        {
            $response = array(
                'done' => false,
                'message' => 'Llene todos los campos solicitados'
            );

            $values = $this->input->post();
            // var_dump($values);
            
            if($this->Existe($values['pa_id'], $values['pa_nombre'], $values['pa_descripcion'], $values['pa_precio'], $values['pa_id_tipo_comida'])){
                $response['message'] = 'Ya existe un platillo con los datos que indico';
                return $response;
            }

            if($values['pa_id'] == 0){
                $this->db->insert('platillos', $values);
            }else{
                $this->db->where('pa_id', $values['pa_id']);
                $this->db->update('platillos', $values);
            }

            $response['message'] = 'Se guardó la información del platillo';
            $response['done'] = true;

            return $response;
        }
    
        // Verifica si existe un platillo 
        public function Existe($id, $nombre, $descripcion, $precio, $tipo_comida)
        {
            $existe = 
                (
                    $this->db
                        ->where("pa_nombre='".strtoupper($nombre)."' and pa_descripcion = '".strtoupper($descripcion)."' and pa_precio = '".strtoupper($precio)."' and pa_id_tipo_comida = '".strtoupper($tipo_comida)."' and pa_id <> '".$id."'")
                        ->get("platillos")->num_rows() > 0
                );

            return $existe;                
        }

    }
    
    /* End of file Mod_platillo.php */