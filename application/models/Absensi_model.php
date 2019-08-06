<?php
class Absensi_model extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
	}

	function getAbsensi()
	{
		$query=$this->db->query("select absen_mangkir.*, karyawan.nama from absen_mangkir,karyawan where karyawan.id_karyawan=absen_mangkir.id_karyawan");
		foreach ($query->result_array() as $row) {$array[] = $row;}
		if (!isset($array)) { $array='';}
		$query->free_result();
		return $array;
	}

	function cetakAbsensiLama($dari, $hingga, $status)
	{
		if(!empty($status)){
			$query=$this->db->query("select absen_mangkir.*, karyawan.nama from absen_mangkir, karyawan where karyawan.id_karyawan=absen_mangkir.id_karyawan and tgl_absensi >= '$dari' and tgl_absensi <= '$hingga' and status = '$status'");
		}else{
			$query=$this->db->query("select absen_mangkir.*, karyawan.nama from absen_mangkir, karyawan where karyawan.id_karyawan=absen_mangkir.id_karyawan and tgl_absensi >= '$dari' and tgl_absensi <= '$hingga'");
		}
		
		foreach ($query->result_array() as $row) {$array[] = $row;}
		if (!isset($array)) { $array='';}
		$query->free_result();
		return $array;
	}

	function cetakAbsensi($dari, $hingga, $status)
	{
		$sql="select absen_mangkir.*, karyawan.nama from absen_mangkir, karyawan where karyawan.id_karyawan=absen_mangkir.id_karyawan";
		
		if(!empty($dari))
		{
			$sql.=" and tgl_absensi >= '$dari'";
		}
		if(!empty($hingga))
		{
			$sql.=" and tgl_absensi <= '$hingga'";
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

	function hapus($kode)
	{
		$sql = "delete from absen_mangkir WHERE id_absensi ='$kode'";
		$this->db->query($sql);
		return true;
	}

}