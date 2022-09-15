<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coba extends CI_Controller {

	public function index()
	{
		$date = $this->db->query("SELECT `tanggal_transaksi` FROM `transaksi` GROUP BY YEAR(`tanggal_transaksi`)")->result_array();

		foreach($date as $tanggal){
			$new_year = explode('-', $tanggal['tanggal_transaksi']);

			$sum = $this->db->query("SELECT SUM(`tanggal_transaksi`) AS `tanggal_transaksi` FROM `transaksi` WHERE `tanggal_transaksi` LIKE '".$new_year[0]."'")->row_array();

			echo $sum['tanggal_transaksi'];
		}

		print_r($date);
	}

}

/* End of file Coba.php */
/* Location: ./application/controllers/Coba.php */