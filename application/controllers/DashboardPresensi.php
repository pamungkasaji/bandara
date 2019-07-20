<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardPresensi extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model(array('Navbar_model'));
    $this->load->model(array('Model_presensi'));
    $this->load->model(array('m_dashboard'));
  }

  function index()
  {
    $x = $this->input->post('tanggal');
    $data['session']  = $this->session->all_userdata();
    $data['logo'] = $this->m_dashboard->ambil_gambar($this->session->userdata('id_karyawan'));
    $data["tabel"] = $this->Model_presensi->get_tabel($x);

    $level  = $this->session->userdata('level');
    if ($level != 'supervisor') {
      $message = "Anda tidak memiliki akses ke halaman ini";
      echo "<script type='text/javascript'>alert('$message') ;</script>";
      echo "<a href=\"javascript:history.go(-1)\">KEMBALI</a>";
    }else{
      $this->Navbar_model->view_loader('tampilan_dashboard_presensi', $data);
    }
    
  }

}
