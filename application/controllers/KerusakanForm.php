<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KerusakanForm extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->library('session');
    $this->load->model('login_m');
    $this->load->model(array('Model_kerusakan'));
    header('Cache-Control: no cache'); //no cache
    $this->load->helper('date');
    $this->load->helper(array('form', 'url'));

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

  function input($a, $b, $c){
    $data['id_karyawan'] = $a;
    $data['nama_karyawan'] = $this->Model_kerusakan->get_nama($a);
    $data['area'] = $b;
    $data['subarea'] = $c;
    $this->session->set_userdata($data);
    $data['logo'] = $this->login_m->ambil_gambar($this->session->userdata('id_karyawan'));
    $data['session']  = $this->session->all_userdata();


    $this->load->view('Form_kerusakan', $data);
  }

  public function aksi_upload($x){
    $gambar=$_FILES['gambar']['name'];
    $area = $this->input->post('area');
    $subarea = $this->input->post('subarea');
    $tanggal = $this->input->post('tanggal');
    $keterangan = $this->input->post('keterangan');
    $data['logo'] = $this->login_m->ambil_gambar($this->session->userdata('id_karyawan'));
    $data['session']  = $this->session->all_userdata();

    if ($gambar=''){}else{

      $config['upload_path']          = './gambar/';
      $config['allowed_types']        = 'gif|jpg|png|jpeg';
      $config['file_name']            = 'kerusakan/'.$tanggal.'/'.$subarea;
      $config['max_size']             = 2000;
      $config['max_width']            = 1920;
      $config['max_height']           = 1280;

      $this->load->library('upload', $config);

      if ( ! $this->upload->do_upload('gambar')){
        $data = array(
          'id_karyawan' => $x,
          'area' => $area,
          'subarea' => $subarea,
          'logo' => $this->login_m->ambil_gambar($this->session->userdata('id_karyawan')),
          'session' => $this->session->all_userdata(),
          'nama_karyawan' =>$this->Model_kerusakan->get_nama($x),
          'error' => $this->upload->display_errors()
        );
        $this->load->view('tampilan_sukses', $data);
      }else{
        $gambar = $this->upload->data('file_name');
        $dat=array(
          'area' => $area,
          'subarea' => $subarea,
          'tgl_kerusakan' => $tanggal,
          'status' => 'rusak',
          'gambar' => $gambar,
          'keterangan' => $keterangan
        );

        $this->Model_kerusakan->insert('kerusakan', $dat);
        $data = array(
          'id_karyawan' => $x,
          'area' => $area,
          'logo' => $this->login_m->ambil_gambar($this->session->userdata('id_karyawan')),
          'session' => $this->session->all_userdata(),
          'subarea' => $subarea,
          'nama_karyawan' =>$this->Model_kerusakan->get_nama($x)
        );
        $this->load->view('tampilan_sukses', $data);    }
      }

    }

  }
