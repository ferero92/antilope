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
     $this->session->set_userdata('patient', $patient->id);

     return $patient->nombre .' '. $patient->apellido1 .' '. $patient->apellido2;
  }

  public function insert_constants($data)
  {
    $data['fecha'] = date("Y-m-d");
    $data['hora'] = date("h:i:s");
    $data['paciente'] = $this->session->userdata('patient');
    $data['personal'] = $this->session->userdata('user_id');

    return $this->db->insert('Constantes_Vitales', $data);
  }

  public function constants_of($room, $bed)
  {
    $query = $this->db->query('SELECT * FROM Constantes_Vitales c, Pacientes p WHERE c.paciente = p.id AND p.habitacion = '.$room.' AND p.numero_cama = '.$bed.' ORDER BY c.fecha, c.hora DESC');
    $string = '';
    foreach ($query->result() as $row) {
      $string .=  '<tr>'.
                    '<td>'.$row->pulsaciones.'</td>'.
                    '<td>'.$row->tension_diastolica.'</td>'.
                    '<td>'.$row->tension_sistolica.'</td>'.
                    '<td>'.$row->saturacion.'</td>'.
                    '<td>'.$row->temperatura.'</td>'.
                    '<td>'.$row->fecha.'</td>'.
                    '<td>'.$row->hora.'</td>'.
                    '<td>'.$row->observaciones.'</td>'.
                  '</tr>';
    }
    return $string;
  }

  public function chart($type)
  {
    if($type == 'tension') {
      $statement = 'SELECT fecha, tension_diastolica AS dia, tension_sistolica AS sis FROM Constantes_Vitales WHERE paciente = ' . $this->session->userdata('patient');
      $query = $this->db->query($statement);

      $labels = array();
      $dia = array();
      $sis = array();

      foreach ($query->result() as $row) {
        $labels[] = $row->fecha;
        $dia[] = $row->dia;
        $sis[] = $row->sis;
      }

      $data = array(
        'dia' => $dia,
        'sis' => $sis
      );
    }

    else {
      $statement = 'SELECT fecha, '.$type.' AS cons FROM Constantes_Vitales WHERE paciente = ' . $this->session->userdata('patient');
      $query = $this->db->query($statement);

      $labels = array();
      $data = array();

      foreach ($query->result() as $row) {
        $labels[] = $row->fecha;
        $data[] = $row->cons;
      }
    }
    return array('labels' => $labels, 'data' => $data);
  }

}
