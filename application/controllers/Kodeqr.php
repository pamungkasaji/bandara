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
    $data['kodeqr'] = $this->kodeqr_model->getKodeqr();
    $data['logo'] = $this->login_m->ambil_gambar($this->session->userdata('id_karyawan'));
	    //include head, header, footer di view dihapus dulu
	    //parameter $data tidak diubah, ikut controller bersangkutan,
	    //kalo parameter $nav sama di semua controller

    $this->Navbar_model->view_loader('KodeqrList', $data);
  }

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

	//function tambahKodeqr
public function tambahKodeqr()
{
 $data['logo'] = $this->login_m->ambil_gambar($this->session->userdata('id_karyawan'));
 $data['session']	= $this->session->all_userdata();
 $data['subarea'] 	= $this->subarea_model->getSubarea();
 $data['area'] 		= $this->area_model->getArea();

 $this->Navbar_model->view_loader('KodeqrForm', $data);

}

function simpanKodeqr(){
 $data['logo'] = $this->login_m->ambil_gambar($this->session->userdata('id_karyawan'));
 $data['session']	= $this->session->all_userdata();
 $data['subarea']    = $this->subarea_model->getSubarea();
 $data['area']       = $this->area_model->getArea();

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

        $params['data'] = base_url().'Form/input/'.$id_area.'/'.$id_subarea; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

        $this->kodeqr_model->simpanKodeqr($id_area,$id_subarea,$image_name); //simpan ke database

        $data['sukses']  = '
        <div class="alert alert-success"><p><strong>Input Data Kodeqr Sukses</strong></p></div>';

        $this->Navbar_model->view_loader('KodeqrForm', $data);
      }

	//ubah
      public function ubah()
      {
       $data['session']	= $this->session->all_userdata();
       $data['logo'] = $this->login_m->ambil_gambar($this->session->userdata('id_karyawan'));
       $id_kodeqr		= $this->input->get('id_kodeqr');
       $data['kodeqr']		= $this->kodeqr_model->getKodeqrUpdate($id_kodeqr);
       $data['subarea'] 	= $this->subarea_model->getSubarea();
       $data['area'] 		= $this->area_model->getArea();

       $this->Navbar_model->view_loader('KodeqrForm', $data);

     }
     public function prosesUbah()
     {
      $data['session']	= $this->session->all_userdata();
      $data['logo'] = $this->login_m->ambil_gambar($this->session->userdata('id_karyawan'));
      $id_kodeqr	= $this->input->get('id_kodeqr');
      $data['subarea'] 	= $this->subarea_model->getSubarea();
      $data['area'] 		= $this->area_model->getArea();

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

        $params['data'] = base_url().'Form/input/'.$id_area.'/'.$id_subarea; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

		//Jika update data sukses
        if($this->kodeqr_model->ubah($image_name))
        {
			//load notifikasi sukses
         $data['sukses']= '
         <div class="alert alert-success">
         <p><strong>Update Data Kodeqr Sukses</strong></p>
         </div>';
         $data['kodeqr'] = $this->kodeqr_model->getKodeqr();

         $this->Navbar_model->view_loader('KodeqrList', $data);
       }
		//Jika update data tidak sukses
       else
       {
			//load notifikasi gagal
         $data['error'] = '
         <div class="msg msg-error"><p><strong>Update Data Kodeqr Gagal!</strong></p>
         </div>';
         $data['kodeqr'] = $this->kodeqr_model->getKodeqr();

         $this->Navbar_model->view_loader('KodeqrList', $data);
       }
     }

	//function hapus
     public function hapus()
     {
      $data['session']	= $this->session->all_userdata();
      $id_kodeqr		= $this->input->get('id_kodeqr');
      $data['logo'] = $this->login_m->ambil_gambar($this->session->userdata('id_karyawan'));
		//panggil query hapus di model
      if($this->kodeqr_model->hapus($id_kodeqr))
      {
			//load notifikasi sukses
       $data['sukses']= '
       <div class="alert alert-success">
       <p><strong>Hapus Data Kodeqr Sukses</strong></p>
       </div>';
       $data['kodeqr'] = $this->kodeqr_model->getKodeqr();

       $this->Navbar_model->view_loader('KodeqrList', $data);
     }
		//Jika update data tidak sukses
     else
     {
			//load notifikasi gagal
       $data['error'] = '
       <div class="msg msg-error"><p><strong>Hapus Data Kodeqr Gagal!</strong></p>
       </div>';
       $data['kodeqr'] = $this->kodeqr_model->getKodeqr();

       $this->Navbar_model->view_loader('KodeqrList', $data);
     }

   }
 }

 ?>
