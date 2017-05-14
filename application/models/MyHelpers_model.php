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
    $query = $this->db->query('SELECT * FROM '. $table);
    $options = '';
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

}
