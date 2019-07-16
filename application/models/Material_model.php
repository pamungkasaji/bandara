<?php
class Material_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	//function menampilkan data Material
	function getMaterial()
	{
		$query=$this->db->query("select * from material");
		foreach ($query->result_array() as $row) {$array[] = $row;}
		if (!isset($array)) { $array='';}
		$query->free_result();
		return $array;
	}
	//function menampilkan data Material yang akan di Update ke Form
	function getMaterialUpdate($kode)
	{
		$query=$this->db->query("select * from material where id_material='$kode'");
		foreach ($query->result_array() as $row) {$array[] = $row;}
		if (!isset($array)) { $array='';}
		$query->free_result();
		return $array;
	}

	function getMaterialStandard($kode)
	{
		$query=$this->db->query("select * from memiliki where id_standard='$kode'");
		foreach ($query->result_array() as $row) {$array[] = $row;}
		if (!isset($array)) { $array='';}
		$query->free_result();
		return $array;
	}

	//function hapus data Material
	function hapus($kode)
	{
		$sql = "delete from material  WHERE id_material ='$kode'";
		$this->db->query($sql);
		return true;
	}

	//tambah
	function simpanMaterial()
	{
		$CI =& get_instance();
		$CI->load->database('default');
		$id_material	= $_POST['id_material'];
		$nama_material		= $_POST['nama_material'];
		$id_subarea	= $_POST['id_subarea'];
		//insert
		$sql = "insert into material(nama_material) values('$nama_material')";
		$this->db->query($sql);
		$sqli="insert into ruang_lingkup (id_material,id_subarea) values(LAST_INSERT_ID(),'$id_subarea')";
		$this->db->query($sqli);
		return true;
	}
	function ubah()
	{
		$CI =& get_instance();
		$CI->load->database('default');
		$id_material		= $_POST['id_material'];
		$nama_material		= $_POST['nama_material'];
		$id_subarea	= $_POST['id_subarea'];
		$sql = "update material set nama_material='$nama_material' where id_material='$id_material'";
		$this->db->query($sql);
		$sqli="update ruang_lingkup set id_material='$id_material', id_subarea='$id_subarea' where id_material='$id_material'";
		$this->db->query($sqli);
		return true;

	}

}
?>
