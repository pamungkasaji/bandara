<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('date');
    //Codeigniter : Write Less Do More
  }

  function select_skor() {
      //$condition = "emp_date_of_join BETWEEN " . "'" . $data['date1'] . "'" . " AND " . "'" . $data['date2'] . "'";
      //$first_date = '2019-07-03';
      $datestring = '%Y-%m-%d';
      $time = time();

      $second_date = mdate($datestring, $time);
      $this->db->where('tanggal <=', $second_date);
      //$this->db->where('tanggal >=', $first_date);
      $this->db->select_sum('skor', 'skor1');
      $this->db->select('tanggal, COUNT(tanggal) as tottang');
      $this->db->group_by('tanggal');
      $this->db->order_by('tanggal', 'asc');
      $this->db->from('penilaian', 7);
      //$this->db->where($condition);
      $query = $this->db->get();
      if($query->num_rows() > 0){
        foreach($query->result() as $data){
          $hasil[] = $data;
        }
        return $hasil;
      }
    }

    function pie_subarea() {
      $datestring = '%Y-%m-%d';
      $time = time();
      $second_date = mdate($datestring, $time);
      $this->db->select_sum('skor', 'skor1');
      $this->db->select('COUNT(penilaian.id_subarea) as suba, COUNT(tanggal) as tangnew, nama_subarea, tanggal');
      $this->db->group_by('penilaian.id_subarea');
      $this->db->order_by('penilaian.id_subarea', 'asc');
      $this->db->join('subarea', 'subarea.id_subarea = penilaian.id_subarea');
      $this->db->from('penilaian', 7);
      //$this->db->where($condition);
      $query = $this->db->get();
      if($query->num_rows() > 0){
        foreach($query->result() as $data){
          $hasil[] = $data;
        }
        return $hasil;
      }
    }

    function update_pie_subarea($p, $xy) {
      $datestring = '%Y-%m-%d';
      $time = time();
      $second_date = mdate($datestring, $time);
      $this->db->where('penilaian.id_subarea', $xy);
      $this->db->where('id_area', $p);
      $this->db->select_sum('skor', 'skor1');
      $this->db->select('COUNT(penilaian.id_area) as suba, COUNT(tanggal) as tangnew, nama_subarea, tanggal');
      $this->db->group_by('tanggal');
      $this->db->order_by('tanggal', 'asc');
      $this->db->join('subarea', 'subarea.id_subarea = penilaian.id_subarea');
      $this->db->from('penilaian', 7);
      //$this->db->where($condition);
      $query = $this->db->get();
      if($query->num_rows() > 0){
        foreach($query->result() as $data){
          $hasil[] = $data;
        }
        return $hasil;
      }
    }

    function pie_area() {
      $datestring = '%Y-%m-%d';
      $time = time();
      $second_date = mdate($datestring, $time);
      $this->db->select_sum('skor', 'skor1');
      $this->db->select('COUNT(penilaian.id_area) as are, nama_area');
      $this->db->group_by('penilaian.id_area');
      $this->db->order_by('penilaian.id_area', 'asc');
      $this->db->join('area', 'area.id_area = penilaian.id_area');
      $this->db->from('penilaian', 7);
      //$this->db->where($condition);
      $query = $this->db->get();
      if($query->num_rows() > 0){
        foreach($query->result() as $data){
          $hasil[] = $data;
        }
        return $hasil;
      }
    }

    function line_subarea($w) {
      $datestring = '%Y-%m-%d';
      $time = time();
      $second_date = mdate($datestring, $time);
      $this->db->where('id_area', $w);
      $this->db->select_sum('skor', 'skor1');
      $this->db->select('COUNT(penilaian.id_subarea) as suba, nama_subarea');
      $this->db->group_by('penilaian.id_subarea');
      $this->db->order_by('penilaian.id_subarea', 'asc');
      $this->db->join('subarea', 'subarea.id_subarea = penilaian.id_subarea');
      $this->db->from('penilaian', 7);
      //$this->db->where($condition);
      $query = $this->db->get();
      if($query->num_rows() > 0){
        foreach($query->result() as $data){
          $hasil[] = $data;
        }
        return $hasil;
      }
    }

    function ambil_area() {

      $this->db->select('id_area, nama_area');
      $this->db->from('area');
      $query = $this->db->get();
      return $query->result();
  }

  function getsubselect($getarea){
    $this->db->where('id_area', $getarea);
    $this->db->select('penilaian.id_subarea, subarea.nama_subarea');
    $this->db->group_by('penilaian.id_subarea');
    $this->db->join('subarea', 'subarea.id_subarea = penilaian.id_subarea');
    $this->db->from('penilaian', 7);
    $query = $this->db->get();
    $output =  '<option value="">Select State</option>';
    foreach ($query->result() as $row) {
      $output .=  '<option value="'.$row->id_subarea.'">'.$row->nama_subarea.'</option>';
    }
    return $output;
  }
}
