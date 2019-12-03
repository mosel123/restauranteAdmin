<div class="row mb-5">
    <div class="col-12 col-md-8">
        <h2>
            <?php echo($platillo->pa_id != 0 ? 'Modificar' : 'Crear'); ?> Platillo
        </h2>
        <span>
            Llena toda la información que se solicita
        </span>
    </div>
    <div class="col-12 col-md-4">
        <div class="btn-group">
            <a href="<?php echo base_url() ?>Platillo/Index" class="btn btn-secondary btn-sm">
                <span class="fas fa-backspace"></span>
                Regresar
            </a>
        </div>
    </div>
</div>
<div class="row">
    <?php
        if(isset($response)):
    ?>  
        <div class="alert alert-danger text-center col-12">
            <?php echo($response['message']); ?>
        </div>
    <?php
        endif;
    ?>
</div>
<div class="container">
<div class="row">
    <form method="POST" action="<?php echo(base_url('Platillo/Guardar')); ?>" class="col">
        <div class="form-group row">
            <div class="col-12">
                <label for="platillo" class="">
                    Nombre de platillo
                </label>
            </div>
            <div class="col-12">
                <input type="text" class="form-control" id="platillo" placeholder="Hamburguesa" required name="pa_nombre" value="<?php echo($platillo->pa_nombre); ?>" autocomplete="off">
                <input type="hidden" readonly="readonly" name="pa_id"  value="<?php echo($platillo->pa_id); ?>">
                <small class="form-text text-muted">
                    Obligatorio
                </small>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12">
                <label for="precio" class="">
                   Precio
                </label>
            </div>
            <div class="col-12 col-md-3">
                <input type="text" class="form-control" id="precio" placeholder="$0.00" required name="pa_precio" value="<?php echo($platillo->pa_precio); ?>">
                <small class="form-text text-muted">
                    Obligatorio
                </small>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12">
                <label for="tipo_comida" class="">
                   Tipo de comida
                </label>
            </div>
            <div class="col-12 col-md-6">
                <select class="custom-select" type="text" class="form-control" id="tipo_comida" placeholder="COMIDA" required name="pa_id_tipo_comida" value="<?php echo($platillo->pa_id_tipo_comida); ?>">
                    <option selected>Selecciona tipo de comida</option>
                    <option value="8">DESAYUNO</option>
                    <option value="9">MERIENDA</option>
                    <option value="10">COMIDA</option>
                    <option value="11">COLACIÓN</option>
                </select>
                <small class="form-text text-muted">
                    Obligatorio
                </small>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12">
                <label for="descripcion" class="">
                   Descripción
                </label>
            </div>
            <div class="col-12 col-md-12">
                <textarea type="text" class="form-control" id="descripcion" placeholder="Poner carne en un pan" required name="pa_descripcion" value="<?php echo($platillo->pa_descripcion); ?>"></textarea>
                <small class="form-text text-muted">
                    Obligatorio
                </small>
            </div>
        </div>
        <div class="form-group row">
            <div class="col">
                <button type="submit" class="btn btn-primary">
                    Guardar
                </button>
            </div>
        </div>
    </form>
    <div class="col">
      <h2 class="mb-5">Ingredientes</h2>
      <form>
        <div class="row">
          <div class="col-6">
            <div class="form-group">
                <label>Ingrediente</label>
                <select class="custom-select" type="text" class="form-control" id="tipo_comida" placeholder="COMIDA" required name="pa_id_tipo_comida" value="<?php echo($platillo->pa_id_tipo_comida); ?>">
                    <option selected>Selecciona ingrediente</option>
                    <option>x</option>
                    <option>y</option>
                    <option>z</option>
                </select>
            </div>
          </div>
          <div class="col-4">
            <div class="form-group">
                <label for="">Cantidad</label>
                <input type="text" class="form-control" id="cantidad" placeholder="10" required name="in_unidad">
            </div>
          </div>
      </form>
      <button type="submit" class="btn btn-primary float-right mt-4 mb-3">Agregar</button>
    </div>
    <!--Tabla de ingredientes-->
    <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">Ingrediente</th>
          <th scope="col">Cantidad</th>
          <th scope="col">Acciones</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Pan</td>
          <td>2</td>
          <td>
            <button type="button" class="btn btn-primary btn-sm"><span class="fas fa-pencil-alt"></span></button>
            <button type="button" class="btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
</div>
</div>