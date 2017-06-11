<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panel extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model('Panel_model');
  }

  function index()
  {
    $user_id = $this->session->userdata('user_id');
    if(!isset($user_id)) redirect('Main');
    $view = $this->session->userdata('view');
    if(!isset($view))
      $view = 'staff/staff_view';
    $this->help->lViews($view);
  }

  public function panel()
  {
    $view = null;
    $submit = $this->input->post('submit');

    switch ($submit) {
      case '1':
        $view = 'staff/insert_constants_view';
        $this->session->set_flashdata('onloadfunction', "jsStaffFloor('".base_url('Panel/rooms')."')");
        break;
      case '2':
        $view = 'staff/constants_view';
        $this->session->set_flashdata('onloadfunction', "jsStaffFloor('".base_url('Panel/rooms')."')");
        break;
      case '3':
        $view = 'staff/medication_view';
        $this->session->set_flashdata('onloadfunction', "js");
        break;
    }
    $this->session->set_flashdata('view', $view);
    redirect('Panel');
  }

  public function insert()
  {
    $this->Panel_model->insert_constants($this->input->post());
    redirect('Panel');
  }

  public function rooms($floor){ echo $this->Panel_model->rooms_in_floor($floor); }

  public function beds($room){ echo $this->Panel_model->beds_in_room($room); }

  public function patients($room, $bed){ echo $this->Panel_model->patient_in_bed($room, $bed); }

  public function modal($room, $bed){ echo $this->help->medical_record($room, $bed); }

  public function constants($room, $bed)
  {
    echo $this->Panel_model->constants_of($room, $bed);
  }

}
