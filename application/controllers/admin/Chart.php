<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chart extends CI_Controller {

		// load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('chart_model');
		// proteksi halaman
		$this->simple_login->cek_login();
	}

	public	function index()
	{
		// ambil data login id_pelanggan dari SESSION
		$x=$this->chart_model->penjualan();

		$data = array('title' 				=> 'Data Pendapatan',
					  'data' 				=> $x,
					  'isi'   				=> 'admin/chart/list'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

}

/* End of file Chart.php */
/* Location: ./application/controllers/admin/Chart.php */