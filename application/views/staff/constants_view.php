<section>
  <div class="container">
    <form class="form-inline my-form-frb" method="post">
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
        <select name="numero_cama" class="form-control" onchange="jsConstants('<?php echo base_url("Panel/patients") . "', '" . base_url("Panel/modal") . "', '" . base_url("Panel/constants"); ?>')">
        </select>
      </div>
    </form>
    <span class="modal-record">Paciente: <strong id="patient"></strong></span>
    <div id="showConstants" class="my-form-hidden">
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
      <div id="constantChart">
        <ul class="nav nav-tabs">
          <li data-id="1" onclick="jsLoadCharts(this, '<?php echo base_url('Panel/c_constantes/'); ?>')"><a>Pulsaciones</a></li>
          <li data-id="2" onclick="jsLoadCharts(this, '<?php echo base_url('Panel/c_constantes/'); ?>')"><a>Tensión arterial</a></li>
          <li data-id="3" onclick="jsLoadCharts(this, '<?php echo base_url('Panel/c_constantes/'); ?>')"><a>Saturación</a></li>
          <li data-id="4" onclick="jsLoadCharts(this, '<?php echo base_url('Panel/c_constantes/'); ?>')"><a>Temperatura</a></li>
        </ul>
        <canvas id="chart"></canvas>
      </div>
    </div>
  </section>
