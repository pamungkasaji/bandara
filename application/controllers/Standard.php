<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Standard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('standard_model');
		$this->load->model('login_m');
		$this->load->model('material_model');
		$this->load->model('Navbar_model');
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
		$data['standard'] = $this->standard_model->getStandard();
		$data['logo'] = $this->login_m->ambil_gambar($this->session->userdata('id_karyawan'));
	    //include head, header, footer di view dihapus dulu
	    //parameter $data tidak diubah, ikut controller bersangkutan,
	    //kalo parameter $nav sama di semua controller

		$this->Navbar_model->view_loader('StandardList', $data);
	}
	//function tambahStandard
	public function tambahStandard()
	{
		$data['logo'] = $this->login_m->ambil_gambar($this->session->userdata('id_karyawan'));
		$data['session']	= $this->session->all_userdata();
		$data['material'] 		= $this->material_model->getMaterial(); 

		$this->Navbar_model->view_loader('StandardForm', $data);

	}
	//function input data
	public function simpanStandard()
	{
		$data['logo'] = $this->login_m->ambil_gambar($this->session->userdata('id_karyawan'));
		$data['session']	= $this->session->all_userdata();
		$data['material'] 		= $this->material_model->getMaterial(); 
		//Untuk Validasi
		//query simpan data Standard
		if($this->standard_model->simpanStandard())
		{
			//load notifikasi sukses
			$data['sukses']  = '
			<div class="alert alert-success"><p><strong>Input Data Standard Sukses</strong></p></div>';
			$this->Navbar_model->view_loader('StandardForm', $data);

		}
		else
		{
			//load notifikasi gagal
			$data['error']  = '
			<div class="msg msg-error">
			<p><strong>Input Standard Data Gagal!</strong></p>
			</div>';

			$this->Navbar_model->view_loader('StandardForm', $data);

		}
	}
	//ubah
	public function ubah()
	{
		$data['session']	= $this->session->all_userdata();
		$data['logo'] = $this->login_m->ambil_gambar($this->session->userdata('id_karyawan'));
		$id_standard		= $this->input->get('id_standard');
		//$data['STD']= $this->standard_model->getSTDUpdate($kode); 
		$data['material'] 		= $this->material_model->getMaterial(); 
		$data['STD']		= $this->standard_model->getSTDUpdate($id_standard);
		$data['standard']		= $this->standard_model->getStandardUpdate($id_standard);


		$this->Navbar_model->view_loader('StandardForm', $data);

	}
	public function prosesUbah()
	{
		$data['session']	= $this->session->all_userdata();
		$data['logo'] = $this->login_m->ambil_gambar($this->session->userdata('id_karyawan'));
		$id_standard	= $this->input->get('id_standard');
		//$data['STD']= $this->standard_model->getSTDUpdate($kode); 
		//Jika update data sukses
		if($this->standard_model->ubah())
		{
			//load notifikasi sukses
			$data['sukses']= '
			<div class="alert alert-success">
			<p><strong>Update Data Standard Sukses</strong></p>
			</div>';
			$data['standard'] = $this->standard_model->getStandard();

			$this->Navbar_model->view_loader('StandardList', $data);
		}
		//Jika update data tidak sukses
		else
		{
			//load notifikasi gagal
			$data['error'] = '
			<div class="msg msg-error"><p><strong>Update Data Standard Gagal!</strong></p>
			</div>';
			$data['standard'] = $this->standard_model->getStandard();

			$this->Navbar_model->view_loader('StandardList', $data);
		}
	}

	//function hapus
	public function hapus()
	{
		$data['session']	= $this->session->all_userdata();
		$id_standard		= $this->input->get('id_standard');
		$data['logo'] = $this->login_m->ambil_gambar($this->session->userdata('id_karyawan'));
		//panggil query hapus di model
		if($this->standard_model->hapus($id_standard))
		{
			//load notifikasi sukses
			$data['sukses']= '
			<div class="alert alert-success">
			<p><strong>Hapus Data Standard Sukses</strong></p>
			</div>';
			$data['standard'] = $this->standard_model->getStandard();

			$this->Navbar_model->view_loader('StandardList', $data);
		}
		//Jika update data tidak sukses
		else
		{
			//load notifikasi gagal
			$data['error'] = '
			<div class="msg msg-error"><p><strong>Hapus Data Standard Gagal!</strong></p>
			</div>';
			$data['standard'] = $this->standard_model->getStandard();

			$this->Navbar_model->view_loader('StandardList', $data);
		}

	}
}

?>
