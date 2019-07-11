<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {


	function __construct()
	{
		parent::__construct();
		$this->load->model('login_m');
		$this->load->model('M_form');
		$this->load->model('Navbar_model');
		if(!$this->session->userdata('id_karyawan'))
		{
			redirect('Login');
		}
		$this->load->helper(array('form', 'url','download'));
	}

	public function index()
	{

		$data['session']	= $this->session->all_userdata();
	  $data['logo'] = $this->login_m->ambil_gambar($this->session->userdata('id_karyawan'));
    $this->load->view('template/head');
    $this->load->view('template/nav_header',$data);
		$this->load->view('template/footer');
	  //$this->Navbar_model->view_loader('SubareaList', $data);
	  //var_dump($data['subarea']);
				$data['data'] = array(
			['nim'=>'123456789','name'=>'example name 1','jurusan'=>'Teknik Informatika'],
			['nim'=>'123456789', 'name'=>'example name 2', 'jurusan'=>'Jaringan']
		);
		//var_dump($data['data']);
	}

	public function laporansca()
	{
		$data['session']	= $this->session->all_userdata();
		$this->load->library('pdf');
		$data['data'] = $this->M_form->getPenilaian();

		$this->pdf->generate('Laporan/laporansca_view', $data, 'laporan-mahasiswa', 'A4', 'landscape');
	}

}