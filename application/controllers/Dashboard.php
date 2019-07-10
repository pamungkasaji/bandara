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
    $nav['username']     = $this->session->userdata('username');
    $nav['level']    = $this->login_m->getLevel($nav['username']);
    $nav['logo'] = $this->m_dashboard->ambil_gambar($this->session->userdata('id_karyawan'));
    $nav['id_user'] = $this->session->userdata('id_karyawan');
    $data['subsub'] = $this->m_dashboard->pie_subarea();
    $data['data_area'] = $this->m_dashboard->pie_area();
    //$data['gambar'] = $this->m_login->ambil_gambar();
    //var_dump($data['gambar']);
    $data['skortanggal'] = $this->m_dashboard->select_skor();
    $data['area'] = $this->m_dashboard->ambil_area();
    $nama_areas = $this->input->post('getarea');
    $this->load->view('template/head');
    $this->load->view('template/nav_header',$nav);
    $this->load->view('tampilan_dashboard',$data);
    $this->load->view('template/footer');
    //var_dump($date);
  }

  function update_piesubarea(){
    $c = $this->input->post('getarea');
    $uu = $this->input->post('getsubarea');
    $data['session']  = $this->session->all_userdata();
    $nav['username']     = $this->session->userdata('username');
    $nav['level']    = $this->login_m->getLevel($nav['username']);
    $nav['logo'] = $this->m_dashboard->ambil_gambar($this->session->userdata('id_karyawan'));
    $nav['id_user'] = $this->session->userdata('id_karyawan');
    $data['subsub'] = $this->m_dashboard->update_pie_subarea($c, $uu);
    $data['data_area'] = $this->m_dashboard->pie_area();
    //$data['gambar'] = $this->m_login->ambil_gambar();
    //var_dump($data['gambar']);
    $data['skortanggal'] = $this->m_dashboard->select_skor();
    $data['area'] = $this->m_dashboard->ambil_area();
    $nama_areas = $this->input->post('getarea');
    $this->load->view('template/head');
    $this->load->view('template/nav_header',$nav);
    $this->load->view('tampilan_dashboard',$data);
    $this->load->view('template/footer');
  }

  function get_subselect(){
    if ($this->input->post('getarea')){
      echo $this->m_dashboard->getsubselect($this->input->post('getarea'));
    }
  }



}
