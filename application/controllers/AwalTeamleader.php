<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AwalTeamleader extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->library('session');
    $this->load->model('login_m');
    $this->load->model('m_form');
    $this->load->helper('date');
    header('Cache-Control: no cache'); //no cache

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

  function index()
  {
    $data['nama_area'] = $this->session->userdata('nama_area');
    $data['nama_subarea'] = $this->session->userdata('nama_subarea');
    $data['attendant']= $this->m_form->get_attendant();
    $data['logo'] = $this->login_m->ambil_gambar($this->session->userdata('id_karyawan'));
    $data['session']  = $this->session->all_userdata();

    $this->load->view('tampilan_awal',$data);
  }

}
