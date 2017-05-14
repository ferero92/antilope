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
    $view = $this->session->flashdata('view');
    if(!(isset($view)))
    {
      $view = 'login_view';
    }
    $this->help->lViews($view);
  }

  public function login()
  {
    $view = null;
    $type = $this->Login_model->check_user($this->input->post('cod_user'), $this->input->post('password'));
    if(!isset($type))
    {
      $this->session->set_flashdata('login_error', 'Usuario o contraseña incorrectos');
    }
    elseif($type == 6)
    {
      redirect('Admin');
    }
    else
    {
      $view = 'welcome_message';
    }
    $this->session->set_flashdata('view', $view);
    redirect('Main');
  }

}
