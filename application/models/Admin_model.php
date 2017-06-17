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
      'ayuda_wc' => $row->ayuda_wc,
      'habitacion' => $row->habitacion,
      'numero_cama' => $row->numero_cama
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

  public function select_a_bed()
  {
    $statement = 'SELECT p.id AS id, COUNT(h.planta) AS count FROM Habitaciones h, Plantas p WHERE h.planta = p.id GROUP BY h.planta';
    $query = $this->db->query($statement);

    $string = '';

    foreach ($query->result() as $row) {
      $string .= '<div data-id="'.$row->id.'" class="sab-planta row hidden">';
      $subquery = $this->db->get_where('Habitaciones', array('planta' => $row->id));
      foreach ($subquery->result() as $room) {
        $string .= '<div data-id="'.$room->id.'" class="sab-habitacion col-xs-6">'.
                      '<p>Nº '.$room->id.'</p>';

        $statement = 'SELECT h.id AS id, COUNT(p.habitacion) AS ocupadas, h.numero_camas AS camas FROM Habitaciones h, Pacientes p WHERE h.id = p.habitacion AND h.id = '.$room->id.' GROUP BY p.habitacion';
        $ocupadas = $this->db->query($statement);
        $a = $ocupadas->row();

        for ($i=0; $i < $room->numero_camas; $i++) {
          if(!isset($a)) {
            $string .= '<img class="sab-img-a" src="'.base_url('images/bed_available.svg').'" />';
          }
          elseif($a->ocupadas == 2) {
            $string .= '<img class="sab-img-o" src="'.base_url('images/bed_ocuppied.svg').'" />';
          }
          elseif ($a->ocupadas == 1) {
            $querypaciente = $this->db->get_where('Pacientes', array('habitacion' => $room->id));
            $paciente = $querypaciente->row();
            if($paciente->numero_cama == $i +1) {
              $string .= '<img class="sab-img-o" src="'.base_url('images/bed_ocuppied.svg').'" />';
            }
            else {
              $string .= '<img class="sab-img-a" src="'.base_url('images/bed_available.svg').'" />';
            }
          }
        }
        $string .= '</div>';
      }
      $string .= '</div>';
    }
    $result = array(
      'floors' => $this->help->select('Plantas', 0),
      'table' => $string
    );
    return json_encode($result);
  }

}
