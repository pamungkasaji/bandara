<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('date');
    //Codeigniter : Write Less Do More
  }

  function select_skor($z) {
      //$condition = "emp_date_of_join BETWEEN " . "'" . $data['date1'] . "'" . " AND " . "'" . $data['date2'] . "'";
      //$first_date = '2019-07-03';
      $datestring = '%Y-%m-%d';
      $time = time();
      $second_date = mdate($datestring, $time);
      $first_date = $this->time = date('Y-m-d', strtotime("-$z day", time()));
      $this->db->where('tanggal <=', $second_date);
      $this->db->where('tanggal >=', $first_date);
      //$this->db->where('tanggal >=', $first_date);
      $this->db->select_sum('skor', 'skor1');
      $this->db->select('tanggal, COUNT(tanggal) as tottang');
      $this->db->group_by('tanggal');
      $this->db->order_by('tanggal', 'asc');
      $this->db->from('penilaian');
      //$this->db->where($condition);
      $query = $this->db->get();
      if($query->num_rows() > 0){
        foreach($query->result() as $data){
          $hasil[] = $data;
        }
        return $hasil;
      }
    }

    function pie_subarea($z) {
      $datestring = '%Y-%m-%d';
      $time = time();
      $second_date = mdate($datestring, $time);
      $first_date = $this->time = date('Y-m-d', strtotime("-$z day", time()));
      $this->db->where('tanggal <=', $second_date);
      $this->db->where('tanggal >=', $first_date);
      $this->db->select_sum('skor', 'skor1');
      $this->db->select('COUNT(penilaian.id_subarea) as suba, nama_subarea, tanggal');
      $this->db->group_by('penilaian.id_subarea');
      $this->db->order_by('penilaian.id_subarea', 'asc');
      $this->db->join('subarea', 'subarea.id_subarea = penilaian.id_subarea');
      $this->db->from('penilaian');
      //$this->db->where($condition);
      $query = $this->db->get();
      if($query->num_rows() > 0){
        foreach($query->result() as $data){
          $hasil[] = $data;
        }
        return $hasil;
      }
    }

    function pie_subarea_area($x, $z) {
      $datestring = '%Y-%m-%d';
      $time = time();
      $second_date = mdate($datestring, $time);
      $first_date = $this->time = date('Y-m-d', strtotime("-$z day", time()));
      $this->db->where('tanggal <=', $second_date);
      $this->db->where('tanggal >=', $first_date);
      $this->db->where('id_area', $x);
      $this->db->select_sum('skor', 'skor1');
      $this->db->select('COUNT(penilaian.id_subarea) as subb, nama_subarea, tanggal');
      $this->db->group_by('penilaian.id_subarea');
      $this->db->order_by('tanggal', 'asc');
      $this->db->join('subarea', 'subarea.id_subarea = penilaian.id_subarea');
      $this->db->from('penilaian');
      //$this->db->where($condition);
      $query = $this->db->get();
      if($query->num_rows() > 0){
        foreach($query->result() as $data){
          $hasil[] = $data;
        }
        return $hasil;
        var_dump($hasil);
      }
    }



    function line_subarea($a, $aa, $z){
      $datestring = '%Y-%m-%d';
      $time = time();
      $second_date = mdate($datestring, $time);
      $first_date = $this->time = date('Y-m-d', strtotime("-$z day", time()));
      $this->db->where('tanggal <=', $second_date);
      $this->db->where('tanggal >=', $first_date);
      $this->db->where('id_subarea', $aa);
      $this->db->where('id_area', $a);
      $this->db->select_sum('skor', 'skor1');
      $this->db->select('COUNT(tanggal) as tangnew, tanggal');
      $this->db->group_by('tanggal');
      $this->db->order_by('tanggal', 'asc');
      //$this->db->join('subarea', 'subarea.id_subarea = penilaian.id_subarea');
      $this->db->from('penilaian');
      //$this->db->where($condition);
      $query = $this->db->get();
      if($query->num_rows() > 0){
        foreach($query->result() as $data){
          $hasil[] = $data;
        }
        return $hasil;
        var_dump($hasil);
      }
    }

    function pie_area($z) {
      $datestring = '%Y-%m-%d';
      $time = time();
      $second_date = mdate($datestring, $time);
      $first_date = $this->time = date('Y-m-d', strtotime("-$z day", time()));
      $this->db->where('tanggal <=', $second_date);
      $this->db->where('tanggal >=', $first_date);
      $this->db->select_sum('skor', 'skor1');
      $this->db->select('COUNT(penilaian.id_area) as are, nama_area');
      $this->db->group_by('penilaian.id_area');
      $this->db->order_by('penilaian.id_area', 'asc');
      $this->db->join('area', 'area.id_area = penilaian.id_area');
      $this->db->from('penilaian');
      //$this->db->where($condition);
      $query = $this->db->get();
      if($query->num_rows() > 0){
        foreach($query->result() as $data){
          $hasil[] = $data;
        }
        return $hasil;
      }
    }

    function line_area($a, $z) {
      $datestring = '%Y-%m-%d';
      $time = time();
      $second_date = mdate($datestring, $time);
      $first_date = $this->time = date('Y-m-d', strtotime("-$z day", time()));
      $this->db->where('tanggal <=', $second_date);
      $this->db->where('tanggal >=', $first_date);
      $this->db->where('penilaian.id_area', $a);
      $this->db->select_sum('skor', 'skor1');
      $this->db->select('COUNT(tanggal) as tangnew, tanggal');
      $this->db->group_by('tanggal');
      $this->db->order_by('tanggal', 'asc');
      $this->db->join('area', 'area.id_area = penilaian.id_area');
      $this->db->from('penilaian');
      //$this->db->where($condition);
      $query = $this->db->get();
      if($query->num_rows() > 0){
        foreach($query->result() as $data){
          $hasil[] = $data;
        }
        return $hasil;
        var_dump($hasil);
      }
    }


    function ambil_gambar($id_kar) {
      $this->db->where('id_karyawan', $id_kar);
      $this->db->select('gambar');
      $this->db->from('karyawan');
      $query = $this->db->get();
      $ret = $query->row();
      return $ret->gambar;
  }

    function ambil_area() {
      $this->db->select('id_area, nama_area');
      $this->db->from('area');
      $query = $this->db->get();
      return $query->result();
  }

    function get_area($a) {
      $this->db->where('id_area', $a);
      $this->db->select('nama_area');
      $this->db->from('area');
      $query = $this->db->get();
      $ret = $query->row();
      return $ret->nama_area;
  }

    function get_subarea($s) {
      $this->db->where('id_subarea', $s);
      $this->db->select('nama_subarea');
      $this->db->from('subarea');
      $query = $this->db->get();
      $ret = $query->row();
      return $ret->nama_subarea;
  }

  function getsubselect($getarea){
    $this->db->where('id_area', $getarea);
    $this->db->select('penilaian.id_subarea, subarea.nama_subarea');
    $this->db->group_by('penilaian.id_subarea');
    $this->db->join('subarea', 'subarea.id_subarea = penilaian.id_subarea');
    $this->db->from('penilaian', 7);
    $query = $this->db->get();
    $output =  '<option value="">Select Subarea</option>';
    foreach ($query->result() as $row) {
      $output .=  '<option value="'.$row->id_subarea.'">'.$row->nama_subarea.'</option>';
    }
    return $output;
  }
}
