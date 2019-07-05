<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Welcome extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('login_m');
		$this->load->model('Welcome_model');
		if(!$this->session->userdata('username'))
		{
			redirect('Login');
		}
		$this->load->helper(array('form', 'url','download'));
	}
	public function index()
	{
		$data['session']		= $this->session->all_userdata();
		$username					= $this->session->userdata('username');
		$data['level']	= $this->login_m->getKodeDivisi($username);

		/*
		$data['DetailStok']		= $this->Welcome_model->getStokDetail();
		$data['DetailPR']		= $this->Welcome_model->getPRDetail();
		$data['DetailPL']		= $this->Welcome_model->getPLDetail();
		$data['DetailTagihan']	= $this->Welcome_model->getTagihanDetail();
		*/

		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('navigasi',$data);
		//$this->load->view('dashboard',$data);
		$this->load->view('right');
		$this->load->view('footer');
	}
}

