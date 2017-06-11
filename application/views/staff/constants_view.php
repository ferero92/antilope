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
        <select name="numero_cama" class="form-control" onchange="jsConstants('<?php echo base_url("Panel/patients") . "', '" . base_url("Panel/modal") . "', '" . base_url("Panel/constants"); ?>')">
        </select>
      </div>
    </form>
    <span class="modal-record">Paciente: <strong id="patient"></strong></span>
    <div id="showConstants">
      <table class="table table-condensed">
        <thead>
          <tr>
            <th>Pulsaciones</th>
            <th>Tensión DIA</th>
            <th>Tensión SIS</th>
            <th>Saturación</th>
            <th>Temperatura</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Observaciones</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
  </section>
