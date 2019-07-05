<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_login extends CI_Model {

  function cek_login($u, $p) {

    $this->db->where("username", $u);
    $this->db->where("password", $p);
    date_default_timezone_set("Asia/Jakarta");
    $query = $this->db->get("karyawan");
    if ($query->num_rows()>0) {
      foreach ($query->result() as $row) {
        $sess = array('username' => $row->username,
                      'password' => $row->password,
                      'level' => $row->level,
                      'status_login' => 'login'
        );
        $this->session->set_userdata($sess);
        if ($sess['level']=='admin') {
            redirect('dashboard');
        }
        else {
            redirect('login');
        }

      }
    } else {
      $this->session->set_flashdata('info', 'Maaf, username atau password salah');
      redirect('login');
    }
  }

  function ambil_username() {
    $sesu = $this->session->userdata('username');
    return $sesu;
  }
}
