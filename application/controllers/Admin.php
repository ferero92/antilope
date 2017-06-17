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
    if($this->session->userdata('user_type') != 6) redirect('Main');

    $panel = $this->session->flashdata('panel');
    if(!isset($panel)) $panel = 'admin_view';

    $this->help->lViews($panel);
  }

  public function panel()
  {
    $submit = $this->input->post('submit');
    $action_user_type = $this->input->post('action_user_type');
    $string = 'admin/';
    switch ($submit)
    {
      case '1':
        $string .= 'insert';
        $onloadfunction = 'jsInsert('.$action_user_type.')';
        break;
      case '2':
        $string .= 'modify';
        $onloadfunction = "jsStaffFloor('".base_url('Panel/rooms')."'), jsInsert(".$action_user_type.")";
        if($action_user_type == 1) $onloadfunction .= ", jsAutocomplete('".base_url('Admin/match')."')";
        break;
      case '3':
        $string .= 'password';
        $onloadfunction = '';
        break;
      case '4':
        $string .= 'delete';
        break;
    }
    $array = array(
      'panel' => $string . '_view',
      'onloadfunction' => $onloadfunction,
      'action_user_type' => $action_user_type
    );
    $this->session->set_flashdata($array);
    redirect('Admin');
  }

  public function person()
  {
    $data = $this->input->post('data');
    switch (count($data))
    {
      case 1:
        echo $this->Admin_model->staff_data($data[0]);
        break;
      case 2:
        echo $this->Admin_model->patient_data($data[0], $data[1]);
        break;
    }
  }

  public function match($match){ echo $this->Admin_model->staff_match($match); }

  public function insert($action)
  {
    $data = $this->input->post();
    $table = '';
    $insert = true;
    if($action == 1)
    {
      $data['hash'] = $this->help->generateHash('123');
      $table = 'Personal_Sanitario';
    }
    elseif($action == 2)
      $table = 'Pacientes';
    else
      $insert = false;
    if($insert)
      $this->db->insert($table, $data);
    redirect('Admin');
  }

  public function modify($action)
  {
    $data = $this->input->post();

    $submit = $data['submit'];
    unset($data['submit']);

    $table = '';
    $modify = true;
    if($action == 1)
    {
      $table = 'Personal_Sanitario';
    }
    elseif ($action == 2)
    {
      $table = 'Pacientes';
    }
    else $modify = false;
    if($modify)
    {
      $this->db->where('id', $data['id']);
      ($submit == 1)? $this->db->update($table, $data) : $this->db->delete($table);
    }
    redirect('Admin');
  }

  public function changePassword()
  {
    $user = $this->input->post('user');
    $password = $this->input->post('password');
    $hash = $this->help->generateHash($password);
    $data = array(
      'hash' => $hash
    );
    $this->db->where('email', $user);
    $this->db->update('Personal_Sanitario', $data);
    redirect('Admin');
  }

}
