<?php
class Kehilangan_model extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
	}

	function getKehilangan()
	{
		$query=$this->db->query("select * from kehilangan");
		foreach ($query->result_array() as $row) {$array[] = $row;}
		if (!isset($array)) { $array='';}
		$query->free_result();
		return $array;
	}

	function cetakKehilanganLama($dari, $hingga, $status)
	{
		if(!empty($status)){
			$query=$this->db->query("select * from kehilangan where tanggal >= '$dari' and tanggal <= '$hingga' and status = '$status'");
		}else{
			$query=$this->db->query("select * from kehilangan where tanggal >= '$dari' and tanggal <= '$hingga'");
		}
		
		foreach ($query->result_array() as $row) {$array[] = $row;}
		if (!isset($array)) { $array='';}
		$query->free_result();
		return $array;
	}

	function cetakKehilangan($dari, $hingga, $status)
	{
		$sql="select * from kehilangan where nama_barang IS NOT NULL";
		
		if(!empty($dari))
		{
			$sql.=" and tanggal >= '$dari'";
		}
		if(!empty($hingga))
		{
			$sql.=" and tanggal <= '$hingga'";
		}
		if(!empty($status))
		{
			$sql.=" and status = '$status'";
		}		
		$query=$this->db->query($sql);
		foreach ($query->result_array() as $row) {$array[] = $row;}
		if (!isset($array)) { $array='';}
		$query->free_result();
		return $array;
	}

	function ubahStatusHilang($id_kehilangan)
	{
		$CI =& get_instance();
		$CI->load->database('default');
		$sql = "update kehilangan set status='hilang' where id_kehilangan='$id_kehilangan'";
		$this->db->query($sql);
		return true;

	}

	function ubahStatusMenemukan($id_kehilangan)
	{
		$CI =& get_instance();
		$CI->load->database('default');
		$sql = "update kehilangan set status='menemukan' where id_kehilangan='$id_kehilangan'";
		$this->db->query($sql);
		return true;

	}

	function ubahStatusDikembalikan($id_kehilangan)
	{
		$CI =& get_instance();
		$CI->load->database('default');
		$sql = "update kehilangan set status='dikembalikan' where id_kehilangan='$id_kehilangan'";
		$this->db->query($sql);
		return true;

	}

	function hapus($kode)
	{
		$sql = "delete from kehilangan  WHERE id_kehilangan ='$kode'";
		$this->db->query($sql);
		return true;
	}

	
}