<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->library('session');
    $this->load->model('m_form');
    $this->load->helper('date');

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

    $this->load->view('tampilan_form',$data);
  }

  function input($a, $b)
  {
    //$a = urldecode($this->uri->segment(4));

    $this->m_form->get_subarea($a, $b);
    $data['standard']= $this->m_form->get_standard($b);
    //$data['id_standard']=$this->session->userdata('id_standard');
    //$data['pertanyaan']=$this->session->userdata('pertanyaan');
    $data['nama_area']=$this->session->userdata('nama_area');
    $data['nama_subarea']=$this->session->userdata('nama_subarea');
    $data['attendant']= $this->m_form->get_attendant();
    //$data['standard']=$this->m_form->get_standard();

    $duplicat = $this->m_form->cek($a, $b);

    $this->load->library('javascript');
    if(!empty($duplicat))
    {
      //load notifikasi sukses
      $data['duplikat']  = '
      <div class="alert alert-danger"><p><strong>Form penilaian area dan subarea ini sudah diisi hari ini</strong></p></div>';
      $this->load->view('tampilan_form',$data);
    }
    else
    {
      //load notifikasi sukses
      $data['kosong']  = '
      <div class="alert alert-success"><p><strong>Silahkan isi form</strong></p></div>';
      $this->load->view('tampilan_form',$data);
    }
  }

  function ceksubmit(){

    $datestring = '%Y-%m-%d';
    $time = time();
    $nama_area = $this->session->userdata('nama_area'); //$this->session->userdata('nama_area');
    $nama_subarea = $this->session->userdata('nama_subarea'); //$this->session->userdata('nama_subarea');
    $this->m_form->get_id($nama_area, $nama_subarea);
    $id_area = $this->session->userdata('id_area');
    $id_subarea = $this->session->userdata('id_subarea');
    $attendant = $this->input->post('attendant');
    $totalSum = $this->input->post('presentase');
    $kotin = $this->input->post('kotin');
    $pentin = $this->input->post('pentin');
    $tinlan = $this->input->post('tinlan');
    $penlan = $this->input->post('penlan');
    $date = mdate($datestring, $time);
    $data = array(
      'id_area' => $id_area,
      'id_subarea' => $id_subarea,
      'kode_tinjauan' => $kotin,
      'penjelasan' => $pentin,
      'tindak_lanjut' => $tinlan,
      'oleh' => $penlan,
      'tanggal' => $date,
      'skor' => $totalSum
    );
    $this->m_form->get_id_att($attendant);
    $id_att = $this->session->userdata('id_attendant');
    var_dump($id_att);
    var_dump($attendant);
    var_dump($date);
    $insert = $this->m_form->insert('penilaian', $data);
    $data1 = array(
      'id_penilaian' => $insert,
      'id_karyawan' => $id_att
    );
    $insert1 = $this->db->insert('job', $data1);

    if($this->db->affected_rows() > 0)
    {
      $data2 = array(
        'id_karyawan' => $id_att,
        'area' => $nama_area,
        'subarea' => $nama_subarea,
        'id_area' => $id_area,
        'id_subarea' => $id_subarea,
        'nama_karyawan' =>$this->m_form->get_nama_karyawan($id_att)
      );
      $this->load->view('tampilan_sukses',$data2);
    }
  }

}
