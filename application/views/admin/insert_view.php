  <section class="container">
    <h1>
      Insertar
    </h1>
    <form class="form-horizontal" action="<?php echo base_url('Admin/insert') ?>" method="post">
      <div class="form-group">
        <label for="first_name" class="control-label col-sm-2">Nombre: </label>
        <div class="col-sm-10">
          <input type="text" name="first_name" class="form-control">
        </div>
      </div>
      <div class="form-group">
        <label for="last_name1" class="control-label col-sm-2">Apellido 1: </label>
        <div class="col-sm-10">
          <input type="text" name="last_name1" class="form-control">
        </div>
      </div>
      <div class="form-group">
        <label for="last_name2" class="control-label col-sm-2">Apellido 2: </label>
        <div class="col-sm-10">
          <input type="text" name="last_name2" class="form-control">
        </div>
      </div>
      <div class="form-group tipo1">
        <label for="type" class="control-label col-sm-2">Tipo de usuario: </label>
        <div class="col-sm-10">
          <select class="form-control" name="type">
            <?php echo $this->help->select('Tipos', 1) ?>
          </select>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button class="btn btn-primary" type="submit">Insertar</button>
        </div>
      </div>
    </form>
  </section>
