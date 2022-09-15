<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pelanggan extends CI_Controller {

	// load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pelanggan_model');
		// proteksi halaman
		$this->simple_login->cek_login();
	}

	// Halaman utama dasbor
	public function index()
	{
		// ambil data login id_pelanggan dari SESSION
		$pelanggan = $this->pelanggan_model->listing();
		
		$data = array('title' 		=> 'Data Pelanggan',
					  'pelanggan' 	=> $pelanggan,
					  'isi'   		=> 'admin/pelanggan/list'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
}

/* End of file Orders.php */
/* Location: ./application/controllers/admin/Orders.php */