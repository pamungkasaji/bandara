<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Material extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('material_model');
		$this->load->model('login_m');
		$this->load->model('subarea_model');
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
		$data['material'] = $this->material_model->getMaterial();
		$data['logo'] = $this->login_m->ambil_gambar($this->session->userdata('id_karyawan'));
	    //include head, header, footer di view dihapus dulu
	    //parameter $data tidak diubah, ikut controller bersangkutan,
	    //kalo parameter $nav sama di semua controller
		$this->Navbar_model->view_loader('MaterialList', $data);

	}
	//function tambahMaterial
	public function tambahMaterial()
	{
		$data['logo'] = $this->login_m->ambil_gambar($this->session->userdata('id_karyawan'));
		$data['session']	= $this->session->all_userdata();
		$data['subarea'] 		= $this->subarea_model->getSubarea(); 
		$this->Navbar_model->view_loader('MaterialForm', $data);
	}
	//function input data
	public function simpanMaterial()
	{
		$data['logo'] = $this->login_m->ambil_gambar($this->session->userdata('id_karyawan'));
		$data['session']	= $this->session->all_userdata();
		$data['subarea'] 		= $this->subarea_model->getSubarea(); 
		//Untuk Validasi
		//query simpan data Material
		if($this->material_model->simpanMaterial())
		{
			//load notifikasi sukses
			$data['sukses']  = '
			<div class="alert alert-success"><p><strong>Input Data Material Sukses</strong></p></div>';
			$this->Navbar_model->view_loader('MaterialForm', $data);
		}
		else
		{
			//load notifikasi gagal
			$data['error']  = '
			<div class="msg msg-error">
			<p><strong>Input Material Data Gagal!</strong></p>
			</div>';
			$this->Navbar_model->view_loader('MaterialForm', $data);
		}
	}
	//ubah
	public function ubah()
	{
		$data['session']	= $this->session->all_userdata();
		$data['logo'] = $this->login_m->ambil_gambar($this->session->userdata('id_karyawan'));
		$id_material		= $this->input->get('id_material');
		//$data['MTR']= $this->material_model->getMTRUpdate($kode); 
		$data['subarea'] 		= $this->subarea_model->getSubarea(); 
		$data['MTR']		= $this->material_model->getMTRUpdate($id_material);
		$data['STD']		= $this->material_model->getSTDUpdate($id_material);
		$data['material']		= $this->material_model->getMaterialUpdate($id_material);
		$this->Navbar_model->view_loader('MaterialForm', $data);
	}
	public function prosesUbah()
	{
		$data['session']	= $this->session->all_userdata();
		$data['logo'] = $this->login_m->ambil_gambar($this->session->userdata('id_karyawan'));
		//$id_material	= $this->input->get('id_material');
		//$data['MTR']= $this->material_model->getMTRUpdate($kode); 
		//Jika update data sukses
		if($this->material_model->ubah3())
		{
			//load notifikasi sukses
			$data['sukses']= '
			<div class="alert alert-success">
			<p><strong>Update Data Material Sukses</strong></p>
			</div>';
			$data['material'] = $this->material_model->getMaterial();
			$this->Navbar_model->view_loader('MaterialList', $data);
		}
		//Jika update data tidak sukses
		else
		{
			//load notifikasi gagal
			$data['error'] = '
			<div class="msg msg-error"><p><strong>Update Data Material Gagal!</strong></p>
			</div>';
			$data['material'] = $this->material_model->getMaterial();
			$this->Navbar_model->view_loader('MaterialList', $data);
		}
	}
	//function hapus
	public function hapus()
	{
		$data['session']	= $this->session->all_userdata();
		$id_material		= $this->input->get('id_material');
		$data['logo'] = $this->login_m->ambil_gambar($this->session->userdata('id_karyawan'));
		//panggil query hapus di model
		if($this->material_model->hapus($id_material))
		{
			//load notifikasi sukses
			$data['sukses']= '
			<div class="alert alert-success">
			<p><strong>Hapus Data Material Sukses</strong></p>
			</div>';
			$data['material'] = $this->material_model->getMaterial();
			$this->Navbar_model->view_loader('MaterialList', $data);
		}
		//Jika update data tidak sukses
		else
		{
			//load notifikasi gagal
			$data['error'] = '
			<div class="msg msg-error"><p><strong>Hapus Data Material Gagal!</strong></p>
			</div>';
			$data['material'] = $this->material_model->getMaterial();
			$this->Navbar_model->view_loader('MaterialList', $data);
		}
	}
}
?>