<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('login_m');
		$this->load->helper(array('form', 'url','download'));
	}
	public function index()
	{
		if(!$this->session->userdata('username'))
		{
			$this->load->view('LoginForm');
		}
		else
		{
			$level	= $this->session->userdata('level');
			if ($level == 'supervisor') {
				redirect('Dashboard');
			}        
			elseif ($level =='admin') {
				redirect('DashboardAdmin');
			}
			elseif ($level=='teamleader') {
				redirect('AwalTeamleader');
			}
		}
	}


	public function cekStatusLogin()
	{
		$username 			= 	$this->input->post('username');
		$password 			= 	$this->input->post('password');
		$this->login_m->validasi($username,$password);
	}

	public function keluar()
	{
		$this->session->sess_destroy();//ini sess_detroy ini dia menhaspu semua sessi yang berjalan
		$session = array('level','username','password');
		$this->session->unset_userdata($session);
		redirect('Login','refresh');//redirexk kehalaman utama
	}
}
?>
