<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasbor extends CI_Controller {

	// load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('chart_model');
		$this->load->model('header_transaksi_model');
		$this->load->model('pelanggan_model');
		// proteksi halaman
		$this->simple_login->cek_login();
	}

	// Halaman utama dasbor
	public function index()
	{
		// ambil data login id_pelanggan dari SESSION
		$x 			= $this->chart_model->penjualan();
		$jumlah 	= $this->header_transaksi_model->get_data('header_transaksi')->num_rows();
		$pelanggan 	= $this->pelanggan_model->get_data('pelanggan')->num_rows();

		$data = array('title' 		=> 'Halaman Administrator',
					  'data'  		=> $x,
					  'jumlah'		=> $jumlah,
					  'pelanggan'	=> $pelanggan,
					  'isi'   		=> 'admin/dasbor/list'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

}

/* End of file Dasbor.php */
/* Location: ./application/controllers/admin/Dasbor.php */