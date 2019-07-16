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


	function getKerusakanDetail($id_kerusakan)
	{
		$query=$this->db->query("select kerusakan.*,area.nama_area, subarea.nama_subarea, material.nama_material from kerusakan join area on kerusakan.id_area = area.id_area
			join subarea on kerusakan.id_subarea = subarea.id_subarea join ruang_lingkup on kerusakan.id_subarea = ruang_lingkup.id_subarea
			join material on material.id_material = ruang_lingkup.id_material where id_kerusakan='$id_kerusakan'");
		foreach ($query->result_array() as $row) {$array[] = $row;}
		if (!isset($array)) { $array='';}
		$query->free_result();
		return $array;
	}

	function getKerusakanRange($dari, $hingga)
	{
		$query=$this->db->query("select kerusakan.*,nama_area, nama_subarea from kerusakan,area,subarea where tanggal > '$dari' and tanggal < '$hingga' and area.id_area=kerusakan.id_area and subarea.id_subarea=kerusakan.id_subarea");
		foreach ($query->result_array() as $row) {$array[] = $row;}
		if (!isset($array)) { $array='';}
		$query->free_result();
		return $array;
	}

	
}