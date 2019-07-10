<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('karyawan_model');
		//$this->load->model('divisi_model');
		$this->load->model('login_m');
		if(!$this->session->userdata('username'))
		{
			redirect('Login');
		}
		$this->load->helper(array('form', 'url','download'));
	}

	public function index()
	{
		$data['session']	= $this->session->all_userdata();
		$username				= $this->session->userdata('username');
		$data['level']= $this->login_m->getLevel($username);
		$data['karyawan'] = $this->karyawan_model->getData(); 
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('navigasi',$data);
		$this->load->view('KaryawanList',$data);
		$this->load->view('right');
		$this->load->view('footer-table');
	}
	//function tambahKaryawan
	public function tambahKaryawan()
	{
		$data['session']		= $this->session->all_userdata();
		$username					= $this->session->userdata('username');
		$data['level']	= $this->login_m->getLevel($username);
		//$data['divisi']		 	= $this->divisi_model->getData(); 
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('navigasi',$data);
		$this->load->view('KaryawanForm',$data); 
		$this->load->view('right');
		$this->load->view('footer');
	}

	//function input data
	public function simpanKaryawan()
	{
		$data['session']	= $this->session->all_userdata();
		$username				= $this->session->userdata('username');
		$data['level']= $this->login_m->getLevel($username);
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
			$data['sukses']  = '
					<div class="alert alert-danger"><p><strong>Username sudah terdaftar, Input dengan username lain</strong></p></div>';
			$this->load->view('head');
			$this->load->view('header');
			$this->load->view('navigasi',$data);
			$this->load->view('KaryawanForm',$data);
			$this->load->view('right');
			$this->load->view('footer'); 
		}
		elseif($this->karyawan_model->simpanKaryawan())
		{
			//load notifikasi sukses
			$data['sukses']  = '
					<div class="alert alert-success"><p><strong>Input Data Karyawan Sukses</strong></p></div>';
			$this->load->view('head');
			$this->load->view('header');
			$this->load->view('navigasi',$data);
			$this->load->view('KaryawanForm',$data);
			$this->load->view('right');
			$this->load->view('footer'); 
		}
		else
		{
			//load notifikasi gagal
			$data['error']  = '
							<div class="alert alert-danger">
								<p><strong>Input Karyawan Data Gagal!</strong></p>
							</div>';
			$this->load->view('head');
			$this->load->view('header');
			$this->load->view('navigasi',$data);
			$this->load->view('KaryawanForm',$data); 
			$this->load->view('right');
			$this->load->view('footer'); 
		}
	}	
	//ubah
	public function ubah()
	{
		$data['session']	= $this->session->all_userdata();
		$username			= $this->session->userdata('username');
		$data['level']= $this->login_m->getLevel($username);
		$username				= $this->input->get('username');
		$data['karyawan']		= $this->karyawan_model->getKaryawanUpdate($username);
		//$data['divisi'] 	= $this->divisi_model->getData(); 
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('navigasi',$data);
		$this->load->view('KaryawanForm',$data);
		$this->load->view('right');
		$this->load->view('footer');				
	}
	public function prosesUbah()
	{
		$data['session']	= $this->session->all_userdata();
		$username			= $this->session->userdata('username');
		$data['level']= $this->login_m->getLevel($username);
		$username				= $this->input->get('username');
		//Jika update data sukses
		if($this->karyawan_model->ubah())
		{
			//load notifikasi sukses
			$data['sukses']= '
							<div class="alert alert-success">
								<p><strong>Update Data Karyawan Sukses</strong></p>
							</div>';
			$data['karyawan']	= $this->karyawan_model->getKaryawanUpdate($username);
			$this->load->view('head');
			$this->load->view('header');
			$this->load->view('navigasi',$data);
			$this->load->view('KaryawanForm',$data);
			$this->load->view('right');
			$this->load->view('footer');				
		}
		//Jika update data tidak sukses
		else
		{
			//load notifikasi gagal
			$data['error'] = '
								<div class="alert alert-danger">
									<p><strong>Update Data karyawan Gagal!</strong></p>
								</div>';
			$data['karyawan']	= $this->karyawan_model->getKaryawanUpdate($username);
			$this->load->view('head');
			$this->load->view('header');
			$this->load->view('navigasi',$data);
			$this->load->view('KaryawanForm',$data);
			$this->load->view('right');
			$this->load->view('footer');
		}
	}
	
	//function hapus
	public function hapus()
	{
		$data['session']	= $this->session->all_userdata();
		$username			= $this->session->userdata('username');
		$data['level']= $this->login_m->getLevel($username);
		$username	= $this->input->get('username');
		//panggil query hapus di model
		$this->karyawan_model->hapus($username);
		$data['karyawan'] = $this->karyawan_model->getData(); 
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('navigasi',$data);
		$this->load->view('KaryawanList',$data);
		$this->load->view('right');
		$this->load->view('footer-table');
	}
}

?>