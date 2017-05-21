<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model('Admin_model');
  }

  function index()
  {
    if($this->session->userdata('user_type') != 6)
      redirect('Main');
    $panel = $this->session->flashdata('panel');
    if(!isset($panel))
    {
      $panel = 'admin_view';
    }
    $this->help->lViews($panel);
  }

  public function panel()
  {
    $submit = $this->input->post('submit');
    $action_user_type = $this->input->post('action_user_type');
    $this->session->set_flashdata('action_user_type', $action_user_type);
    $string = 'admin/';
    switch ($submit)
    {
      case '1':
        $string .= 'insert';
        $onloadfunction = "jsInsert('". $action_user_type ."')";
        break;
      case '2':
        $string .= 'modify';
        break;
      case '3':
        $string .= 'password';
        break;
      case '4':
        $string .= 'delete';
        break;
    }
    $array = array(
      'panel' => $string . '_view',
      'onloadfunction' => $onloadfunction
    );
    $this->session->set_flashdata($array);
    redirect('Admin');
  }

  public function insert($action)
  {
    $data_insert = $this->input->post();
    $table = '';
    $insert = true;
    if($action == 1)
    {
      $data_insert['password'] = $this->help->generatePassword('123');
      $table = 'Personal_Sanitario';
    }
    else if($action == 2)
      $table = 'Pacientes';
    else
      $insert = false;
    if($insert)
      $this->db->insert($table, $data_insert);
    redirect('Admin');
  }

}
