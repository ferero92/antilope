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
    $this->load->view('head_view');
    $this->load->view('header_view');
    $this->load->view($view);
    $this->load->view('footer_view');
  }

  public function login()
  {
    $view = null;
    $type = $this->Login_model->check_user($this->input->post('cod_user'), $this->input->post('password'));
    if($type == null)
    {
      $this->session->set_flashdata('login_error', 'Usuario o contraseña incorrectos');
    }
    elseif($type == 6)
    {
      $view = 'admin_view';
    }
    else
    {
      $view = 'welcome_message';
    }
    $this->session->set_flashdata('view', $view);
    redirect('Main');
  }

}
