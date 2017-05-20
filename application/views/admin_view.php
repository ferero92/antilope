  <section class="container">
    <form class="" action="<?php echo base_url('Admin/panel') ?>" method="post">
      <div>
        <label class="radio-inline">
          <input type="radio" value="1" name="action_user_type" checked>Personal Sanitario
        </label>
        <label class="radio-inline">
          <input type="radio" value="2" name="action_user_type">Pacientes
        </label>
      </div>
      <div class="col-md-3 col-xs-6">
        <button type="submit" name="submit" value="1" class="btn btn-lg">
          Insertar
        </button>
      </div>
      <div class="col-md-3 col-xs-6">
        <button type="submit" name="submit" value="2" class="btn btn-lg">
          Modificar
        </button>
      </div>
      <div class="col-md-3 col-xs-6">
        <button type="submit" name="submit" value="3" class="btn btn-lg">
          Cambiar contraseña
        </button>
      </div>
      <div class="col-md-3 col-xs-6">
        <button type="submit" name="submit" value="4" class="btn btn-lg">
          Eliminar
        </button>
      </div>
    </form>
  </section>
