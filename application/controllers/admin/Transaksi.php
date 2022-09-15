<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	// load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('header_transaksi_model');
		$this->load->model('transaksi_model');
		// proteksi halaman
		$this->simple_login->cek_login();
	}

	// data transaksi
	public function index()
	{
		$transaksi = $this->header_transaksi_model->listing();

		$data = array('title' 	  	=> 'Data transaksi',
					  'transaksi'  	=> $transaksi,
					  'isi'   	  	=> 'admin/transaksi/list'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function detail($kode_transaksi)
	{
		$header_transaksi 	= $this->header_transaksi_model->kode_transaksi($kode_transaksi);
		$transaksi 			= $this->transaksi_model->kode_transaksi($kode_transaksi);
		
		$data = array('title' 	  		=> 'Detail transaksi',
					  'header_transaksi'=> $header_transaksi,
					  'transaksi'		=> $transaksi,
					  'isi'   	  		=> 'admin/transaksi/detail'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

}

/* End of file Transaksi.php */
/* Location: ./application/controllers/admin/Transaksi.php */