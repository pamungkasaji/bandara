<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model(array('m_profile'));
    $this->load->model(array('m_form'));
    $this->load->model(array('login_m'));
    $this->load->helper(array('form', 'url'));
  }

  	public function index(){
  		$this->load->view('tampilan_profile', array('error' => ' ' ));
      $this->load->view('template/nav_header',$nav);
  	}

    public function tambahGambar($id){
      $data['id_karyawan']=$id;
      $nav['username']     = $this->session->userdata('username');
      $nav['level']    = $this->login_m->getLevel($nav['username']);
      $nav['logo'] = $this->session->userdata('gambar');
      $nav['id_user'] = $this->session->userdata('id_karyawan');
      $this->load->view('template/head');
      $this->load->view('template/nav_header',$nav);
      $this->load->view('tampilan_profile',$data);
      $this->load->view('template/footer');
    }

  	public function aksi_upload($id){
      $gambar=$_FILES['gambar']['name'];

        if ($gambar=''){}else{

    		$config['upload_path']          = './gambar/';
    		$config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $id;
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
          'gambar' => $gambar
        );

        $this->m_profile->insert_image($dat, $id);
        redirect('Dashboard', 'refresh');
    	}
  	}

  }
