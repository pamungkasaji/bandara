<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Welcome extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Welcome_model');
		$this->load->model('login_m');
		$this->load->model('Navbar_model');
		if(!$this->session->userdata('id_karyawan'))
		{
			redirect('Login');
		}
		$this->load->helper(array('form', 'url','download'));	}
	public function index()
	{
		$data['session']	= $this->session->all_userdata();
	  $data['logo'] = $this->login_m->ambil_gambar($this->session->userdata('id_karyawan'));
		/*
		$data['DetailStok']		= $this->Welcome_model->getStokDetail();
		$data['DetailPR']		= $this->Welcome_model->getPRDetail();
		$data['DetailPL']		= $this->Welcome_model->getPLDetail();
		$data['DetailTagihan']	= $this->Welcome_model->getTagihanDetail();
		*/

    $this->load->view('template/head');
    $this->load->view('template/nav_header',$data);
		$this->load->view('template/footer');
	}
}

