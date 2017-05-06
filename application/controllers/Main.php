<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model('Login_model');
  }

  public function index()
  {
    $this->load->view('header_view');
    $this->load->view('login_view');
    $this->load->view('footer_view');
  }

  public function login()
  {
    $type = $this->Login_model->check_user($this->input->post('cod_user'), $this->input->post('password'));
    if($type == null)
    {
      $this->session->set_flashdata('login_error', 'Usuario o contraseña incorrectos');
      redirect('Main');
    }
    elseif($type == 6)
    {
      $this->load->view('admin_view');
    }
    else
    {
      $this->session->set_flashdata('user_type', $type);
      $this->load->view('welcome_message');
    }
  }

}
