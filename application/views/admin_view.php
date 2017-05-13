  <section class="container">
    <table id="table_staff" class="table table-condensed">
      <thead>
        <tr>
          <th>
            Nombre
          </th>
          <th>
            Apellido1
          </th>
          <th>
            Apellido2
          </th>
          <th>
            cod_usuario
          </th>
          <th>
            tipo
          </th>
        </tr>
      </thead>
      <tbody>
        <?php echo $this->session->flashdata('tableUsers'); ?>
      </tbody>
    </table>
  </section>
