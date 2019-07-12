<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    date_default_timezone_set("Asia/Jakarta");
    //Codeigniter : Write Less Do More
  }

  function getPenilaian()
    {
    $query=$this->db->query("select penilaian.*,nama_area, nama_subarea from penilaian,area,subarea where area.id_area=penilaian.id_area and subarea.id_subarea=penilaian.id_subarea");
    foreach ($query->result_array() as $row) {$array[] = $row;}
    if (!isset($array)) { $array='';}
    $query->free_result();
    return $array;
  }

  function getPenilaiaDetail()
    {
    $query=$this->db->query("select penilaian.*,nama_area, nama_subarea, nama_material from penilaian,area,subarea,material where area.id_area=penilaian.id_area and subarea.id_subarea=penilaian.id_subarea and material.id_material=penilaian.id_material");
    foreach ($query->result_array() as $row) {$array[] = $row;}
    if (!isset($array)) { $array='';}
    $query->free_result();
    return $array;
  }


  
}