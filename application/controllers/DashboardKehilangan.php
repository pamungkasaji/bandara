<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardKehilangan extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model(array('Navbar_model'));
    $this->load->model(array('Model_kehilangan'));
    $this->load->model(array('m_dashboard'));

    if(!$this->session->userdata('username'))
    {
      redirect('Login');
    }
    $this->load->helper(array('form', 'url','download'));

    $level  = $this->session->userdata('level');
    if ($level != 'supervisor') {
      $message = "Anda tidak memiliki akses ke halaman ini";
      echo "<script type='text/javascript'>alert('$message') ;javascript:history.go(-1)</script>";
      //echo "<a href=\"javascript:history.go(-1)\">KEMBALI</a>";
    }
  }

  function index()
  {
    $data['session']  = $this->session->all_userdata();
    $data['logo'] = $this->m_dashboard->ambil_gambar($this->session->userdata('id_karyawan'));
    $data["tabel"] = $this->Model_kehilangan->get_tabel();
    
    $this->Navbar_model->view_loader('tampilan_dashboard_kehilangan', $data);

  }

}
