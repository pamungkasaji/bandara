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
		$query=$this->db->query("select material.*,ruang_lingkup.*,subarea.nama_subarea from material,ruang_lingkup,subarea where material.id_material=ruang_lingkup.id_material and ruang_lingkup.id_subarea=subarea.id_subarea");
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
	function getMTRUpdate($kode)
    {
		$query=$this->db->query("select ruang_lingkup.*,subarea.nama_subarea from ruang_lingkup,subarea,material where material.id_material=ruang_lingkup.id_material and ruang_lingkup.id_subarea=subarea.id_subarea and ruang_lingkup.id_material='$kode'");
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
