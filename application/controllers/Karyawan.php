<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('karyawan_model');
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
		$data['karyawan'] = $this->karyawan_model->getKaryawan();
		$data['logo'] = $this->login_m->ambil_gambar($this->session->userdata('id_karyawan'));
	    //include head, header, footer di view dihapus dulu
	    //parameter $data tidak diubah, ikut controller bersangkutan,
	    //kalo parameter $nav sama di semua controller

		$this->Navbar_model->view_loader('KaryawanList', $data);
	}
	//function tambahKaryawan
	public function tambahKaryawan()
	{
		$data['logo'] = $this->login_m->ambil_gambar($this->session->userdata('id_karyawan'));
		$data['session']	= $this->session->all_userdata();

		$this->Navbar_model->view_loader('KaryawanForm', $data);

	}

	//function input data
	public function simpanKaryawan()
	{
		$data['logo'] = $this->login_m->ambil_gambar($this->session->userdata('id_karyawan'));
		$data['session']	= $this->session->all_userdata();
		//Untuk Validasi
		//query simpan data karyawan
		if(!empty($_POST['username']))
		{
			$username			= $_POST['username'];
		}
		else
		{
			$username		='';
		}
		$duplicat			= $this->karyawan_model->cek($username);
		//Untuk Validasi	
		$this->load->library('javascript');
		if(!empty($duplicat))
		{
			//load notifikasi sukses
			$data['error']  = '
			<div class="alert alert-danger"><p><strong>Username sudah terdaftar, Input dengan username lain</strong></p></div>';
			$this->Navbar_model->view_loader('KaryawanForm', $data);
		}
		elseif($this->karyawan_model->simpanKaryawan())
		{
			//load notifikasi sukses
			$data['sukses']  = '
			<div class="alert alert-success"><p><strong>Input Data Karyawan Sukses</strong></p></div>';
			$this->Navbar_model->view_loader('KaryawanForm', $data);
		}
		else
		{
			//load notifikasi gagal
			$data['error']  = '
			<div class="alert alert-danger">
			<p><strong>Input Karyawan Data Gagal!</strong></p>
			</div>';
			$this->Navbar_model->view_loader('KaryawanForm', $data);
		}
	}	



	//ubah
	public function ubah()
	{
		$data['session']	= $this->session->all_userdata();
		$data['logo'] = $this->login_m->ambil_gambar($this->session->userdata('id_karyawan'));
		$id_karyawan		= $this->input->get('id_karyawan');
		$data['karyawan']		= $this->karyawan_model->getKaryawanUpdate($id_karyawan);

		$this->Navbar_model->view_loader('KaryawanForm', $data);

	}
	public function prosesUbah()
	{
		$data['session']	= $this->session->all_userdata();
		$data['logo'] = $this->login_m->ambil_gambar($this->session->userdata('id_karyawan'));
		$id_karyawan	= $this->input->get('id_karyawan');
		//Jika update data sukses
		if($this->karyawan_model->ubah())
		{
			//load notifikasi sukses
			$data['sukses']= '
			<div class="alert alert-success">
			<p><strong>Update Data Karyawan Sukses</strong></p>
			</div>';
			$data['karyawan'] = $this->karyawan_model->getKaryawan();

			$this->Navbar_model->view_loader('KaryawanList', $data);
		}
		//Jika update data tidak sukses
		else
		{
			//load notifikasi gagal
			$data['error'] = '
			<div class="msg msg-error"><p><strong>Update Data Karyawan Gagal!</strong></p>
			</div>';
			$data['karyawan'] = $this->karyawan_model->getKaryawan();

			$this->Navbar_model->view_loader('KaryawanList', $data);
		}
	}

	//function hapus
	public function hapus()
	{
		$data['session']	= $this->session->all_userdata();
		$id_karyawan		= $this->input->get('id_karyawan');
		$data['logo'] = $this->login_m->ambil_gambar($this->session->userdata('id_karyawan'));
		//panggil query hapus di model
		if($this->karyawan_model->hapus($id_karyawan))
		{
			//load notifikasi sukses
			$data['sukses']= '
			<div class="alert alert-success">
			<p><strong>Hapus Data Karyawan Sukses</strong></p>
			</div>';
			$data['karyawan'] = $this->karyawan_model->getKaryawan();

			$this->Navbar_model->view_loader('KaryawanList', $data);
		}
		//Jika update data tidak sukses
		else
		{
			//load notifikasi gagal
			$data['error'] = '
			<div class="msg msg-error"><p><strong>Hapus Data Karyawan Gagal!</strong></p>
			</div>';
			$data['karyawan'] = $this->karyawan_model->getKaryawan();

			$this->Navbar_model->view_loader('KaryawanList', $data);
		}

	}
}

?>



