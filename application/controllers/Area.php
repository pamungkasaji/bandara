<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Area extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('area_model');
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
		$data['area'] = $this->area_model->getArea(); 
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('navigasi',$data);
		$this->load->view('AreaList',$data);
		$this->load->view('right');
		$this->load->view('footer-table');
	}
	//function tambahArea
	public function tambahArea()
	{
		$data['session']	= $this->session->all_userdata();
		$username				= $this->session->userdata('username');
		$data['level']= $this->login_m->getKodeDivisi($username);
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('navigasi',$data);
		$this->load->view('AreaForm'); 
		$this->load->view('right');
		$this->load->view('footer');
	}
	//function input data
	public function simpanArea()
	{
		$data['session']	= $this->session->all_userdata();
		$username				= $this->session->userdata('username');
		$data['level']= $this->login_m->getKodeDivisi($username);
		//Untuk Validasi	
		$this->load->library('javascript');
		//query simpan data Area
		if($this->area_model->simpanArea())
		{
			//load notifikasi sukses
			$data['sukses']  = '
					<div class="msg msg-ok"><p><strong>Input Data Area Sukses</strong></p></div>';
			$this->load->view('head');
			$this->load->view('header');
			$this->load->view('navigasi',$data);
			$this->load->view('AreaForm',$data); //load view AreaForm
			$this->load->view('right');
			$this->load->view('footer'); 
		}
		else
		{
			//load notifikasi gagal
			$data['error']  = '
							<div class="msg msg-error">
								<p><strong>Input Area Data Gagal!</strong></p>
							</div>';
			$this->load->view('head');
			$this->load->view('header');
			$this->load->view('navigasi',$data);
			$this->load->view('AreaForm',$data); 
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
		$id_area		= $this->input->get('id_area');
		$data['area']		= $this->area_model->getAreaUpdate($id_area);
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('navigasi',$data);
		$this->load->view('AreaForm',$data);
		$this->load->view('right');
		$this->load->view('footer');				
	}
	public function prosesUbah()
	{
		$data['session']	= $this->session->all_userdata();
		$username				= $this->session->userdata('username');
		$data['level']= $this->login_m->getKodeDivisi($username);
		$id_area	= $this->input->get('id_area');
		//Jika update data sukses
		if($this->area_model->ubah())
		{
			//load notifikasi sukses
			$data['sukses']= '
							<div class="msg msg-ok">
								<p><strong>Update Data Area Sukses</strong></p>
							</div>';
			$data['area']	= $this->area_model->getAreaUpdate($id_area);
			$this->load->view('head');
			$this->load->view('header');
			$this->load->view('navigasi',$data);
			$this->load->view('AreaForm',$data);
			$this->load->view('right');
			$this->load->view('footer');				
		}
		//Jika update data tidak sukses
		else
		{
			//load notifikasi gagal
			$data['error'] = '
								<div class="msg msg-error"><p><strong>Update Data Area Gagal!</strong></p>
								</div>';
			$data['area']	= $this->area_model->getAreaUpdate($id_area);
			$this->load->view('head');
			$this->load->view('header');
			$this->load->view('navigasi');
			$this->load->view('AreaForm',$data);
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
		$id_area		= $this->input->get('id_area');
		//panggil query hapus di model
		$this->area_model->hapus($id_area);
		$data['area'] = $this->area_model->getArea(); 
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('navigasi',$data);
		$this->load->view('AreaList',$data);
		$this->load->view('right');
		$this->load->view('footer-table');
	}
}

?>