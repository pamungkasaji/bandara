<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('penilaian_model');
		//$this->load->model('divisi_model');
		$this->load->model('login_m');
		if(!$this->session->userdata('username'))
		{
			redirect('Login');
		}
		$this->load->helper(array('form', 'url','download'));
	}

	public function index()
	{
		$data['session']	= $this->session->all_userdata();
		$username				= $this->session->userdata('username');
		$data['level']= $this->login_m->getLevel($username);
		//$data['penilaian'] 	= $this->penilaian_model->getArea(); 
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('navigasi',$data);
		$this->load->view('PenilaianForm',$data);
		$this->load->view('right');
		$this->load->view('footer-table');
	}

	public function isiNilai()
	{

		$data['session']	= $this->session->all_userdata();
		$username				= $this->session->userdata('username');
		$data['level']= $this->login_m->getLevel($username);
		$this->load->view('head');
		$this->load->view('PenilaianForm',$data);
		$this->load->view('right');
	}

	public function ini()
	{
		$data['session']	= $this->session->all_userdata();
		$this->load->library('pdf');
		$data['data'] = array(
			['nim'=>'123456789','name'=>'example name 1','jurusan'=>'Teknik Informatika'],
			['nim'=>'123456789', 'name'=>'example name 2', 'jurusan'=>'Jaringan']
		);
		$this->pdf->generate('Laporan/laporan1', $data, 'laporan-mahasiswa', 'A4', 'landscape');
	}
}

?>