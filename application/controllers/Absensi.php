<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends CI_Controller {


	function __construct()
	{
		parent::__construct();
		$this->load->model('login_m');
		$this->load->model('absensi_model');
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
		$data['absensi'] = $this->absensi_model->getAbsensi();
		$data['logo'] = $this->login_m->ambil_gambar($this->session->userdata('id_karyawan'));
	    //include head, header, footer di view dihapus dulu
	    //parameter $data tidak diubah, ikut controller bersangkutan,
	    //kalo parameter $nav sama di semua controller
		$this->Navbar_model->view_loader('AbsensiList', $data);
		//var_dump($data['data']);
	}

	public function cetakAbsensi()
	{
		//$dari		= $_POST['dari'];
		$dari = $this->input->post('dari');
		$hingga = $this->input->post('hingga');
		$status = $this->input->post('status');
		$data['session']	= $this->session->all_userdata();
		$this->load->library('pdf');

		$data['data'] = $this->absensi_model->cetakAbsensi($dari, $hingga, $status);

		$this->pdf->generate('Laporan/CetakLaporanAbsensi', $data, 'laporan-absensi', 'A4', 'landscape');

	}

	public function hapus()
	{
		$data['session']	= $this->session->all_userdata();
		$id_absensi		= $this->input->get('id_absensi');
		$data['logo'] = $this->login_m->ambil_gambar($this->session->userdata('id_karyawan'));
		//panggil query hapus di model
		if($this->absensi_model->hapus($id_absensi))
		{
			//load notifikasi sukses
			$data['sukses']= '
			<div class="alert alert-success">
			<p><strong>Hapus Data Absensi Sukses</strong></p>
			</div>';
			$data['absensi'] = $this->absensi_model->getAbsensi();

			$this->Navbar_model->view_loader('AbsensiList', $data);
		}
		//Jika update data tidak sukses
		else
		{
			//load notifikasi gagal
			$data['error'] = '
			<div class="msg msg-error"><p><strong>Hapus Data Absensi Gagal!</strong></p>
			</div>';
			$data['absensi'] = $this->absensi_model->getAbsensi();

			$this->Navbar_model->view_loader('AbsensiList', $data);
		}

	}

}