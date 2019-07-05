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
			redirect('Welcome');	
		}
	}
	
 
	public function cekStatusLogin()
	{
		$username 			= 	$this->input->post('username');
		$password 			= 	$this->input->post('password');
		$data				=	array('username'=>$username,'logged_in'=>TRUE);
		$this->session->set_userdata($data);
		$data['session']	=	$this->session->all_userdata();
		$data['level']= 	$this->login_m->getKodeDivisi($username);
		//Jika Login berhasil 
		if($this->login_m->validasi($username,$password))
		{
			redirect('Welcome');					
		}
		//Jika tidak berhasil Login
		else
		{
			$data['error']  = '
								<div class="alert alert-danger">
									<p align="center"><strong>username atau Password Anda Tidak Sesuai.</strong></p>
								</div>';
			$this->load->view('head');
			$this->load->view('LoginForm',$data);	
		}
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
