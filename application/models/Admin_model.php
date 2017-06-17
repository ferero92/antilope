<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function staff_data($id)
  {
    $query = $this->db->get_where('Personal_Sanitario', array('id' => $id));

    $row = $query->row();

    $data = array(
      'id' => $row->id,
      'nombre' => $row->nombre,
      'apellido1' => $row->apellido1,
      'apellido2' => $row->apellido2,
      'email' => $row->email
    );

    $select = array(
      'tipo' => $this->help->select('Tipos', $row->tipo),
      'planta' => $this->help->select('Plantas', $row->planta)
    );

    $result = array(
      'data' => $data,
      'select' => $select
    );

    return json_encode($result);
  }

  public function patient_data($room, $bed)
  {
    $query = $this->db->get_where('Pacientes', array('habitacion' => $room, 'numero_cama' => $bed));

    $row = $query->row();

    $data = array(
      'id' => $row->id,
      'nombre' => $row->nombre,
      'apellido1' => $row->apellido1,
      'apellido2' => $row->apellido2,
      'edad' => $row->edad,
      'diagnostico' => $row->diagnostico,
      'ayuda_wc' => $row->ayuda_wc
    );

    $select = array(
      'genero' => $this->help->select('Generos', $row->genero),
      'dieta' => $this->help->select('Dietas', $row->dieta),
      'movilidad' => $this->help->select('Movilidad', $row->movilidad)
    );

    $result = array(
      'data' => $data,
      'select' => $select
    );

    return json_encode($result);
  }

  public function staff_match($match)
  {
    $statement = 'SELECT * FROM Personal_Sanitario WHERE UPPER(nombre) LIKE UPPER("%'.$match.'%") OR UPPER(apellido1) LIKE UPPER("%'.$match.'%") OR UPPER(apellido2) LIKE UPPER("%'.$match.'%")';
    $query = $this->db->query($statement);

    $string = '';

    foreach ($query->result() as $row)
    {
      $string .=  '<p class="autocomplete-option" onclick="optionAutocomplete(this, jsFillData, '."'".base_url('Admin/person')."'".')" data-id="'.$row->id.'">'.
                    $row->nombre . ' ' . $row->apellido1 . ' ' . $row->apellido2 .
                  '</p>';
    }
    return $string;
  }

}
