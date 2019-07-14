<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_dashboard');
    $this->load->model(array('Navbar_model'));
    date_default_timezone_set('Asia/Jakarta');
    if(!$this->session->userdata('username'))
    {
      redirect('Login');
    }
    $this->load->helper(array('form', 'url','download'));
    //Codeigniter : Write Less Do More
  }

  function index()
  {
      $c = $this->input->post('getarea');
      $uu = $this->input->post('getsubarea');
      $p = $this->input->post('jumlah');
      $data['session']  = $this->session->all_userdata();
      $data['logo'] = $this->m_dashboard->ambil_gambar($this->session->userdata('id_karyawan'));
      $data['subsub'] = $this->m_dashboard->pie_subarea($p);
      $data['subnew'] = $this->m_dashboard->pie_subarea_area($c, $p);
      $data['data_area'] = $this->m_dashboard->pie_area($p);
      $data['line_sub'] = $this->m_dashboard->line_subarea($c,$uu,$p);
      $data['line_area'] = $this->m_dashboard->line_area($c,$p);
      $data['are'] = $this->m_dashboard->ambil_area();
      $data['karyawan'] = $this->m_dashboard->karyawan_rating($p);
      $data['max_area'] = $this->m_dashboard->get_max_area($p);
      $data['min_area'] = $this->m_dashboard->get_min_area($p);
      $data['total_satisfied'] = $this->m_dashboard->get_total($p);
      $data['karmax'] = $this->m_dashboard->karyawan_rating_max($p);
      //$data['gambar'] = $this->m_login->ambil_gambar();
      $coba = $this->m_dashboard->pie_subarea_area($c,$p);
      //var_dump($coba);
      $data['skortanggal'] = $this->m_dashboard->select_skor($p);
      if (isset($c)){$data['area'] = $this->m_dashboard->get_area($c);}
      if (isset($uu)){$data['subarea'] = $this->m_dashboard->get_subarea($uu);}
      $this->Navbar_model->view_loader('tampilan_dashboard', $data);
      $datestring = '%Y-%m-%d';
      $time = time();
      $second_date = mdate($datestring, $time);
      $times = $this->time = date('Y-m-d', strtotime("-$p day", time()));

  }


  function get_subselect(){
    if ($this->input->post('getarea')){
      echo $this->m_dashboard->getsubselect($this->input->post('getarea'));
    }
  }



}
