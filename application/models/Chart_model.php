<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chart_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function penjualan(){
        $query = $this->db->query("SELECT tanggal_bayar,SUM(jumlah_bayar) AS jumlah_bayar FROM header_transaksi GROUP BY tanggal_bayar");
         
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
}

/* End of file Chart_model.php */
/* Location: ./application/models/Chart_model.php */