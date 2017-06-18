  <section>
    <div class="container my-login">
      <form class="form-horizontal" action="<?php echo base_url('Admin/panel') ?>" method="post">
        <div class="my-radio">
          <label class="radio-inline">
            <input type="radio" value="1" name="action_user_type" checked>Personal Sanitario
          </label>
          <label class="radio-inline">
            <input type="radio" value="2" name="action_user_type">Pacientes
          </label>
        </div>
        <div class="col-sm-4 col-xs-12">
          <button type="submit" name="submit" value="1" class="btn my-btn-menu my-btn-insert">
            Insertar
          </button>
        </div>
        <div class="col-sm-4 col-xs-12">
          <button type="submit" name="submit" value="2" class="btn my-btn-menu my-btn-modify">
            Modificar
          </button>
        </div>
        <div class="col-sm-4 col-xs-12">
          <button type="submit" name="submit" value="3" class="btn my-btn-menu my-btn-passwd">
            Cambiar contraseña
          </button>
        </div>
      </form>
    </div>
  </section>
