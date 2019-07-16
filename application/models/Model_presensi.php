<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_presensi extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function get_nama($a){
    $this->db->select('nama');
    $this->db->where('id_karyawan', $a);
    $query = $this->db->get('karyawan');
    $ret = $query->row();
    return $ret->nama;
  }

  function get_tabel($x){
    $this->db->select('karyawan.nama, absen_mangkir.tgl_absensi, absen_mangkir.area, absen_mangkir.subarea, absen_mangkir.status');
    $this->db->where('absen_mangkir.tgl_absensi', $x);
    $this->db->order_by('tgl_absensi', 'desc');
    $this->db->join('karyawan', 'absen_mangkir.id_karyawan = karyawan.id_karyawan');
    $this->db->from('absen_mangkir');
    $query = $this->db->get();
    return $query->result();
  }

  function insert($tabel, $data){
    $this->db->insert($tabel, $data);
    if($this->db->affected_rows() > 0)
    {
        $this->session->set_flashdata('$info', 'Data berhasil dimasukkan');
    }else{
      $this->session->set_flashdata('$info', 'Data gagal dimasukkan');
    }
  }

}
