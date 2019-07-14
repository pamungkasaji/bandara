<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian extends CI_Controller {


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
		$this->Navbar_model->view_loader('PenilaianList', $data);
	  //var_dump($data['subarea']);
	  //$this->Navbar_model->view_loader('SubareaList', $data);
	  //var_dump($data['subarea']);

		//var_dump($data['data']);
	}

	public function pdfdetails()
	{
		if($this->uri->segment(3))
		{
			$id_kodeqr = $this->uri->segment(3);
			$html_content = '<h3 align="center">Angkasa Pura</h3>';
			$html_content .= $this->penilaian_model->fetch_single_details($id_kodeqr);
			$this->pdf->loadHtml($html_content);
			$this->pdf->render();
			$this->pdf->stream("".$id_kodeqr.".pdf", array("Attachment"=>0));
		}
	}

	
	public function cetakLaporansca()
	{
		if($this->uri->segment(3))
		{
			$id_penilaian = $this->uri->segment(3);
			$data['session']	= $this->session->all_userdata();
			$this->load->library('pdf');
			$data['data'] = $this->penilaian_model->getPenilaianDetail($id_penilaian);

			$this->pdf->generate('Laporan/CetakLaporansca', $data, 'laporan-sca', 'A4', 'landscape');
		}
	}

}