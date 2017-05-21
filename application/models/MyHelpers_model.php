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

  public function generatePassword($string)
  {
    $options = [
      'cost' => 12,
    ];
    return password_hash($string, PASSWORD_DEFAULT, $options);
  }

}
