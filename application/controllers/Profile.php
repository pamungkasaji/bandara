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
    $this->load->model(array('Navbar_model'));
    $this->load->helper(array('form', 'url'));
  }

  	public function index(){
  	}

    public function tambahGambar($id){
      $data['id_karyawan']=$id;
      $data['session']	= $this->session->all_userdata();
      $data['logo'] = $this->session->userdata('gambar');
      $this->Navbar_model->view_loader('tampilan_profile', $data);
    }

  	public function aksi_upload($id){
      $gambar=$_FILES['gambar']['name'];

        if ($gambar=''){}else{

    		$config['upload_path']          = './gambar/';
    		$config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $id;
    		$config['max_size']             = 2000;
    		$config['max_width']            = 1920;
    		$config['max_height']           = 1280;

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
