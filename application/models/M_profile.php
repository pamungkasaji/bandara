<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_profile extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function insert_image($data, $id){
    $this->db->update('karyawan', $data, array('id_karyawan' => $id));
  }

}
