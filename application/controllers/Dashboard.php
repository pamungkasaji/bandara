<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_dashboard');
    $this->load->model('login_m');
    if(!$this->session->userdata('username'))
    {
      redirect('Login');
    }
    $this->load->helper(array('form', 'url','download'));
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $data['session']  = $this->session->all_userdata();
    $username     = $this->session->userdata('username');
    $data['level']    = $this->login_m->getKodeDivisi($username);
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
