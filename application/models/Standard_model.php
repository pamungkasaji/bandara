<?php
class Standard_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

	//function menampilkan data Standard
	function getStandard()
    {
		$query=$this->db->query("select standard.*,memiliki.*,material.nama_material from standard,memiliki,material where standard.id_standard=memiliki.id_standard and memiliki.id_material=material.id_material");
		foreach ($query->result_array() as $row) {$array[] = $row;}
		if (!isset($array)) { $array='';}
		$query->free_result();
		return $array;
	}
	//function menampilkan data Standard yang akan di Update ke Form
	function getStandardUpdate($kode)
    {
		$query=$this->db->query("select * from standard where id_standard='$kode'");
		foreach ($query->result_array() as $row) {$array[] = $row;}
		if (!isset($array)) { $array='';}
		$query->free_result();
		return $array;
	}
	function getSTDUpdate($kode)
    {
		$query=$this->db->query("select memiliki.*,material.nama_material from memiliki,material,standard where standard.id_standard=memiliki.id_standard and memiliki.id_material=material.id_material and memiliki.id_standard='$kode'");
		foreach ($query->result_array() as $row) {$array[] = $row;}
		if (!isset($array)) { $array='';}
		$query->free_result();
		return $array;
	}

	//function hapus data Standard
	function hapus($kode)
    {
		 $sql = "delete from standard  WHERE id_standard ='$kode'"; 
		 $this->db->query($sql);

		 return true;
    }

	//tambah
	function simpanStandard()
    {
		$CI =& get_instance();
		$CI->load->database('default');
		$id_standard		= $_POST['id_standard'];
		$nama_standard		= $_POST['nama_standard'];
		$pertanyaan		= $_POST['pertanyaan'];
		$id_material	= $_POST['id_material'];
		//insert
		$sql = "insert into standard(nama_standard,pertanyaan) values('$nama_standard','$pertanyaan')";
		$this->db->query($sql);
		$sqli="insert into memiliki (id_standard,id_material) values(LAST_INSERT_ID(),'$id_material')";
		$this->db->query($sqli);
		return true;
    }
	function ubah()
    {
		$CI =& get_instance();
		$CI->load->database('default');
		$id_standard		= $_POST['id_standard'];
		$nama_standard		= $_POST['nama_standard'];
		$pertanyaan		= $_POST['pertanyaan'];
		$id_material	= $_POST['id_material'];
		$sql = "update standard set nama_standard='$nama_standard', pertanyaan='$pertanyaan' where id_standard='$id_standard'";
		$this->db->query($sql);
		$sqli="update memiliki set id_standard='$id_standard', id_material='$id_material' where id_standard='$id_standard'";
		$this->db->query($sqli);
		return true;

    }

}
?>
