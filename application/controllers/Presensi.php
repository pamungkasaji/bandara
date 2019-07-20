<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Presensi extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model(array('Model_presensi'));
    $this->load->helper('date');
  }

  function input($a, $b, $c){
    $data['id_karyawan'] = $a;
    $data['nama_karyawan'] = $this->Model_presensi->get_nama($a);
    $data['area'] = $b;
    $data['subarea'] = $c;
    $this->session->set_userdata($data);

    $level  = $this->session->userdata('level');
    if ($level != 'teamleader') {
      $message = "Anda tidak memiliki akses ke halaman ini";
      echo "<script type='text/javascript'>alert('$message') ;</script>";
      echo "<a href=\"javascript:history.go(-1)\">KEMBALI</a>";
    }else{
      $this->load->view('form_presensi', $data);
    }
  }

  function submit($x){
    $area = $this->input->post('area');
    $subarea = $this->input->post('subarea');
    $tanggal = $this->input->post('tanggal');
    $status = $this->input->post('absen');
    $data = array(
      'id_karyawan' => $x,
      'area' => $area,
      'subarea' => $subarea,
      'tgl_absensi' => $tanggal,
      'status' => $status
    );
    $this->Model_presensi->insert('absen_mangkir', $data);
    $data = array(
      'id_karyawan' => $x,
      'area' => $area,
      'subarea' => $subarea,
      'nama_karyawan' =>$this->Model_presensi->get_nama($x)
    );
    $this->load->view('tampilan_sukses', $data);
  }
}
