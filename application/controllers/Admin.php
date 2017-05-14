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
    // $tableUsers = $this->Admin_model->tableUsers();
    // $this->session->set_flashdata('tableUsers', $tableUsers);
    $this->help->lViews('admin_view');
  }

  public function panel()
  {
    $submit = $this->input->post('submit');
    $this->session->set_flashdata('type', $this->input->post('type'));
    $string = 'Admin/';
    switch ($submit)
    {
      case '1':
        $string .= 'insert';
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
    redirect($string);
  }

  public function insert($data)
  {
    if(isset($data))
    {

    }
    $this->help->lViews('admin/insert_view');
  }

}
