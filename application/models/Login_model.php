<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function check_user($cod_user, $password)
  {
    $options = [
      'cost' => 12,
      'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM)
    ];

    $this->db->select('tipo, id');
    $this->db->from('Personal_Sanitario');
    $this->db->where('cod_usuario', $cod_user);
    $this->db->where('password', $password);
    //$this->db->where('password', password_hash($password, PASSWORD_BCRIPT, $options));

    $query = $this->db->get();
    $row = $query->row();

    if(isset($row))
    {
      // return $row->tipo;
      return $row;
    }
  }

}
