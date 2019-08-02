<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardAdmin extends CI_Controller {


	function __construct()
	{
		parent::__construct();
		$this->load->model('login_m');
		$this->load->model('dashboardadmin_model');
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
		$data['logo'] = $this->login_m->ambil_gambar($this->session->userdata('id_karyawan'));

		$data['kerusakan'] = $this->dashboardadmin_model->getKerusakanIni();
		$data['kehilangan'] = $this->dashboardadmin_model->getKehilanganIni();
		$data['absensi'] = $this->dashboardadmin_model->getAbsensiIni();
		$data['penilaian'] = $this->dashboardadmin_model->getPenilaianIni();

		$this->Navbar_model->view_loader('DashboardAdminView', $data);
	}
	
}