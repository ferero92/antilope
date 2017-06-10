<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panel_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function rooms_in_floor($floor)
  {
    $query = $this->db->get_where('Habitaciones', array('planta' => $floor));
    $string = '<option>--Seleccione habitación--</option>';

    foreach ($query->result() as $row) {
      $string .= '<option value="'.$row->id.'">'.$row->id.'</option>';
    }
    return $string;
  }

  public function beds_in_room($room)
  {
    $query = $this->db->get_where('Habitaciones', array('id' => $room));
    $string = '<option>--Seleccione cama--</option>';

    $row = $query->row();
    for ($i=1; $i <= $row->numero_camas; $i++) {
      $string .= '<option value="'.$i.'">'.$i.'</option>';
    }
    return $string;
  }

  public function patient_in_bed($room, $bed)
  {
    $parameters = array(
      'habitacion' => $room,
      'numero_cama' => $bed
     );
     $query = $this->db->get_where('Pacientes', $parameters);

     $patient = $query->row();
     $this->session->set_flashdata('patient', $patient);

     return $patient->nombre .' '. $patient->apellido1 .' '. $patient->apellido2;
  }

}
