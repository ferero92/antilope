  <section class="container my-border">
    <div class="my-form">
      <h1>Modificar</h1>
      <form class="form-horizontal tipo1">
        <div class="form-group">
          <label for="staff" class="control-label col-sm-2">Personal:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="autocomplete" autocomplete="off" placeholder="Escribe nombre para buscar">
          </div>
        </div>
      </form>
      <form class="form-inline tipo2 my-form-frb" method="post">
        <div class="form-group">
          <label for="floor">Planta:</label>
          <select class="form-control" name="planta" onchange="jsChangeFloor('<?php echo base_url("Panel/rooms"); ?>')">
            <?php echo $this->help->select('Plantas', $this->session->userdata('user_floor')); ?>
          </select>
        </div>
        <div class="form-group">
          <label for="room">Habitación:</label>
          <select name="habitacion" class="form-control" onchange="jsComboBeds('<?php echo base_url("Panel/beds"); ?>')">
          </select>
        </div>
        <div class="form-group">
          <label for="bed">Cama:</label>
          <select name="numero_cama" class="form-control" onchange="jsModify('<?php echo base_url("Admin/person") . "', '" . base_url("Admin/select_bed"); ?>')">
          </select>
        </div>
      </form>
      <form class="form-horizontal my-form-hidden" action="<?php echo base_url('Admin/modify/' . $this->session->flashdata('action_user_type')) ?>" method="post">
        <input type="text" name="id" class="hidden">
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
          <label for="type" class="control-label col-sm-2">Tipo: </label>
          <div class="col-sm-10">
            <select class="form-control" name="tipo" onchange="jsFloor()" required>
            </select>
          </div>
        </div>
        <div class="form-group tipo1">
          <label for="floor" class="control-label col-sm-2">Planta: </label>
          <div class="col-sm-10">
            <select class="form-control" name="planta" required>
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
        <input type="number" name="habitacion" class="tipo2 hidden">
        <input type="number" name="numero_cama" class="tipo2 hidden">
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
          <div class="col-sm-offset-2 col-sm-2 col-xs-6">
            <button class="btn my-btn-modify" type="submit" name="submit" value="1">Modificar</button>
          </div>
          <div class="col-sm-8 col-xs-6">
            <button class="btn my-btn-delete" type="submit" name="submit" value="2">Eliminar</button>
          </div>
        </div>
      </form>
    </div>
  </section>
