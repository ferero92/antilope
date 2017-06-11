<body onload="<?php echo $this->session->flashdata('onloadfunction'); ?>">
  <header>
    <div class="jumbotron">
      <h1>
        Antilope
      </h1>
      <span id="logout">
        <a href="">Panel de control </a>
        <a href="<?php echo base_url('Main/logout'); ?>">| Cerrar sessión</a>
      </span>
    </div>
  </header>
