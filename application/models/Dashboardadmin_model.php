<?php
class Dashboardadmin_model extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
	}

	function getPenilaianIni()
	{
		$query=$this->db->query("select penilaian.*,nama_area, nama_subarea from penilaian,area,subarea where area.id_area=penilaian.id_area and subarea.id_subarea=penilaian.id_subarea and tanggal=current_date()");
		foreach ($query->result_array() as $row) {$array[] = $row;}
		if (!isset($array)) { $array='';}
		$query->free_result();
		return $array;
	}

	
}