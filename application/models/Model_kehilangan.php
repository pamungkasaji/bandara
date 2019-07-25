<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_kehilangan extends CI_Model{

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

  function get_tabel(){
    $this->db->select('*');
    $this->db->order_by('tanggal', 'asc');
    $this->db->from('kehilangan');
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
