<?php
class Penilaian_model extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
    }
	//function mengambil data area
	
	function simpanPenilaian()
    {
		$CI =& get_instance();
		$CI->load->database('default');
		//insert
		if(!empty($_POST['id_area']))
		{
			$id_area		= $_POST['id_area'];
			$nama_area		= $_POST['nama_area'];
			$id_subarea		= $_POST['id_subarea'];
			$qr_code		= $_POST['image_name'];
			$sql = "insert into area(id_area, nama_area, id_subarea, qr_code) values('$id_area','$nama_area','$id_subarea','$image_name')"; 
			$this->db->query($sql);
			return true;
		}
		else
		{
			return false;
		}
    }
  }