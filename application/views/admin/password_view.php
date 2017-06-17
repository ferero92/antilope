  <section class="container">
    <h1>
      Cambiar contraseña
    </h1>
    <form action="<?php echo base_url('Admin/changePassword'); ?>" class="form-horizontal" method="post">
      <div class="form-group">
        <label for="user" class="control-label col-sm-2">Nombre de usuario:</label>
        <div class="col-sm-10">
          <input type="text" name="user" class="form-control" required>
        </div>
      </div>
      <div class="form-group">
        <label for="oldpass" class="control-label col-sm-2">Contraseña actual:</label>
        <div class="col-sm-10">
          <input type="password" name="oldpassword" class="form-control" required>
        </div>
      </div>
      <div class="form-group">
        <label for="newpass" name="newpass" class="control-label col-sm-2">Nueva contraseña:</label>
        <div class="col-sm-10">
          <input type="password" name="newpassword" class="form-control" onkeyup="jsChangePassword()" required>
        </div>
      </div>
      <div class="form-group">
        <label for="password" class="control-label col-sm-2">Confirmar contraseña:</label>
        <div class="col-sm-10">
          <input type="password" name="password" class="form-control" onkeyup="jsChangePassword()" required>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button class="btn btn-primary" type="submit" disabled>Cambiar contraseña</button>
        </div>
      </div>
    </form>
  </section>
