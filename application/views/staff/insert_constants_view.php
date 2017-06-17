    <section>
      <div class="container">
        <form class="form-inline" method="post">
          <div class="form-group">
            <label for="floor">Planta:</label>
            <select class="form-control" name="planta" onchange="jsChangeFloor('<?php echo base_url("Panel/rooms"); ?>')">
              <?php echo $this->help->select('Plantas', $this->session->userdata('user_floor')); ?>
            </select>
          </div>
          <div class="form-group">
            <label for="room">Número de habitación:</label>
            <select name="habitacion" class="form-control" onchange="jsComboBeds('<?php echo base_url("Panel/beds"); ?>')">
            </select>
          </div>
          <div class="form-group">
            <label for="bed">Número de cama:</label>
            <select name="numero_cama" class="form-control" onchange="jsPatient('<?php echo base_url("Panel/patients") . "', '" . base_url("Panel/modal"); ?>')">
            </select>
          </div>
        </form>
        <span class="modal-record">Paciente: <strong id="patient"></strong></span>
        <form class="form-horizontal" action="<?php echo base_url('Panel/insert'); ?>" method="post">
          <div class="form-group">
            <label for="pulsaciones" class="control-label col-sm-2">Pulsaciones:</label>
            <div class="col-sm-10">
              <input type="number" name="pulsaciones" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label for="tension-dia" class="control-label col-sm-2">Tensión DIA:</label>
            <div class="col-sm-10">
              <input type="number" name="tension_diastolica" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label for="tension-sis" class="control-label col-sm-2">Tensión SIS:</label>
            <div class="col-sm-10">
              <input type="number" name="tension_sistolica" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label for="saturacion" class="control-label col-sm-2">Saturación:</label>
            <div class="col-sm-10">
              <input type="number" name="saturacion" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label for="temperatura" class="control-label col-sm-2">Temperatura:</label>
            <div class="col-sm-10">
              <input type="number" name="temperatura" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label for="observaciones" class="control-label col-sm-2">Observaciones:</label>
            <div class="col-sm-10">
              <textarea class="form-control ohf" name="observaciones" rows="5"></textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button class="btn btn-primary" type="submit">Insertar</button>
            </div>
          </div>
        </form>
      </div>
    </section>
