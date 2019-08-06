<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian extends CI_Controller {


	function __construct()
	{
		parent::__construct();
		$this->load->model('login_m');
		$this->load->model('penilaian_model');
		$this->load->model('Navbar_model');
		$this->load->model('area_model');
		$this->load->model('subarea_model');
		if(!$this->session->userdata('id_karyawan'))
		{
			redirect('Login');
		}
		$this->load->helper(array('form', 'url','download'));

		$level  = $this->session->userdata('level');
		if ($level != 'admin') {
			$message = "Anda tidak memiliki akses ke halaman ini";
			echo "<script type='text/javascript'>alert('$message') ;javascript:history.go(-1)</script>";
      //echo "<a href=\"javascript:history.go(-1)\">KEMBALI</a>";
		}
	}

	public function index()
	{

		$data['session']	= $this->session->all_userdata();
		$data['penilaian'] = $this->penilaian_model->getPenilaian();
		$data['logo'] = $this->login_m->ambil_gambar($this->session->userdata('id_karyawan'));
		$data['subarea'] 	= $this->subarea_model->getSubarea();
		$data['area'] 		= $this->area_model->getArea();
	    //include head, header, footer di view dihapus dulu
	    //parameter $data tidak diubah, ikut controller bersangkutan,
	    //kalo parameter $nav sama di semua controller
		$this->Navbar_model->view_loader('PenilaianList', $data);
	}
	
	public function cetakLaporan()
	{
		$data['session']	= $this->session->all_userdata();
		$this->load->library('pdf');
		$data['data'] = $this->penilaian_model->getPenilaian();

		$this->pdf->generate('Laporan/CetakLaporansca', $data, 'laporan-sca', 'A4', 'landscape');
		
	}

	public function cetakLaporansca()
	{
		if($this->uri->segment(3))
		{
			$id_penilaian = $this->uri->segment(3);
			$data['session']	= $this->session->all_userdata();
			$this->load->library('pdf');
			$data['data'] = $this->penilaian_model->getPenilaianDetail($id_penilaian);
			//$data['coba'] = $this->penilaian_model->getPenilaianDetailCoba($id_penilaian);
			$this->pdf->generate('Laporan/CetakLaporansca', $data, 'laporan-sca', 'A4', 'landscape');
		}
	}

	public function cetakLaporanrange()
	{
		//$dari		= $_POST['dari'];
		$dari = $this->input->post('dari');
		$hingga = $this->input->post('hingga');
		$data['session']	= $this->session->all_userdata();
		$this->load->library('pdf');
		$data['data'] = $this->penilaian_model->getPenilaianRange($dari, $hingga);


		$this->pdf->generate('Laporan/CetakLaporanrange', $data, 'laporan-sca', 'A4', 'landscape');
		
	}

	public function hapus()
	{
		$data['session']	= $this->session->all_userdata();
		$id_penilaian		= $this->input->get('id_penilaian');
		$data['logo'] = $this->login_m->ambil_gambar($this->session->userdata('id_karyawan'));
		//panggil query hapus di model
		if($this->penilaian_model->hapus($id_penilaian))
		{
			//load notifikasi sukses
			$data['sukses']= '
			<div class="alert alert-success">
			<p><strong>Hapus Data Penilaian Sukses</strong></p>
			</div>';
			$data['penilaian'] = $this->penilaian_model->getPenilaian();

			$this->Navbar_model->view_loader('PenilaianList', $data);
		}
		//Jika update data tidak sukses
		else
		{
			//load notifikasi gagal
			$data['error'] = '
			<div class="msg msg-error"><p><strong>Hapus Data Subarea Gagal!</strong></p>
			</div>';
			$data['penilaian'] = $this->penilaian_model->getPenilaian();

			$this->Navbar_model->view_loader('PenilaianList', $data);
		}

	}

}