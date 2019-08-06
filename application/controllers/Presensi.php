<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Presensi extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->library('session');
    $this->load->model('login_m');
    $this->load->model(array('Model_presensi'));
    header('Cache-Control: no cache'); //no cache
    $this->load->helper('date');

    if(!$this->session->userdata('id_karyawan'))
    {
      redirect('Login');
    }
    $this->load->helper(array('form', 'url','download'));

    $level  = $this->session->userdata('level');
    if ($level != 'teamleader') {
      $message = "Anda tidak memiliki akses ke halaman ini";
      echo "<script type='text/javascript'>alert('$message') ;javascript:history.go(-1)</script>";
      //echo "<a href=\"javascript:history.go(-1)\">KEMBALI</a>";
    }
  }

  function input($a, $b, $c){
    $data['id_karyawan'] = $a;
    $data['nama_karyawan'] = $this->Model_presensi->get_nama($a);
    $data['area'] = $b;
    $data['subarea'] = $c;
    $this->session->set_userdata($data);
    $data['logo'] = $this->login_m->ambil_gambar($this->session->userdata('id_karyawan'));
    $data['session']  = $this->session->all_userdata();

    $this->load->view('form_presensi', $data);
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
      'logo' => $this->login_m->ambil_gambar($this->session->userdata('id_karyawan')),
      'session' => $this->session->all_userdata(),
      'nama_karyawan' =>$this->Model_presensi->get_nama($x)
    );
    $this->load->view('tampilan_sukses', $data);
  }
}
