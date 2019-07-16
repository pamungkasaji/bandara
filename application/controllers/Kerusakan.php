<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kerusakan extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model(array('Model_kerusakan'));
  }

  function input($a, $b, $c){
    $data['id_karyawan'] = $a;
    $data['nama_karyawan'] = $this->Model_presensi->get_nama($a);
    $data['area'] = $b;
    $data['subarea'] = $c;
    $this->session->set_userdata($data);
    $this->load->view('form_kerusakan', $data);
  }

}
