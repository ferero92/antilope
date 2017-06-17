  <section class="container">
    <h1>
      Insertar
    </h1>
    <form class="form-horizontal" action="<?php echo base_url('Admin/insert/' . $this->session->flashdata('action_user_type')) ?>" method="post">
      <div class="form-group">
        <label for="first_name" class="control-label col-sm-2">Nombre: </label>
        <div class="col-sm-10">
          <input type="text" name="nombre" class="form-control" required>
        </div>
      </div>
      <div class="form-group">
        <label for="last_name1" class="control-label col-sm-2">Apellido 1: </label>
        <div class="col-sm-10">
          <input type="text" name="apellido1" class="form-control" required>
        </div>
      </div>
      <div class="form-group">
        <label for="last_name2" class="control-label col-sm-2">Apellido 2: </label>
        <div class="col-sm-10">
          <input type="text" name="apellido2" class="form-control" required>
        </div>
      </div>
      <div class="form-group tipo1">
        <label for="email" class="control-label col-sm-2">Email: </label>
        <div class="col-sm-10">
          <input type="email" name="email" class="form-control" required>
        </div>
      </div>
      <div class="form-group tipo1">
        <label for="type" class="control-label col-sm-2">Tipo de usuario: </label>
        <div class="col-sm-10">
          <select class="form-control" name="tipo" required>
            <?php echo $this->help->select('Tipos', 0); ?>
          </select>
        </div>
      </div>
      <div class="form-group tipo2">
        <label for="age" class="control-label col-sm-2">Edad: </label>
        <div class="col-sm-10">
          <input type="number" name="edad" class="form-control" required>
        </div>
      </div>
      <div class="form-group tipo2">
        <label for="gender" class="control-label col-sm-2">Género: </label>
        <div class="col-sm-10">
          <select name="genero" class="form-control" required>
            <?php echo $this->help->select('Generos', 0); ?>
          </select>
        </div>
      </div>
      <input type="number" name="habitacion" class="form-control hidden" required>
      <input type="number" name="numero_cama" class="form-control hidden" required>
      <div class="form-group tipo2">
        <label for="diet" class="control-label col-sm-2">Dieta: </label>
        <div class="col-sm-10">
          <select name="dieta" class="form-control" required>
            <?php echo $this->help->select('Dietas', 0); ?>
          </select>
        </div>
      </div>
      <div class="form-group tipo2">
        <label for="move" class="control-label col-sm-2">Movilidad: </label>
        <div class="col-sm-10">
          <select name="movilidad" class="form-control" required>
            <?php echo $this->help->select('Movilidad', 0); ?>
          </select>
        </div>
      </div>
      <div class="form-group tipo2">
        <div class="col-sm-offset-2 col-sm-10">
          <div class="checkbox">
            <label for="wc">
              <input type="checkbox" name="ayuda_wc">Ayuda WC
            </label>
          </div>
        </div>
      </div>
      <div class="form-group tipo2">
        <div class="col-sm-offset-2 col-sm-10">
          <p class="select-bed">Seleccione habitación <strong></strong></p>
        </div>
      </div>
      <div class="form-group tipo2">
        <label for="diagnosis" class="control-label col-sm-2">Diagnóstico: </label>
        <div class="col-sm-10">
          <textarea name="diagnostico" rows="5" class="form-control ohf" required></textarea>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button class="btn btn-primary" type="submit">Insertar</button>
        </div>
      </div>
    </form>
  </section>
