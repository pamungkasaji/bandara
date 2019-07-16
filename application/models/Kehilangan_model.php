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


	function getKehilanganDetail($id_kehilangan)
	{
		$query=$this->db->query("select kehilangan.*,area.nama_area, subarea.nama_subarea, material.nama_material from kehilangan join area on kehilangan.id_area = area.id_area
			join subarea on kehilangan.id_subarea = subarea.id_subarea join ruang_lingkup on kehilangan.id_subarea = ruang_lingkup.id_subarea
			join material on material.id_material = ruang_lingkup.id_material where id_kehilangan='$id_kehilangan'");
		foreach ($query->result_array() as $row) {$array[] = $row;}
		if (!isset($array)) { $array='';}
		$query->free_result();
		return $array;
	}

	function getKehilanganRange($dari, $hingga)
	{
		$query=$this->db->query("select kehilangan.*,nama_area, nama_subarea from kehilangan,area,subarea where tanggal > '$dari' and tanggal < '$hingga' and area.id_area=kehilangan.id_area and subarea.id_subarea=kehilangan.id_subarea");
		foreach ($query->result_array() as $row) {$array[] = $row;}
		if (!isset($array)) { $array='';}
		$query->free_result();
		return $array;
	}

	
}