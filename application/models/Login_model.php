<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function check_user($email, $password)
  {
    $query = $this->db->get_where('Personal_Sanitario', array('email' => $email));
    $row = $query->row();

    if(isset($row) && password_verify($password, $row->hash))
    {
      return $row;
    }
  }

}
