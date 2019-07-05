<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Subarea extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('subarea_model');
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
		$data['level']= $this->login_m->getKodeDivisi($username);
		$data['subarea'] = $this->subarea_model->getSubarea(); 
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('navigasi',$data);
		$this->load->view('SubareaList',$data);
		$this->load->view('right');
		$this->load->view('footer-table');
	}
	//function tambahSubarea
	public function tambahSubarea()
	{
		$data['session']	= $this->session->all_userdata();
		$username				= $this->session->userdata('username');
		$data['level']= $this->login_m->getKodeDivisi($username);
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('navigasi',$data);
		$this->load->view('SubareaForm'); 
		$this->load->view('right');
		$this->load->view('footer');
	}
	//function input data
	public function simpanSubarea()
	{
		$data['session']	= $this->session->all_userdata();
		$username				= $this->session->userdata('username');
		$data['level']= $this->login_m->getKodeDivisi($username);
		//Untuk Validasi	
		$this->load->library('javascript');
		//query simpan data Subarea
		if($this->subarea_model->simpanSubarea())
		{
			//load notifikasi sukses
			$data['sukses']  = '
					<div class="msg msg-ok"><p><strong>Input Data Subarea Sukses</strong></p></div>';
			$this->load->view('head');
			$this->load->view('header');
			$this->load->view('navigasi',$data);
			$this->load->view('SubareaForm',$data); //load view SubareaForm
			$this->load->view('right');
			$this->load->view('footer'); 
		}
		else
		{
			//load notifikasi gagal
			$data['error']  = '
							<div class="msg msg-error">
								<p><strong>Input Subarea Data Gagal!</strong></p>
							</div>';
			$this->load->view('head');
			$this->load->view('header');
			$this->load->view('navigasi',$data);
			$this->load->view('SubareaForm',$data); 
			$this->load->view('right');
			$this->load->view('footer'); 
		}
	}	
	//ubah
	public function ubah()
	{
		$data['session']	= $this->session->all_userdata();
		$username				= $this->session->userdata('username');
		$data['level']= $this->login_m->getKodeDivisi($username);	
		$id_subarea		= $this->input->get('id_subarea');
		$data['subarea']		= $this->subarea_model->getSubareaUpdate($id_subarea);
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('navigasi',$data);
		$this->load->view('SubareaForm',$data);
		$this->load->view('right');
		$this->load->view('footer');				
	}
	public function prosesUbah()
	{
		$data['session']	= $this->session->all_userdata();
		$username				= $this->session->userdata('username');
		$data['level']= $this->login_m->getKodeDivisi($username);
		$id_subarea	= $this->input->get('id_subarea');
		//Jika update data sukses
		if($this->subarea_model->ubah())
		{
			//load notifikasi sukses
			$data['sukses']= '
							<div class="msg msg-ok">
								<p><strong>Update Data Subarea Sukses</strong></p>
							</div>';
			$data['subarea']	= $this->subarea_model->getSubareaUpdate($id_subarea);
			$this->load->view('head');
			$this->load->view('header');
			$this->load->view('navigasi',$data);
			$this->load->view('SubareaForm',$data);
			$this->load->view('right');
			$this->load->view('footer');				
		}
		//Jika update data tidak sukses
		else
		{
			//load notifikasi gagal
			$data['error'] = '
								<div class="msg msg-error"><p><strong>Update Data Subarea Gagal!</strong></p>
								</div>';
			$data['subarea']	= $this->subarea_model->getSubareaUpdate($id_subarea);
			$this->load->view('head');
			$this->load->view('header');
			$this->load->view('navigasi');
			$this->load->view('SubareaForm',$data);
			$this->load->view('right');
			$this->load->view('footer');
		}
	}
	
	//function hapus
	public function hapus()
	{
		$data['session']	= $this->session->all_userdata();
		$username				= $this->session->userdata('username');
		$data['level']= $this->login_m->getKodeDivisi($username);
		$id_subarea		= $this->input->get('id_subarea');
		//panggil query hapus di model
		$this->subarea_model->hapus($id_subarea);
		$data['subarea'] = $this->subarea_model->getSubarea(); 
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('navigasi',$data);
		$this->load->view('SubareaList',$data);
		$this->load->view('right');
		$this->load->view('footer-table');
	}
}

?>