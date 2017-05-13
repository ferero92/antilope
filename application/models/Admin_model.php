<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function tableUsers()
  {
    $table = 'Tipos';
    $tableUsers = '';
    $options = $this->help->select($table, 1);
    $tableUsers .=  '<tr>'.
                      '<td>'.
                        '<input class="form-control" name="nombre" value="">'.
                      '</td>'.
                      '<td>'.
                        '<input class="form-control" name="apellido1" value="">'.
                      '</td>'.
                      '<td>'.
                        '<input class="form-control" name="apellido2" value="">'.
                      '</td>'.
                      '<td>'.
                        '<input class="form-control" name="cod_usuario" value="">'.
                      '</td>'.
                      '<td>'.
                        '<select class="form-control" name="tipo">'.
                          $options .
                        '</select>'.
                      '</td>'.
                      '<td>'.
                        '<a>'.
                          '<span class="glyphicon glyphicon-plus"></span>'.
                        '</a>'.
                      '</td>'.
                    '</tr>';
    $sql = 'SELECT * FROM Personal_Sanitario WHERE tipo <> 6';
    $query = $this->db->query($sql);
    if(isset($query))
    {
      foreach ($query->result() as $row)
      {
        $options = $this->help->select($table, $row->tipo);
        $tableUsers .=  '<tr>'.
                          '<td>'.
                            '<input class="form-control" name="nombre" value="'. $row->nombre .'">'.
                          '</td>'.
                          '<td>'.
                            '<input class="form-control" name="nombre" value="'. $row->apellido1 .'">'.
                          '</td>'.
                          '<td>'.
                            '<input class="form-control" name="nombre" value="'. $row->apellido2 .'">'.
                          '</td>'.
                          '<td>'.
                            '<input class="form-control" name="nombre" value="'. $row->cod_usuario .'">'.
                          '</td>'.
                          '<td>'.
                            '<select class="form-control" name="tipo">'.
                              $options .
                            '</select>'.
                          '</td>'.
                          '<td>'.
                            '<a>'.
                              '<span class="glyphicon glyphicon-pencil"></span>'.
                            '</a>'.
                          '</td>'.
                          '<td>'.
                            '<a>'.
                              '<span class="glyphicon glyphicon-remove"></span>'.
                            '</a>'.
                          '</td>'.
                        '</tr>';
      }
    }
    return $tableUsers;
  }

  public function addUser($values)
  {
    
  }

}
