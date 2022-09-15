<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	// halaman Contact
	public function index()
	{
		$data = array( 'title' 		=> 'Contact',
					   'isi'		=> 'contact/list'
					);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

}

/* End of file Kontak.php */
/* Location: ./application/controllers/Kontak.php */