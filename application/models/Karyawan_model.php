<?php
class Karyawan_model extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
    }
	
	//function menampilkan data Karyawan
	function getData()
    {
		$query=$this->db->query("select * from karyawan");
		foreach ($query->result_array() as $row) {$array[] = $row;}
		if (!isset($array)) { $array='';}
		$query->free_result();
		return $array;
	}
	//function menampilkan data Karyawan yang akan di Update ke Form
	function getKaryawanUpdate($kode)
    {
		$query=$this->db->query("select * from karyawan where username='$kode'");
		foreach ($query->result_array() as $row) {$array[] = $row;}
		if (!isset($array)) { $array='';}
		$query->free_result();
		return $array;
	}
	//cek duplikat
	function cek($username)
    {
		$query=$this->db->query("select username from karyawan where username='$username'");
		foreach ($query->result_array() as $row) {$array[] = $row;}
		if (!isset($array)) { $array='';}
		$query->free_result();
		return $array;
	}
	
	//function hapus data Karyawan
	function hapus($kode)
    {
		 $sql = "delete from karyawan  WHERE username ='$kode'"; 
		 $this->db->query($sql);
		 return true;
    }
	
	//tambah
	function simpanKaryawan()
    {
		$CI =& get_instance();
		$CI->load->database('default');
		if(!empty($_POST['username']))
		{
		$nama			= $_POST['nama'];
		$username		= $_POST['username'];
		$password		= $_POST['password'];
        $level			= $_POST['level'];
		//insert
		$sql = "insert into karyawan(nama,username,password,level) values('$nama','$username','$password','$level')"; 
		$this->db->query($sql);
		return true;
		}
		else
		{
		return false;	
		}
	
    }
	function ubah()
    {
		$CI =& get_instance();
		$CI->load->database('default');
		if(!empty($_POST['username']))
		{
		$nama			= $_POST['nama'];
		$username		= $_POST['username'];
		$password		= $_POST['password'];
        $level			= $_POST['level'];
		$sql = "update karyawan set nama='$nama',password='$password',level='$level' where username='$username'"; 
		$this->db->query($sql);
		return true;
		}
		else
		{
		return false;	
		}

    }
	
}
?>