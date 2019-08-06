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

	function getSTDUpdate($kode)
	{
		$query=$this->db->query("select memiliki.*,standard.pertanyaan,standard.nama_standard from memiliki,standard where standard.id_standard=memiliki.id_standard and memiliki.id_material='$kode'");
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
		//$id_material	= $_POST['id_material'];
		$nama_material		= $_POST['nama_material'];
		$id_subarea	= $_POST['id_subarea'];
		//insert
		$sqli = "insert into material(nama_material) values('$nama_material')";
		$this->db->query($sqli);

		$id_material = $this->db->insert_id();
		//$id_material = mysqli_insert_id();

		$sqli="insert into ruang_lingkup (id_material,id_subarea) values(LAST_INSERT_ID(),'$id_subarea')";
		$this->db->query($sqli);

		$nama_standard = $_POST['nama_standard'];
		//var_dump($nama_standard);
		$keys = count($nama_standard);
		for($i = 0; $i < $keys; $i++) 
		{
			$id_standard		= $_POST['id_standard'][$i];
			$nama_standard		= $_POST['nama_standard'][$i];
			$pertanyaan = $_POST['pertanyaan'][$i];

			$sql2 = "insert into standard(nama_standard,pertanyaan) values('$nama_standard','$pertanyaan')";
			$this->db->query($sql2);
			//var_dump($id_material);	
			$sql3="insert into memiliki (id_standard,id_material) values(LAST_INSERT_ID(),'$id_material')";
			$this->db->query($sql3);
			
		}
		return true;
	}

	function ubah3()
	{
		$CI =& get_instance();
		$CI->load->database('default');
		$id_material	= $_POST['id_material'];
		$nama_material		= $_POST['nama_material'];
		$id_subarea	= $_POST['id_subarea'];

		//insert
		//var_dump($id_material);
		$sqli = "delete from material WHERE id_material ='$id_material'"; 
		$this->db->query($sqli);

		$sqli = "insert into material(nama_material) values('$nama_material')";
		$this->db->query($sqli);
		$id_material = $this->db->insert_id();
		//$id_material = mysqli_insert_id();
		$sqli="insert into ruang_lingkup (id_material,id_subarea) values(LAST_INSERT_ID(),'$id_subarea')";
		$this->db->query($sqli);

		$sqli = "delete from memiliki WHERE id_material ='$id_material'"; 
		$this->db->query($sqli);

		$nama_standard = $_POST['nama_standard'];
		//var_dump($nama_standard);
		$keys = count($nama_standard);
		for($i = 0; $i < $keys; $i++) 
		{
			$id_standard		= $_POST['id_standard'][$i];
			$nama_standard		= $_POST['nama_standard'][$i];
			$pertanyaan = $_POST['pertanyaan'][$i];

			$sql2 = "insert into standard(nama_standard,pertanyaan) values('$nama_standard','$pertanyaan')";
			$this->db->query($sql2);
			//var_dump($id_material);	
			$sql3="insert into memiliki (id_standard,id_material) values(LAST_INSERT_ID(),'$id_material')";
			$this->db->query($sql3);
			
		}
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

		$nama_standard = $_POST['nama_standard'];
		//var_dump($nama_standard);
		$keys = count($nama_standard);
		for($i = 0; $i < $keys; $i++) 
		{
			$id_standard		= $_POST['id_standard'][$i];
			$nama_standard		= $_POST['nama_standard'][$i];
			$pertanyaan = $_POST['pertanyaan'][$i];

			$sql2 = "update standard set nama_standard='$nama_standard', pertanyaan='$pertanyaan' where id_standard='$id_standard'";
			$this->db->query($sql2);
			//var_dump($id_material);	
			$sql3="update memiliki set id_standard='$id_standard', id_material='$id_material' where id_standard='$id_standard'";
			$this->db->query($sql3);
			
		}
		return true;

	}

	function ubah2()
	{
		$CI =& get_instance();
		$CI->load->database('default');
		if(!empty($_POST['kode_permintaan']))
		{
			$kode_permintaan	= $_POST['kode_permintaan'];
			$tgl_permintaan		= date('Y-m-d');
			$tgl_dibutuhkan		= $_POST['tgl_dibutuhkan'];
			$NIK				= $_POST['NIK'];

		//hapus meminta sebelumnya
			$sqli = "delete from meminta  WHERE kode_permintaan ='$kode_permintaan'"; 
			$this->db->query($sqli);
		 //input PR
			$sqlp = "update permintaan set tgl_dibutuhkan='$tgl_dibutuhkan'
			where kode_permintaan='$kode_permintaan'"; 
			$this->db->query($sqlp);
		//input meminta baru
			$jumlah = $_POST['jumlah'];
			$keys = count($jumlah);
			for($i = 0; $i < $keys; $i++) 
			{
				$bahan_baku= $_POST['kode_bahan'][$i];
				$jumlah = $_POST['jumlah'][$i];
				
				if ($jumlah>0)
				{
					$sqlm="insert into meminta (kode_permintaan,kode_bahan,jumlah) 
					values('$kode_permintaan','$bahan_baku','$jumlah')";
					$this->db->query($sqlm);
				}
			}

			return true;
		}
		else
		{
			return false;	
		}
		
		
	}

}
?>
