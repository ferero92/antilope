  <section class="container">
    <div class="my-login">
      <form action="<?php echo base_url('Main/login') ?>" class="form-horizontal" method="post">
        <div class="form-group">
          <label for="user" class="control-label col-sm-2">
            Usuario:
          </label>
          <div class="col-sm-10">
            <input type="text" name="cod_user" class="form-control">
          </div>
        </div>
        <div class="form-group">
          <label for="password" class="control-label col-sm-2">
            Contraseña:
          </label>
          <div class="col-sm-10">
            <input type="password" name="password" class="form-control">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" name="submit" class="btn my-btn">
              Iniciar sesión
            </button>
          </div>
        </div>
      </form>
      <span>
        <?php echo $this->session->flashdata('login_error'); ?>
      </span>
    </div>
  </section>
