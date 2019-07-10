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
		$nama_material		= $_POST['nama_material'];
		//insert
		$sql = "insert into material(nama_material) values('$nama_material')";
		$this->db->query($sql);
		return true;
    }
	function ubah()
    {
		$CI =& get_instance();
		$CI->load->database('default');
		$id_material		= $_POST['id_material'];
		$nama_material		= $_POST['nama_material'];
		$sql = "update material set nama_material='$nama_material' where id_material='$id_material'";
		$this->db->query($sql);
		return true;

    }

}
?>
