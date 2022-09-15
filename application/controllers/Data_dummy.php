<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_dummy extends CI_Controller {

	public function index()
	{
		$jumlah_data = 1000;
		for ($i=1; $i <= $jumlah_data; $i++) { 
			$data   =   array(
                "status_pelanggan"  =>  "Pending",
                "nama_pelanggan"     =>  "karyawan ke-".$i,
                "email"         	=>  "karyawan-$i@gmil.com",
                "telepon"         	=>  '089699935552',
                "alamat"          	=>  "Jalan raya");
            $this->db->insert('pelanggan',$data);
		}
		echo $i.' Data Berhasil Di Insert';
	}
}

/* End of file Data_dummy.php */
/* Location: ./application/controllers/Data_dummy.php */