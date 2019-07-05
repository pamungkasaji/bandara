<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function select_skor() {
    //$condition = "emp_date_of_join BETWEEN " . "'" . $data['date1'] . "'" . " AND " . "'" . $data['date2'] . "'";
    $this->db->select('skor, tanggal');
    $this->db->from('penilaian');
    //$this->db->where($condition);
    $query = $this->db->get();
    return $query->result();
  }

}
