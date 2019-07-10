<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Navbar_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function view_loader($view, $data){
    $this->load->view('template/head');
    $this->load->view('template/nav_header',$data);
		$this->load->view($view,$data);
		$this->load->view('template/footer');
  }

}
