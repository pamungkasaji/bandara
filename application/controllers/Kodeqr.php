<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kodeqr extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('kodeqr_model');
		$this->load->library('pdf');
		$this->load->model('area_model');
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
		$username			= $this->session->userdata('username');
		$data['level']		= $this->login_m->getLevel($username);
		$data['kodeqr'] 	= $this->kodeqr_model->getKodeqr(); 

		$this->load->view('KodeqrList',$data);

	}
	//function tambahKodeqr
	public function pdfdetails()
	 {
	  if($this->uri->segment(3))
	  {
	   $id_kodeqr = $this->uri->segment(3);
	   $html_content = '<h3 align="center">Angkasa Pura</h3>';
	   $html_content .= $this->kodeqr_model->fetch_single_details($id_kodeqr);
	   $this->pdf->loadHtml($html_content);
	   $this->pdf->render();
	   $this->pdf->stream("".$id_kodeqr.".pdf", array("Attachment"=>0));
	  }
	 }
	public function tambahKodeqr()
	{
		$data['session']	= $this->session->all_userdata();
		$username			= $this->session->userdata('username');
		$data['level']		= $this->login_m->getLevel($username);
		$data['subarea'] 	= $this->subarea_model->getSubarea(); 
		$data['area'] 		= $this->area_model->getArea();
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('navigasi',$data);
		$this->load->view('KodeqrForm',$data); 
		$this->load->view('right');
		$this->load->view('footer');
	}
	
	//function input data
	/*
	function simpanKodeqr(){
        $id_area=$this->input->post('id_area');
        $id_subarea=$this->input->post('id_subarea');
 
        $this->load->library('ciqrcode'); //pemanggilan library QR CODE
 
        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './assets/'; //string, the default is application/cache/
        $config['errorlog']     = './assets/'; //string, the default is application/logs/
        $config['imagedir']     = './assets/images/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);
 
        $image_name=$id_area.'/'.$id_subarea.'.png'; //buat name dari qr code sesuai dengan nim
 
        $params['data'] = 'localhost/bandara/Penilaian/IsiNilai/'.$id_area.'/'.$id_subarea; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
 
        $this->kodeqr_model->simpanKodeqr($id_area,$id_subarea,$image_name); //simpan ke database
        redirect('Kodeqr'); //redirect ke mahasiswa usai simpan data
    }
	*/

    function simpanKodeqr(){
        $id_area=$this->input->post('id_area');
        $id_subarea=$this->input->post('id_subarea');

        $this->load->library('ciqrcode'); //pemanggilan library QR CODE

        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './assets/'; //string, the default is application/cache/
        $config['errorlog']     = './assets/'; //string, the default is application/logs/
        $config['imagedir']     = './assets/images/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);

        $image_name=$id_area.'-'.$id_subarea.'.png'; //buat name dari qr code sesuai dengan nim

        $params['data'] = 'localhost/bandara/Penilaian/IsiNilai/'.$id_area.'/'.$id_subarea; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

        $this->kodeqr_model->simpanKodeqr($id_area,$id_subarea,$image_name); //simpan ke database
        redirect('Kodeqr'); //redirect ke mahasiswa usai simpan data
    }
	/*
	public function simpanKodeqr()
	{
		$data['session']	= $this->session->all_userdata();
		$username				= $this->session->userdata('username');
		$data['level']= $this->login_m->getLevel($username);
		$data['subarea'] 	= $this->subarea_model->getSubarea(); 
		
		$this->load->library('ciqrcode'); //pemanggilan library QR CODE
 
        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './assets/'; //string, the default is application/cache/
        $config['errorlog']     = './assets/'; //string, the default is application/logs/
        $config['imagedir']     = './assets/images/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);
 
        $image_name=$subarea.'.png'; //buat name dari qr code sesuai dengan nim
 
        $params['kodeqr'] = $id_kodeqr; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

		//query simpan data staff
		if($this->kodeqr_model->simpanKodeqr())
		{
			//load notifikasi sukses
			$data['sukses']  = '
					<div class="alert alert-success">
					<p><strong>Input Data Kodeqr Sukses</strong></p>
					</div>';
			$this->load->view('head');
			$this->load->view('header');
			$this->load->view('navigasi',$data);
			$this->load->view('KodeqrForm',$data);
			$this->load->view('right');
			$this->load->view('footer'); 
		}
		else
		{
			//load notifikasi gagal
			$data['error']  = '
							<div class="alert alert-danger">
									<p><strong>Input Data Kodeqr  Data Gagal!</strong></p>
								</div>';
			$this->load->view('head');
			$this->load->view('header');
			$this->load->view('navigasi',$data);
			$this->load->view('KodeqrForm',$data); 
			$this->load->view('right');
			$this->load->view('footer'); 
		}
	}
	*/
	//ubah
	public function ubah()
	{
		$data['session']	= $this->session->all_userdata();
		$username			= $this->session->userdata('username');
		$data['level']		= $this->login_m->getLevel($username);
		$id_kodeqr			= $this->input->get('id_kodeqr');
		$data['kodeqr']		= $this->kodeqr_model->getKodeqrUpdate($id_kodeqr);
		$data['subarea'] 	= $this->subarea_model->getSubarea(); 
		$data['area'] 		= $this->area_model->getArea();
		
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('navigasi',$data);
		$this->load->view('KodeqrForm',$data);
		$this->load->view('right');
		$this->load->view('footer');				
	}
	public function prosesUbah()
	{
		$data['session']	= $this->session->all_userdata();
		$username			= $this->session->userdata('username');
		$data['level']		= $this->login_m->getLevel($username);
		$id_kodeqr			= $this->input->get('id_kodeqr');
		$data['subarea'] 	= $this->subarea_model->getSubarea(); 
		$data['area'] 		= $this->area_model->getArea();
		//Jika update data sukses
		if($this->kodeqr_model->ubah())
		{
			//load notifikasi sukses
			$data['sukses']		= '
								<div class="alert alert-success">
									<p><strong>Update Data Kodeqr Sukses</strong></p>
								</div>';
			$data['kodeqr']	= $this->kodeqr_model->getKodeqrUpdate($id_kodeqr);
			$this->load->view('head');
			$this->load->view('header');
			$this->load->view('navigasi',$data);
			$this->load->view('KodeqrForm',$data);
			$this->load->view('right');
			$this->load->view('footer');				
		}
		//Jika update data tidak sukses
		else
		{
			//load notifikasi gagal
			$data['error'] = '
								<div class="alert alert-danger"><p><strong>Update Data Kodeqr Gagal!</strong></p>
								</div>';
			$data['kodeqr']	= $this->kodeqr_model->getKodeqrUpdate($id_kodeqr);
			$this->load->view('head');
			$this->load->view('header');
			$this->load->view('navigasi',$data);
			$this->load->view('KodeqrForm',$data);
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
		$id_kodeqr	= $this->input->get('id_kodeqr');
		$this->kodeqr_model->hapus($id_kodeqr);
		$data['kodeqr'] = $this->kodeqr_model->getKodeqr(); 
		redirect('Kodeqr');
	}
	/*
	public function stokTipis()
	{
		$data['session']	= $this->session->all_userdata();
		$username				= $this->session->userdata('username');
		$data['level']= $this->login_m->getLevel($username);
		$data['kodeqr'] = $this->kodeqr_model->getStok(); 
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('navigasi',$data);
		$this->load->view('KodeqrStok',$data);
		$this->load->view('right');
		$this->load->view('footer-table');
	}
	*/
}

?>