<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardBulanan extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_dashboard_bulanan');
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
      $o = $this->input->post('dari');
      $s = $this->input->post('sampai');
      if(!$o){$p='1970-01-01';
      $data['dari'] = '';}else{$p =$o . "-01";
      $data['dari'] = $o;};
      if(!$s){$x='2020-01-01';
      $data['sampai'] = '';}else{$x =$s . "-01";
      $data['sampai'] = $s;};

      $data['session']  = $this->session->all_userdata();
      $data['logo'] = $this->m_dashboard_bulanan->ambil_gambar($this->session->userdata('id_karyawan'));
      $data['subsub'] = $this->m_dashboard_bulanan->pie_subarea($p, $x);
      $data['subnew'] = $this->m_dashboard_bulanan->pie_subarea_area($c, $p, $x);
      $data['data_area'] = $this->m_dashboard_bulanan->pie_area($p, $x);
      $data['line_sub'] = $this->m_dashboard_bulanan->line_subarea($c,$uu,$p,$x);
      $data['line_area'] = $this->m_dashboard_bulanan->line_area($c,$p,$x);
      $data['are'] = $this->m_dashboard_bulanan->ambil_area();
      $data['karyawan'] = $this->m_dashboard_bulanan->karyawan_rating($p,$x);
      $data['max_area'] = $this->m_dashboard_bulanan->get_max_area($p,$x);
      $data['min_area'] = $this->m_dashboard_bulanan->get_min_area($p,$x);
      $data['total_satisfied'] = $this->m_dashboard_bulanan->get_total($p,$x);
      $data['karmax'] = $this->m_dashboard_bulanan->karyawan_rating_max($p,$x);
      //$data['gambar'] = $this->m_login->ambil_gambar();
    $coba = $this->m_dashboard_bulanan->pie_subarea_area($c,$p,$x);
      //var_dump($coba);
    $data['skortanggal'] = $this->m_dashboard_bulanan->select_skor($p,$x);
    if (isset($c)){$data['area'] = $this->m_dashboard_bulanan->get_area($c);}
    if (isset($uu)){$data['subarea'] = $this->m_dashboard_bulanan->get_subarea($uu);}

    $level  = $this->session->userdata('level');
    if ($level != 'supervisor') {
      $message = "Anda tidak memiliki akses ke halaman ini";
      echo "<script type='text/javascript'>alert('$message') ;</script>";
      echo "<a href=\"javascript:history.go(-1)\">KEMBALI</a>";
    }else{
      $this->Navbar_model->view_loader('tampilan_dashboard_bulanan', $data);
      $datestring = '%Y-%m-%d';
      $time = time();
      $second_date = mdate($datestring, $time);
      $times = $this->time = date('Y-m-d', strtotime("-$p day", time()));
  }


  function get_subselect(){
    if ($this->input->post('getarea')){
      echo $this->m_dashboard_bulanan->getsubselect($this->input->post('getarea'));
    }
  }



}
