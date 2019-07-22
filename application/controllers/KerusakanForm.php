<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KerusakanForm extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model(array('Model_kerusakan'));
    $this->load->helper(array('form'));
    $this->load->helper('date');

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

    $this->load->view('form_kerusakan', $data);
  }

  public function aksi_upload($x){
    $gambar=$_FILES['gambar']['name'];
    $area = $this->input->post('area');
    $subarea = $this->input->post('subarea');
    $tanggal = $this->input->post('tanggal');
    $keterangan = $this->input->post('keterangan');

    if ($gambar=''){}else{

      $config['upload_path']          = './gambar/';
      $config['allowed_types']        = 'gif|jpg|png';
      $config['file_name']            = 'kerusakan/'.$tanggal.'/'.$subarea;
      $config['max_size']             = 100;
      $config['max_width']            = 1024;
      $config['max_height']           = 768;

      $this->load->library('upload', $config);

      if ( ! $this->upload->do_upload('gambar')){
        $error = array('error' => $this->upload->display_errors());
        $this->load->view('tampilan_profile', $error);
      }else{
        $gambar = $this->upload->data('file_name');

      }
      $dat=array(
        'area' => $area,
        'subarea' => $subarea,
        'tgl_kerusakan' => $tanggal,
        'gambar' => $gambar,
        'keterangan' => $keterangan
      );

      $this->Model_kerusakan->insert('kerusakan', $dat);
      $data = array(
        'id_karyawan' => $x,
        'area' => $area,
        'subarea' => $subarea,
        'nama_karyawan' =>$this->Model_kerusakan->get_nama($x)
      );
      $this->load->view('tampilan_sukses', $data);    }
    }

  }
