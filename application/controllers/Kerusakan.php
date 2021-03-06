<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kerusakan extends CI_Controller {


	function __construct()
	{
		parent::__construct();
		$this->load->model('login_m');
		$this->load->model('kerusakan_model');
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
		$data['kerusakan'] = $this->kerusakan_model->getKerusakan();
		$data['logo'] = $this->login_m->ambil_gambar($this->session->userdata('id_karyawan'));
	    //include head, header, footer di view dihapus dulu
	    //parameter $data tidak diubah, ikut controller bersangkutan,
	    //kalo parameter $nav sama di semua controller
		$this->Navbar_model->view_loader('KerusakanList', $data);

		//var_dump($data['data']);
	}

	public function cetakKerusakan()
	{
		//$dari		= $_POST['dari'];
		$dari = $this->input->post('dari');
		$hingga = $this->input->post('hingga');
		$status = $this->input->post('status');
		$data['session']	= $this->session->all_userdata();
		$this->load->library('pdf');
		$data['data'] = $this->kerusakan_model->cetakKerusakan($dari, $hingga, $status);

		$this->pdf->generate('Laporan/CetakLaporanKerusakan', $data, 'laporan-kerusakan', 'A4', 'landscape');

	}

	public function ubahStatusRusak()
	{
		$id_kerusakan		= $this->input->get('id_kerusakan');
		$this->kerusakan_model->ubahStatusRusak($id_kerusakan);
		redirect('Kerusakan');

	}

	public function ubahStatusDiperbaiki()
	{
		$id_kerusakan		= $this->input->get('id_kerusakan');
		$this->kerusakan_model->ubahStatusDiperbaiki($id_kerusakan);
		redirect('Kerusakan');

	}

	public function hapus()
	{
		$data['session']	= $this->session->all_userdata();
		$id_kerusakan		= $this->input->get('id_kerusakan');
		$data['logo'] = $this->login_m->ambil_gambar($this->session->userdata('id_karyawan'));
		//panggil query hapus di model
		if($this->kerusakan_model->hapus($id_kerusakan))
		{
			//load notifikasi sukses
			$data['sukses']= '
			<div class="alert alert-success">
			<p><strong>Hapus Data Kerusakan Sukses</strong></p>
			</div>';
			$data['kerusakan'] = $this->kerusakan_model->getKerusakan();

			$this->Navbar_model->view_loader('KerusakanList', $data);
		}
		//Jika update data tidak sukses
		else
		{
			//load notifikasi gagal
			$data['error'] = '
			<div class="msg msg-error"><p><strong>Hapus Data Kerusakan Gagal!</strong></p>
			</div>';
			$data['kerusakan'] = $this->kerusakan_model->getKerusakan();

			$this->Navbar_model->view_loader('KerusakanList', $data);
		}

	}

}
