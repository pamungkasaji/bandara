<?php
class Penilaian_model extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
	}

	function getPenilaian()
	{
		$query=$this->db->query("select penilaian.*,nama_area, nama_subarea from penilaian,area,subarea where area.id_area=penilaian.id_area and subarea.id_subarea=penilaian.id_subarea");
		foreach ($query->result_array() as $row) {$array[] = $row;}
		if (!isset($array)) { $array='';}
		$query->free_result();
		return $array;
	}

	function getPenilaianDetail($id_penilaian)
	{
		$query=$this->db->query("select penilaian.*,nama_area, nama_subarea from penilaian,area,subarea where area.id_area=penilaian.id_area and subarea.id_subarea=penilaian.id_subarea and id_penilaian='$id_penilaian'");
		foreach ($query->result_array() as $row) {$array[] = $row;}
		if (!isset($array)) { $array='';}
		$query->free_result();
		return $array;
	}

	function fetch_single_details($id_kodeqr)
	{
		$query=$this->db->query("select kodeqr.*,nama_area, nama_subarea from kodeqr,area,subarea where area.id_area=kodeqr.id_area and subarea.id_subarea=kodeqr.id_subarea and id_kodeqr='$id_kodeqr'");

		foreach ($query->result_array() as $row) {$array[] = $row;}
		if (!isset($array)) { $array='';}
		$query->free_result();
		return $array;
	}
	
}