<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Area extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('area_model');
		$this->load->model('login_m');
		$this->load->model('Navbar_model');
		if(!$this->session->userdata('id_karyawan'))
		{
			redirect('Login');
		}
		$this->load->helper(array('form', 'url','download'));

		$level	= $this->session->userdata('level');
		if ($level != 'admin') {
			$message = "Anda tidak memiliki akses ke halaman ini";
			echo "<script type='text/javascript'>alert('$message') ;javascript:history.go(-1)</script>";
			//echo "<a href=\"javascript:history.go(-1)\">KEMBALI</a>";
		}
	}

	public function index()
	{

		$data['session']	= $this->session->all_userdata();
		$data['area'] = $this->area_model->getArea();
		$data['logo'] = $this->login_m->ambil_gambar($this->session->userdata('id_karyawan'));
	    //include head, header, footer di view dihapus dulu
	    //parameter $data tidak diubah, ikut controller bersangkutan,
	    //kalo parameter $nav sama di semua controller
		$this->Navbar_model->view_loader('AreaList', $data);
	}
	//function tambahArea
	public function tambahArea()
	{
		$data['logo'] = $this->login_m->ambil_gambar($this->session->userdata('id_karyawan'));
		$data['session']	= $this->session->all_userdata();

		$this->Navbar_model->view_loader('AreaForm', $data);

	}
	//function input data
	public function simpanArea()
	{
		$data['logo'] = $this->login_m->ambil_gambar($this->session->userdata('id_karyawan'));
		$data['session']	= $this->session->all_userdata();
		//Untuk Validasi
		//query simpan data Area
		if($this->area_model->simpanArea())
		{
			//load notifikasi sukses
			$data['sukses']  = '
			<div class="alert alert-success"><p><strong>Input Data Area Sukses</strong></p></div>';
			$this->Navbar_model->view_loader('AreaForm', $data);

		}
		else
		{
			//load notifikasi gagal
			$data['error']  = '
			<div class="msg msg-error">
			<p><strong>Input Area Data Gagal!</strong></p>
			</div>';

			$this->Navbar_model->view_loader('AreaForm', $data);

		}
	}
	//ubah
	public function ubah()
	{
		$data['session']	= $this->session->all_userdata();
		$data['logo'] = $this->login_m->ambil_gambar($this->session->userdata('id_karyawan'));
		$id_area		= $this->input->get('id_area');
		$data['area']		= $this->area_model->getAreaUpdate($id_area);

		$this->Navbar_model->view_loader('AreaForm', $data);

	}
	public function prosesUbah()
	{
		$data['session']	= $this->session->all_userdata();
		$data['logo'] = $this->login_m->ambil_gambar($this->session->userdata('id_karyawan'));
		$id_area	= $this->input->get('id_area');
		//Jika update data sukses
		if($this->area_model->ubah())
		{
			//load notifikasi sukses
			$data['sukses']= '
			<div class="alert alert-success">
			<p><strong>Update Data Area Sukses</strong></p>
			</div>';
			$data['area'] = $this->area_model->getArea();

			$this->Navbar_model->view_loader('AreaList', $data);
		}
		//Jika update data tidak sukses
		else
		{
			//load notifikasi gagal
			$data['error'] = '
			<div class="msg msg-error"><p><strong>Update Data Area Gagal!</strong></p>
			</div>';
			$data['area'] = $this->area_model->getArea();

			$this->Navbar_model->view_loader('AreaList', $data);
		}
	}

	//function hapus
	public function hapus()
	{
		$data['session']	= $this->session->all_userdata();
		$id_area		= $this->input->get('id_area');
		$data['logo'] = $this->login_m->ambil_gambar($this->session->userdata('id_karyawan'));
		//panggil query hapus di model
		if($this->area_model->hapus($id_area))
		{
			//load notifikasi sukses
			$data['sukses']= '
			<div class="alert alert-success">
			<p><strong>Hapus Data Area Sukses</strong></p>
			</div>';
			$data['area'] = $this->area_model->getArea();

			$this->Navbar_model->view_loader('AreaList', $data);
		}
		//Jika update data tidak sukses
		else
		{
			//load notifikasi gagal
			$data['error'] = '
			<div class="msg msg-error"><p><strong>Hapus Data Area Gagal!</strong></p>
			</div>';
			$data['area'] = $this->area_model->getArea();

			$this->Navbar_model->view_loader('AreaList', $data);
		}

	}
}

?>
