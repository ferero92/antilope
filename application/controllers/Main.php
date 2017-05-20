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
    $user = $this->Login_model->check_user($this->input->post('cod_user'), $this->input->post('password'));
    $user_data = array(
      'user_id' => $user->id,
      'user_type' => $user->tipo
    );
    $this->session->set_userdata($user_data);
    if(!isset($user))
    {
      $this->session->set_flashdata('login_error', 'Usuario o contraseña incorrectos');
    }
    elseif($user->tipo == 6)
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
