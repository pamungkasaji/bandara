<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanSCA extends CI_Controller {


	function __construct()
	{
		parent::__construct();
		$this->load->model('login_m');
		$this->load->model('penilaian_model');
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
		$data['penilaian'] = $this->penilaian_model->getPenilaian();
	  $data['logo'] = $this->login_m->ambil_gambar($this->session->userdata('id_karyawan'));
	    //include head, header, footer di view dihapus dulu
	    //parameter $data tidak diubah, ikut controller bersangkutan,
	    //kalo parameter $nav sama di semua controller
	  $this->Navbar_model->view_loader('laporan/Laporansca_view', $data);
	  //var_dump($data['subarea']);
	  //$this->Navbar_model->view_loader('SubareaList', $data);
	  //var_dump($data['subarea']);

		//var_dump($data['data']);
	}

	
	public function cetakLaporansca()
	{
		$data['session']	= $this->session->all_userdata();
		$this->load->library('pdf');
		$data['data'] = $this->penilaian_model->getPenilaian();

		$this->pdf->generate('Laporan/laporansca_view', $data, 'laporan-mahasiswa', 'A4', 'landscape');
	}

}