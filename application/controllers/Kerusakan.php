<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kerusakan extends CI_Controller {


	function __construct()
	{
		parent::__construct();
		$this->load->model('login_m');
		$this->load->model('kerusakan_model');
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
		$data['kerusakan'] = $this->kerusakan_model->getKerusakan();
		$data['logo'] = $this->login_m->ambil_gambar($this->session->userdata('id_karyawan'));
	    //include head, header, footer di view dihapus dulu
	    //parameter $data tidak diubah, ikut controller bersangkutan,
	    //kalo parameter $nav sama di semua controller
		$this->Navbar_model->view_loader('KerusakanList', $data);
	  //var_dump($data['kerusakan']);
	  //$this->Navbar_model->view_loader('SubareaList', $data);
	  //var_dump($data['kerusakan']);

		//var_dump($data['data']);
	}
	
	public function cetakLaporan()
	{
		$data['session']	= $this->session->all_userdata();
		$this->load->library('pdf');
		$data['data'] = $this->kerusakan_model->getKerusakan();

		$this->pdf->generate('Laporan/CetakLaporansca', $data, 'laporan-sca', 'A4', 'landscape');
		
	}

	public function cetakLaporanrange()
	{
		//$dari		= $_POST['dari'];
		$dari = $this->input->post('dari');
		$hingga = $this->input->post('hingga');
		$data['session']	= $this->session->all_userdata();
		$this->load->library('pdf');
		$data['data'] = $this->kerusakan_model->getKerusakanRange($dari, $hingga);

		$this->pdf->generate('Laporan/CetakLaporanrange', $data, 'laporan-sca', 'A4', 'landscape');
		
	}

		public function hapus()
	{
		$data['session']	= $this->session->all_userdata();
		$id_kerusakan		= $this->input->get('id_kerusakan');
		$data['logo'] = $this->login_m->ambil_gambar($this->session->userdata('id_karyawan'));
		//panggil query hapus di model
		if($this->kerusakan_model->hapus($id_kerusakan))
		{
			//load notifikasi sukses
			$data['sukses']= '
							<div class="alert alert-success">
								<p><strong>Hapus Data Subarea Sukses</strong></p>
							</div>';
							$data['kerusakan'] = $this->kerusakan_model->getKerusakan();

			$this->Navbar_model->view_loader('SubareaList', $data);
		}
		//Jika update data tidak sukses
		else
		{
			//load notifikasi gagal
			$data['error'] = '
								<div class="msg msg-error"><p><strong>Hapus Data Subarea Gagal!</strong></p>
								</div>';
								$data['kerusakan'] = $this->kerusakan_model->getKerusakan();

			$this->Navbar_model->view_loader('SubareaList', $data);
		}

	}

}