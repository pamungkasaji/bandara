<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Subarea extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('subarea_model');
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
		$data['subarea'] = $this->subarea_model->getSubarea();
		$data['logo'] = $this->login_m->ambil_gambar($this->session->userdata('id_karyawan'));
	    //include head, header, footer di view dihapus dulu
	    //parameter $data tidak diubah, ikut controller bersangkutan,
	    //kalo parameter $nav sama di semua controller
		$this->Navbar_model->view_loader('SubareaList', $data);
	}
	//function tambahSubarea
	public function tambahSubarea()
	{
		$data['logo'] = $this->login_m->ambil_gambar($this->session->userdata('id_karyawan'));
		$data['session']	= $this->session->all_userdata();

		$this->Navbar_model->view_loader('SubareaForm', $data);

	}
	//function input data
	public function simpanSubarea()
	{
		$data['logo'] = $this->login_m->ambil_gambar($this->session->userdata('id_karyawan'));
		$data['session']	= $this->session->all_userdata();
		//Untuk Validasi
		//query simpan data Subarea
		if($this->subarea_model->simpanSubarea())
		{
			//load notifikasi sukses
			$data['sukses']  = '
			<div class="alert alert-success"><p><strong>Input Data Subarea Sukses</strong></p></div>';
			$this->Navbar_model->view_loader('SubareaForm', $data);

		}
		else
		{
			//load notifikasi gagal
			$data['error']  = '
			<div class="msg msg-error">
			<p><strong>Input Subarea Data Gagal!</strong></p>
			</div>';

			$this->Navbar_model->view_loader('SubareaForm', $data);

		}
	}
	//ubah
	public function ubah()
	{
		$data['session']	= $this->session->all_userdata();
		$data['logo'] = $this->login_m->ambil_gambar($this->session->userdata('id_karyawan'));
		$id_subarea		= $this->input->get('id_subarea');
		$data['subarea']		= $this->subarea_model->getSubareaUpdate($id_subarea);

		$this->Navbar_model->view_loader('SubareaForm', $data);

	}
	public function prosesUbah()
	{
		$data['session']	= $this->session->all_userdata();
		$data['logo'] = $this->login_m->ambil_gambar($this->session->userdata('id_karyawan'));
		$id_subarea	= $this->input->get('id_subarea');
		//Jika update data sukses
		if($this->subarea_model->ubah())
		{
			//load notifikasi sukses
			$data['sukses']= '
			<div class="alert alert-success">
			<p><strong>Update Data Subarea Sukses</strong></p>
			</div>';
			$data['subarea'] = $this->subarea_model->getSubarea();

			$this->Navbar_model->view_loader('SubareaList', $data);
		}
		//Jika update data tidak sukses
		else
		{
			//load notifikasi gagal
			$data['error'] = '
			<div class="msg msg-error"><p><strong>Update Data Subarea Gagal!</strong></p>
			</div>';
			$data['subarea'] = $this->subarea_model->getSubarea();

			$this->Navbar_model->view_loader('SubareaList', $data);
		}
	}

	//function hapus
	public function hapus()
	{
		$data['session']	= $this->session->all_userdata();
		$id_subarea		= $this->input->get('id_subarea');
		$data['logo'] = $this->login_m->ambil_gambar($this->session->userdata('id_karyawan'));
		//panggil query hapus di model
		if($this->subarea_model->hapus($id_subarea))
		{
			//load notifikasi sukses
			$data['sukses']= '
			<div class="alert alert-success">
			<p><strong>Hapus Data Subarea Sukses</strong></p>
			</div>';
			$data['subarea'] = $this->subarea_model->getSubarea();

			$this->Navbar_model->view_loader('SubareaList', $data);
		}
		//Jika update data tidak sukses
		else
		{
			//load notifikasi gagal
			$data['error'] = '
			<div class="msg msg-error"><p><strong>Hapus Data Subarea Gagal!</strong></p>
			</div>';
			$data['subarea'] = $this->subarea_model->getSubarea();

			$this->Navbar_model->view_loader('SubareaList', $data);
		}

	}
}

?>
