<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {

	// load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('header_transaksi_model');
		// proteksi halaman
		$this->simple_login->cek_login();
	}

	// Halaman utama dasbor
	public function index()
	{
		// ambil data login id_pelanggan dari SESSION
		$header_transaksi = $this->header_transaksi_model->listing();
		
		$data = array('title' 				=> 'Data Transaksi',
					  'header_transaksi' 	=> $header_transaksi,
					  'isi'   				=> 'admin/order/list'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
}

/* End of file Orders.php */
/* Location: ./application/controllers/admin/Orders.php */