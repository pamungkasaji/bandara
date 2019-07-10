<?php
class Subarea_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

	//function menampilkan data Subarea
	function getSubarea()
    {
		$query=$this->db->query("select * from subarea");
		foreach ($query->result_array() as $row) {$array[] = $row;}
		if (!isset($array)) { $array='';}
		$query->free_result();
		return $array;
	}
	//function menampilkan data Subarea yang akan di Update ke Form
	function getSubareaUpdate($kode)
    {
		$query=$this->db->query("select * from subarea where id_subarea='$kode'");
		foreach ($query->result_array() as $row) {$array[] = $row;}
		if (!isset($array)) { $array='';}
		$query->free_result();
		return $array;
	}

	//function hapus data Subarea
	function hapus($kode)
    {
		 $sql = "delete from subarea  WHERE id_subarea ='$kode'";
		 $this->db->query($sql);
		 return true;
    }

	//tambah
	function simpanSubarea()
    {
		$CI =& get_instance();
		$CI->load->database('default');
		$nama_subarea		= $_POST['nama_subarea'];
		//insert
		$sql = "insert into subarea(nama_subarea) values('$nama_subarea')";
		$this->db->query($sql);
		return true;
    }
	function ubah()
    {
		$CI =& get_instance();
		$CI->load->database('default');
		$id_subarea		= $_POST['id_subarea'];
		$nama_subarea		= $_POST['nama_subarea'];
		$sql = "update subarea set nama_subarea='$nama_subarea' where id_subarea='$id_subarea'";
		$this->db->query($sql);
		return true;

    }

}
?>
