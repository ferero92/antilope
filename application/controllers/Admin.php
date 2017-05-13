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
    $tableUsers = $this->Admin_model->tableUsers();
    $this->session->set_flashdata('tableUsers', $tableUsers);
    $this->session->set_flashdata('view', 'admin_view');
    redirect('Main');
  }

}
