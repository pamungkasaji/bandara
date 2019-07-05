<?php
class Welcome_model extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
    }
	//jumlah bahan baku yang stok dibawah minimal
	
	/*
	function getAlertStok()
    {
		$query	=$this->db->query("select count(kode_bahan) as jumlah from bahan_baku where stok<stok_minimal ");
		foreach ($query->result_array() as $row) {$jumlah = $row['jumlah'];}
		return $jumlah;
	}

	
	//jumlah  pengeluaran baru hari ini
	function getAlertPL()
    {
		$tanggal=date("Y-m-d");
		$query=$this->db->query("select count(kode_pengeluaran) as jumlah from pengeluaran where tgl_pengeluaran='$tanggal'");
		foreach ($query->result_array() as $row) {$jumlah = $row['jumlah'];}
		return $jumlah;
	}
	function getPLDetail()
    {
		$tanggal=date("Y-m-d");
		$query	=$this->db->query("select * from pengeluaran where tgl_pengeluaran='$tanggal'");
		foreach ($query->result_array() as $row) {$array[] = $row;}
		if (!isset($array)) { $array='';}
		$query->free_result();
		return $array;
	}
	//jumlah Tagihan yang mendekati jatuh tempo
	function getAlertTagihan()
    {
		
		$query=$this->db->query("select count(no_nota) as jumlah from tagihan 
		where datediff(tgl_tagihan,current_date()) <= 7 and  tgl_bayar is null");
		foreach ($query->result_array() as $row) {$jumlah = $row['jumlah'];}
		return $jumlah;
	}
	//Tagihan detail
	function getTagihanDetail()
    {
		
		$query=$this->db->query("select tagihan.*,penerimaan.kode_pembelian,penerimaan.kode_penerimaan,nama_supplier,pembelian.kode_supplier 
								from tagihan,penerimaan,pembelian,supplier where tagihan.no_nota=penerimaan.no_nota 
								and penerimaan.kode_pembelian=pembelian.kode_pembelian 
								and supplier.kode_supplier=pembelian.kode_supplier 
								and datediff(tgl_tagihan,current_date()) <= 7 and  tgl_bayar is null");
		foreach ($query->result_array() as $row) {$array[] = $row;}
		if (!isset($array)) { $array='';}
		$query->free_result();
		return $array;
	}
	*/
	                                                                                                    
}
?>