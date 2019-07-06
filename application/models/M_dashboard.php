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

    $second_date = mdate($datestring, $time);;
    $this->db->where('tanggal <=', $second_date);
    //$this->db->where('tanggal >=', $first_date);

    $this->db->select('skor, tanggal');
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

}
