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
	    $level	= $this->session->userdata('level');
		if ($level != 'admin') {
			$message = "Anda tidak memiliki akses ke halaman ini";
			echo "<script type='text/javascript'>alert('$message') ;</script>";
			echo "<a href=\"javascript:history.go(-1)\">KEMBALI</a>";
		}else{
			$this->Navbar_model->view_loader('KehilanganList', $data);
		}
		//var_dump($data['data']);
	}

	public function cetakLaporanKehilangan()
	{
		//$dari		= $_POST['dari'];
		$dari = $this->input->post('dari');
		$hingga = $this->input->post('hingga');
		$data['session']	= $this->session->all_userdata();
		$this->load->library('pdf');
		$data['data'] = $this->kehilangan_model->getKehilanganRange($dari, $hingga);
		if (is_array($data)){
			$this->pdf->generate('Laporan/CetakLaporanKehilangan', $data, 'laporan-sca', 'A4', 'landscape');
		}else{
			confirm('Yakin data anda ingin di hapus??');
		}
		
	}

	public function ubahStatusHilang()
	{
		$id_kehilangan		= $this->input->get('id_kehilangan');
		$this->kehilangan_model->ubahStatusHilang($id_kehilangan);
		redirect('Kehilangan');

	}

	public function ubahStatusMenemukan()
	{
		$id_kehilangan		= $this->input->get('id_kehilangan');
		$this->kehilangan_model->ubahStatusMenemukan($id_kehilangan);
		redirect('Kehilangan');

	}

	public function ubahStatusDikembalikan()
	{
		$id_kehilangan		= $this->input->get('id_kehilangan');
		$this->kehilangan_model->ubahStatusDikembalikan($id_kehilangan);
		redirect('Kehilangan');

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
			<p><strong>Hapus Data Kehilangan Sukses</strong></p>
			</div>';
			$data['kehilangan'] = $this->kehilangan_model->getKehilangan();

			$this->Navbar_model->view_loader('KehilanganList', $data);
		}
		//Jika update data tidak sukses
		else
		{
			//load notifikasi gagal
			$data['error'] = '
			<div class="msg msg-error"><p><strong>Hapus Data Kehilangan Gagal!</strong></p>
			</div>';
			$data['kehilangan'] = $this->kehilangan_model->getKehilangan();

			$this->Navbar_model->view_loader('KehilanganList', $data);
		}

	}

}