<?php
class Area_model extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
    }
	
	//function menampilkan data Area
	function getArea()
    {
		$query=$this->db->query("select * from area");
		foreach ($query->result_array() as $row) {$array[] = $row;}
		if (!isset($array)) { $array='';}
		$query->free_result();
		return $array;
	}
	//function menampilkan data Area yang akan di Update ke Form
	function getAreaUpdate($kode)
    {
		$query=$this->db->query("select * from area where id_area='$kode'");
		foreach ($query->result_array() as $row) {$array[] = $row;}
		if (!isset($array)) { $array='';}
		$query->free_result();
		return $array;
	}
	
	//function hapus data Area
	function hapus($kode)
    {
		 $sql = "delete from area  WHERE id_area ='$kode'"; 
		 $this->db->query($sql);
		 return true;
    }
	
	//tambah
	function simpanArea()
    {
		$CI =& get_instance();
		$CI->load->database('default');
		$nama_area		= $_POST['nama_area'];
		//insert
		$sql = "insert into area(nama_area) values('$nama_area')"; 
		$this->db->query($sql);
		return true;
    }
	function ubah()
    {
		$CI =& get_instance();
		$CI->load->database('default');
		$id_area		= $_POST['id_area'];
		$nama_area		= $_POST['nama_area'];
		$sql = "update area set nama_area='$nama_area' where id_area='$id_area'"; 
		$this->db->query($sql);
		return true;

    }
	
}
?>