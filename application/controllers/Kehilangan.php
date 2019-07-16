<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kehilangan extends CI_Controller {


	function __construct()
	{
		parent::__construct();
		$this->load->model('login_m');
		$this->load->model('kehilangan_model');
		$this->load->model('Navbar_model');
		if(!$this->session->userdata('id_karyawan'))
		{
			redirect('Login');
		}
		$this->load->helper(array('form', 'url','download'));
	}

	public function index()
	{

		$data['session']	= $this->session->all_userdata();
		$data['kehilangan'] = $this->kehilangan_model->getKehilangan();
		$data['logo'] = $this->login_m->ambil_gambar($this->session->userdata('id_karyawan'));
	    //include head, header, footer di view dihapus dulu
	    //parameter $data tidak diubah, ikut controller bersangkutan,
	    //kalo parameter $nav sama di semua controller
		$this->Navbar_model->view_loader('KehilanganList', $data);
	  //var_dump($data['kehilangan']);
	  //$this->Navbar_model->view_loader('SubareaList', $data);
	  //var_dump($data['kehilangan']);

		//var_dump($data['data']);
	}
	
	public function cetakLaporan()
	{
		$data['session']	= $this->session->all_userdata();
		$this->load->library('pdf');
		$data['data'] = $this->kehilangan_model->getKehilangan();

		$this->pdf->generate('Laporan/CetakLaporansca', $data, 'laporan-sca', 'A4', 'landscape');
		
	}

	public function cetakLaporansca()
	{
		if($this->uri->segment(3))
		{
			$id_kehilangan = $this->uri->segment(3);
			$data['session']	= $this->session->all_userdata();
			$this->load->library('pdf');
			$data['data'] = $this->kehilangan_model->getKehilanganDetail($id_kehilangan);
			//$data['coba'] = $this->kehilangan_model->getKehilanganDetailCoba($id_kehilangan);
			$this->pdf->generate('Laporan/CetakLaporansca', $data, 'laporan-sca', 'A4', 'landscape');
		}
	}

	public function cetakLaporanrange()
	{
		//$dari		= $_POST['dari'];
		$dari = $this->input->post('dari');
		$hingga = $this->input->post('hingga');
		$data['session']	= $this->session->all_userdata();
		$this->load->library('pdf');
		$data['data'] = $this->kehilangan_model->getKehilanganRange($dari, $hingga);

		$this->pdf->generate('Laporan/CetakLaporanrange', $data, 'laporan-sca', 'A4', 'landscape');
		
	}

		public function hapus()
	{
		$data['session']	= $this->session->all_userdata();
		$id_kehilangan		= $this->input->get('id_kehilangan');
		$data['logo'] = $this->login_m->ambil_gambar($this->session->userdata('id_karyawan'));
		//panggil query hapus di model
		if($this->kehilangan_model->hapus($id_kehilangan))
		{
			//load notifikasi sukses
			$data['sukses']= '
							<div class="alert alert-success">
								<p><strong>Hapus Data Subarea Sukses</strong></p>
							</div>';
							$data['kehilangan'] = $this->kehilangan_model->getKehilangan();

			$this->Navbar_model->view_loader('SubareaList', $data);
		}
		//Jika update data tidak sukses
		else
		{
			//load notifikasi gagal
			$data['error'] = '
								<div class="msg msg-error"><p><strong>Hapus Data Subarea Gagal!</strong></p>
								</div>';
								$data['kehilangan'] = $this->kehilangan_model->getKehilangan();

			$this->Navbar_model->view_loader('SubareaList', $data);
		}

	}

}