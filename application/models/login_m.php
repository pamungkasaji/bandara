<?php
class Login_m extends CI_Model
{
    private $ci;
    private $error =  array();
	function validasi($username,$password)
	// Build a query to retrieve the user's details // based on the received username and password
	{

		$this->db->where('username',$username );
		$this->db->where('password',md5($password));
		//$this->db->where('password',md5($password));
		$login = $this->db->get('karyawan');
		// The results of the query are stored in $login.
    if ($login->num_rows()>0) {
      foreach ($login->result() as $row) {
        $data = array('username' => $row->username,
                      'password' => $row->password,
                      'level' => $row->level,
                      'gambar' => $row->gambar,
                      'id_karyawan' => $row->id_karyawan,
                      'status_login' => 'login'
        );
        $this->session->set_userdata($data);
        if ($data['level']=='supervisor') {
            redirect('Dashboard');
        }
        elseif ($data['level']=='admin') {
            redirect('DashboardAdmin');
        }
        elseif ($data['level']=='teamleader') {
            redirect('AwalTeamleader');
        }

      }
    } else {
      $this->session->set_flashdata('info', 'Maaf, username atau password salah');
      redirect('login');
    }
  }

	function getSession($username,$password)
    {
		$password	=$password;
		//$password	=md5($password);
		$query=$this->db->query("select * from karyawan where username='$username' and password='$password'");
		foreach ($query->result_array() as $row) {$array[] = $row;}
		if (!isset($array)) { $array='';}
		$query->free_result();
		return $array;
	}

  function ambil_gambar($id_kar) {
      $this->db->where('id_karyawan', $id_kar);
      $this->db->select('gambar');
      $this->db->from('karyawan');
      $query = $this->db->get();
      $ret = $query->row();
      return $ret->gambar;
  }

}
