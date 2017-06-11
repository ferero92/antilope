<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MyHelpers_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function select($table, $index)
  {
    $query = $this->db->get($table);
    $options = '<option value="">--Selecciona valor--</option>';
    $i = 1;
    foreach ($query->result() as $row)
    {
      $options .= '<option value="'. $row->id .'"';
      if($index == $i)
      {
        $options .=  ' selected';
      }
      $options .= '>' . $row->descripcion . '</option>';
      $i++;
    }
    return $options;
  }

  public function lViews($view)
  {
    $this->load->view('head_view');
    $this->load->view('header_view');
    $this->load->view($view);
    $this->load->view('footer_view');
  }

  function limpiarString($string)
  {
    $string = trim($string);
    $string = str_replace(
        array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
        array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
        $string
    );
    $string = str_replace(
        array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
        array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
        $string
    );
    $string = str_replace(
        array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
        array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
        $string
    );
    $string = str_replace(
        array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
        array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
        $string
    );
    $string = str_replace(
        array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
        array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
        $string
    );
    $string = str_replace(
        array('ñ', 'Ñ', 'ç', 'Ç'),
        array('n', 'N', 'c', 'C',),
        $string
    );
    return $string;
  }

  public function generateHash($string)
  {
    return password_hash($string, PASSWORD_DEFAULT);
  }

  public function medical_record($room, $bed)
  {
    $statement = 'SELECT nombre, apellido1, apellido2, edad, diagnostico, g.descripcion AS genero, d.descripcion AS dieta, m.descripcion AS movilidad, p.ayuda_wc AS wc FROM Pacientes p, Generos g, Dietas d, Movilidad m WHERE p.genero = g.id AND p.dieta = d.id AND p.movilidad = m.id AND p.habitacion = '.$room.' AND p.numero_cama = '.$bed;
    $query = $this->db->query($statement);
    $row = $query->row();

    $wc = 'Sí';
    if($row->wc == 0) $wc = 'No';

    $string =   '<div class="row">'.
                  '<div class="col-xs-6 right">'.
                    '<p>Edad:</p>'.
                  '</div>'.
                  '<div class="col-xs-6">'.
                    '<p>'.$row->edad.'</p>'.
                  '</div>'.
                '</div>'.
                '<div class="row">'.
                  '<div class="col-xs-6 right">'.
                    '<p>Género:</p>'.
                  '</div>'.
                  '<div class="col-xs-6">'.
                    '<p>'.$row->genero.'</p>'.
                  '</div>'.
                '</div>'.
                '<div class="row">'.
                  '<div class="col-xs-6 right">'.
                    '<p>Dieta:</p>'.
                  '</div>'.
                  '<div class="col-xs-6">'.
                    '<p>'.$row->dieta.'</p>'.
                  '</div>'.
                '</div>'.
                '<div class="row">'.
                  '<div class="col-xs-6 right">'.
                    '<p>Movilidad:</p>'.
                  '</div>'.
                  '<div class="col-xs-6">'.
                    '<p>'.$row->movilidad.'</p>'.
                  '</div>'.
                '</div>'.
                '<div class="row">'.
                  '<div class="col-xs-6 right">'.
                    '<p>Ayuda WC:</p>'.
                  '</div>'.
                  '<div class="col-xs-6">'.
                    '<p>'.$wc.'</p>'.
                  '</div>'.
                '</div>'.
                '<div class="row">'.
                  '<div class="col-xs-6 right">'.
                    '<p>Diagnóstico:</p>'.
                  '</div>'.
                  '<div class="col-xs-6">'.
                    '<p>'.$row->diagnostico.'</p>'.
                  '</div>'.
                '</div>';
    return $string;
  }

}
