<?php
class Kodeqr_model extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
    }
	//function mengambil data kodeqr
	function getKodeqr()
    {
		$query=$this->db->query("select kodeqr.*,nama_area, nama_subarea from kodeqr,area,subarea where area.id_area=kodeqr.id_area and subarea.id_subarea=kodeqr.id_subarea");
		foreach ($query->result_array() as $row) {$array[] = $row;}
		if (!isset($array)) { $array='';}
		$query->free_result();
		return $array;
	}
	//function menampilkan data kodeqr yang akan di Update ke Form
	function getKodeqrUpdate($kode)
    {
		$query=$this->db->query("select kodeqr.*,nama_area, nama_subarea from kodeqr,area,subarea where area.id_area=kodeqr.id_area and subarea.id_subarea=kodeqr.id_subarea and id_kodeqr='$kode'");
		foreach ($query->result_array() as $row) {$array[] = $row;}
		if (!isset($array)) { $array='';}
		$query->free_result();
		return $array;
	}

	//function hapus data kodeqr
	function hapus($kode)
    {
		 $sql = "delete from kodeqr  WHERE id_kodeqr ='$kode'"; 
		 $this->db->query($sql);
		 return true;
    }

	function fetch_single_details($id_kodeqr)
	 {
	 $query=$this->db->query("select kodeqr.*,nama_area, nama_subarea from kodeqr,area,subarea where area.id_area=kodeqr.id_area and subarea.id_subarea=kodeqr.id_subarea and id_kodeqr='$id_kodeqr'");

	  $output = '<table width="100%" cellspacing="5" cellpadding="5">';
	  foreach($query->result() as $row)
	  {
	   $output .= '
	   <tr>
	    <td width="50%"><img style="width: 200px;" src="'.base_url().'assets/'.'images/'.$row->qr_code.'" /></td>
	    <td width="50%">
	     <p><b>Area : </b>'.$row->nama_area.'</p>
	     <p><b>Subarea : </b>'.$row->nama_subarea.'</p>

	    </td>
	   </tr>
	   ';
	  }

	  return $output;
	 }


	function simpanKodeqr($id_area,$id_subarea,$image_name){
        $data = array(
            'id_area'       => $id_area,
            'id_subarea'   => $id_subarea,
            'qr_code'   => $image_name
        );
        $this->db->insert('kodeqr',$data);
    }

	function ubah($image_name)
    {
		$CI =& get_instance();
		$CI->load->database('default');

			$id_kodeqr		= $_POST['id_kodeqr'];
			$id_area		= $_POST['id_area'];
			$id_subarea		= $_POST['id_subarea'];
			$sql = "update kodeqr set id_area='$id_area',id_subarea='$id_subarea',qr_code='$image_name' where id_kodeqr='$id_kodeqr'"; 
			$this->db->query($sql);
			return true;

    } 

                                                                                             
}
?>