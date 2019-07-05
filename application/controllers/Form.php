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
    $this->load->view('tampilan_form',$data);
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
    $hasil = $this->input->post('hasil');
    $date = mdate($datestring, $time);
    $data = array(
        'id_area' => $id_area,
        'id_subarea' => $id_subarea,
        'kode_tinjauan' => $kotin,
        'penjelasan' => $pentin,
        'tindak_lanjut' => $tinlan,
        'oleh' => $penlan,
        'tanggal' => $date,
        'hasil' => $hasil,
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
        'id_karyawan' => '1'
    );
    $insert1 = $this->db->insert('job', $data1);
  }

}
