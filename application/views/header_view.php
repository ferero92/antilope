<body onload="<?php echo $this->session->flashdata('onloadfunction'); ?>">
  <header>
    <div class="container">
      <p id="logout">
        <a href="">Panel de control</a>
        <span> | </span>
        <a href="<?php echo base_url('Main/logout'); ?>">Cerrar sessión</a>
      </p>
      <h1>
        Antilope
      </h1>
    </div>
  </header>
