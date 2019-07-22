<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_form extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    date_default_timezone_set("Asia/Jakarta");
    //Codeigniter : Write Less Do More
  }

  function get_subarea($p, $u) {
    $this->db->where("kodeqr.id_subarea", $u);
    $this->db->where("kodeqr.id_area", $p);
    $this->db->select('
      subarea.nama_subarea, area.nama_area
      ');
    $this->db->join('kodeqr', 'kodeqr.id_subarea = subarea.id_subarea');
    $this->db->join('area', 'area.id_area = kodeqr.id_area');
    $this->db->from('subarea');
    $query = $this->db->get();
      //return $query->result();
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
            // tentukan value (sebelah kiri) dan labelnya (sebelah kanan)
        $data = array('nama_area' => $row->nama_area,
          'nama_subarea' => $row->nama_subarea
        );
        var_dump($data);
        $this->session->set_userdata($data);
      }
    }
    else {
      redirect('Login');
    }
  }

  function cek($a, $b)
  {
    $query=$this->db->query("select id_penilaian from penilaian where id_area='$a' and id_subarea='$b' and tanggal = current_date()");
    foreach ($query->result_array() as $row) {$array[] = $row;}
    if (!isset($array)) { $array='';}
    $query->free_result();
    return $array;
  }

  function get_attendant(){
    $value = 'attendant';
    $this->db->where('level', $value);
    $query = $this->db->get('karyawan');
    return $query->result();
  }

  function get_id_att($a){

    $this->db->where('nama', $a);
    $this->db->select('id_karyawan');
    $query = $this->db->get('karyawan');
    foreach ($query->result() as $row) {
    // tentukan value (sebelah kiri) dan labelnya (sebelah kanan)
      $data = array('id_attendant' => $row->id_karyawan
    );
      $this->session->set_userdata($data);
    }
  }

  function get_standard($id_subarea) {
    $this->db->where('ruang_lingkup.id_subarea', $id_subarea);
    $this->db->select('standard.pertanyaan, standard.id_standard');
    $this->db->join('ruang_lingkup', 'ruang_lingkup.id_subarea = subarea.id_subarea');
    $this->db->join('memiliki', 'memiliki.id_material = ruang_lingkup.id_material');
    $this->db->join('standard', 'standard.id_standard = memiliki.id_standard');


    $this->db->from('subarea');
    $query = $this->db->get();
    return $query->result();
  /*  if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
        // tentukan value (sebelah kiri) dan labelnya (sebelah kanan)
          $data = array('id_standard' => $row->id_standard,
                        'pertanyaan' => $row->pertanyaan
                      );
          $this->session->set_userdata($data);
        }
    }
    else {
      redirect('Dashboard');
    }
    */
  }

  function get_id($area, $subarea) {
    $this->db->where("subarea.nama_subarea", $subarea);
    $this->db->where("area.nama_area", $area);
    $this->db->select('
      kodeqr.id_subarea, kodeqr.id_area
      ');
    $this->db->join('kodeqr', 'kodeqr.id_subarea = subarea.id_subarea');
    $this->db->join('area', 'area.id_area = kodeqr.id_area');
    $this->db->from('subarea');
    $query = $this->db->get();
    foreach ($query->result() as $row) {
    // tentukan value (sebelah kiri) dan labelnya (sebelah kanan)
      $data = array('id_area' => $row->id_area,
        'id_subarea' => $row->id_subarea
      );
      $this->session->set_userdata($data);
    }
  }

  function insert($table, $data){
    $this->db->insert($table, $data);
    return $this->db->insert_id();
  }

  function get_nama_karyawan($a){
    $this->db->select('nama');
    $this->db->where('id_karyawan', $a);
    $query = $this->db->get('karyawan');
    $ret = $query->row();
    return $ret->nama;
  }

  //function get

}
