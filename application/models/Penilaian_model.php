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
		$query=$this->db->query("select penilaian.*,area.nama_area, subarea.nama_subarea, material.nama_material from penilaian join area on penilaian.id_area = area.id_area
			join subarea on penilaian.id_subarea = subarea.id_subarea join ruang_lingkup on penilaian.id_subarea = ruang_lingkup.id_subarea
			join material on material.id_material = ruang_lingkup.id_material where id_penilaian='$id_penilaian'");
		foreach ($query->result_array() as $row) {$array[] = $row;}
		if (!isset($array)) { $array='';}
		$query->free_result();
		return $array;
	}

	function getPenilaianRange($dari, $hingga)
	{
		$query=$this->db->query("select penilaian.*,nama_area, nama_subarea from penilaian,area,subarea where tanggal > '$dari' and tanggal < '$hingga' and area.id_area=penilaian.id_area and subarea.id_subarea=penilaian.id_subarea");
		foreach ($query->result_array() as $row) {$array[] = $row;}
		if (!isset($array)) { $array='';}
		$query->free_result();
		return $array;
	}

	
}