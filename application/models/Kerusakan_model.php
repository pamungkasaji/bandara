<?php
class Kerusakan_model extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
	}

	function getKerusakan()
	{
		$query=$this->db->query("select * from kerusakan");
		foreach ($query->result_array() as $row) {$array[] = $row;}
		if (!isset($array)) { $array='';}
		$query->free_result();
		return $array;
	}

	function cetakKerusakan($dari, $hingga, $status)
	{
		if(!empty($status)){
			$query=$this->db->query("select kerusakan.* from kerusakan where tgl_kerusakan >= '$dari' and tgl_kerusakan <= '$hingga' and status = '$status'");
		}else{
			$query=$this->db->query("select kerusakan.* from kerusakan where tgl_kerusakan >= '$dari' and tgl_kerusakan <= '$hingga'");
		}	
		foreach ($query->result_array() as $row) {$array[] = $row;}
		if (!isset($array)) { $array='';}
		$query->free_result();
		return $array;
	}

	function ubahStatusRusak($id_kerusakan)
	{
		$CI =& get_instance();
		$CI->load->database('default');
		$sql = "update kerusakan set status='rusak' where id_kerusakan='$id_kerusakan'";
		$this->db->query($sql);
		return true;
	}

	function ubahStatusDiperbaiki($id_kerusakan)
	{
		$CI =& get_instance();
		$CI->load->database('default');
		$sql = "update kerusakan set status='diperbaiki' where id_kerusakan='$id_kerusakan'";
		$this->db->query($sql);
		return true;
	}

	function hapus($kode)
	{
		$sql = "delete from kerusakan  WHERE id_kerusakan ='$kode'";
		$this->db->query($sql);
		return true;
	}
}