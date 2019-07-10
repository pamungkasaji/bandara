<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Subarea extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('subarea_model');
		$this->load->model('m_dashboard');
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
		$data['subarea'] = $this->subarea_model->getSubarea(); 
		$nav['username']     = $this->session->userdata('username');
	    $nav['level']    = $this->login_m->getLevel($nav['username']);
	    $nav['logo'] = $this->m_dashboard->ambil_gambar($this->session->userdata('id_karyawan'));
	    $nav['id_user'] = $this->session->userdata('id_karyawan');
	    //include head, header, footer di view dihapus dulu
	    //parameter $data tidak diubah, ikut controller bersangkutan, 
	    //kalo parameter $nav sama di semua controller
	    $this->load->view('template/head');
    	$this->load->view('template/nav_header',$nav);
		$this->load->view('SubareaListModalCoba',$data);
		$this->load->view('template/footer');

	}
	//function tambahSubarea
	public function tambahSubarea()
	{
		$data['session']	= $this->session->all_userdata();
		$username				= $this->session->userdata('username');
		$data['level']= $this->login_m->getLevel($username);

		$this->load->view('SubareaForm',$data); 

	}
	//function input data
	public function simpanSubarea()
	{
		$data['session']	= $this->session->all_userdata();
		$username				= $this->session->userdata('username');
		$data['level']= $this->login_m->getLevel($username);
		//Untuk Validasi	
		$this->load->library('javascript');
		//query simpan data Subarea
		if($this->subarea_model->simpanSubarea())
		{
			//load notifikasi sukses
			$data['sukses']  = '
					<div class="alert alert-success"><p><strong>Input Data Subarea Sukses</strong></p></div>';

			$this->load->view('SubareaForm',$data); //load view SubareaForm

		}
		else
		{
			//load notifikasi gagal
			$data['error']  = '
							<div class="msg msg-error">
								<p><strong>Input Subarea Data Gagal!</strong></p>
							</div>';

			$this->load->view('SubareaForm',$data); 

		}
	}	
	//ubah
	public function ubah()
	{
		$data['session']	= $this->session->all_userdata();
		$username				= $this->session->userdata('username');
		$data['level']= $this->login_m->getLevel($username);	
		$id_subarea		= $this->input->get('id_subarea');
		$data['subarea']		= $this->subarea_model->getSubareaUpdate($id_subarea);

		$this->load->view('SubareaForm',$data);
		
	}
	public function prosesUbah()
	{
		$data['session']	= $this->session->all_userdata();
		$username				= $this->session->userdata('username');
		$data['level']= $this->login_m->getLevel($username);
		$id_subarea	= $this->input->get('id_subarea');
		//Jika update data sukses
		if($this->subarea_model->ubah())
		{
			//load notifikasi sukses
			$data['sukses']= '
							<div class="alert alert-success">
								<p><strong>Update Data Subarea Sukses</strong></p>
							</div>';
			$data['subarea']	= $this->subarea_model->getSubareaUpdate($id_subarea);

			$this->load->view('SubareaForm',$data);
			
		}
		//Jika update data tidak sukses
		else
		{
			//load notifikasi gagal
			$data['error'] = '
								<div class="msg msg-error"><p><strong>Update Data Subarea Gagal!</strong></p>
								</div>';
			$data['subarea']	= $this->subarea_model->getSubareaUpdate($id_subarea);

			$this->load->view('SubareaForm',$data);

		}
	}
	
	//function hapus
	public function hapus()
	{
		$data['session']	= $this->session->all_userdata();
		$username				= $this->session->userdata('username');
		$data['level']= $this->login_m->getLevel($username);
		$id_subarea		= $this->input->get('id_subarea');
		//panggil query hapus di model
		$this->subarea_model->hapus($id_subarea);
		$data['subarea'] = $this->subarea_model->getSubarea(); 

		$this->load->view('SubareaList',$data);

	}
}

?>