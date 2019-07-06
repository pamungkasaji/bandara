<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_dashboard');
    $this->load->model('m_login');
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $data['username'] = $this->m_login->ambil_username();
    $data['gambar'] = $this->m_login->ambil_gambar();
    //var_dump($data['gambar']);
    $data['skortanggal'] = $this->m_dashboard->select_skor();
    $this->load->view('tampilan_dashboard',$data);
    //var_dump($date);
  }

  function getData(){
    $data = $this->m_dashboard->select_skor();
    echo json_encode($skor);

  }



}
