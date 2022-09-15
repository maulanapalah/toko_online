<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller {

	// load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pelanggan_model');
	}

	// halaman registrasi
	public function index()
	{
		// validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama_pelanggan','Nama lengkap','required',
			array( 'required' => '%s Harus diisi'));

		$valid->set_rules('email','Email','required|valid_email|is_unique[pelanggan.email]',
			array( 'required' 	  	=> '%s Harus diisi',
				   'valid_email' 	=> '%s tidak valid',
				   'is_unique'		=> '%s Sudah terdaftar'));

		$valid->set_rules('password','Password','required',
			array( 'required' => '%s Harus diisi'));

		if ($valid->run()===FALSE) {
		// end validasi

		$data 	= array(	'title'	=> 'Registration',
							'isi'	=> 'registrasi/list'
					);
		$this->load->view('layout/wrapper', $data, FALSE);
		// masuk database
		}else{
			$i = $this->input;
			$data = array( 'status_pelanggan'	=> 'Pending',
						   'nama_pelanggan'		=> $i->post('nama_pelanggan'),
						   'email'      		=> $i->post('email'),
						   'password'   		=> SHA1($i->post('password')),
						   'telepon'			=> $i->post('telepon'),
						   'alamat'				=> $i->post('alamat'),
						   'tanggal_daftar'		=> date('Y-m-d H:i:s')
						);
			$this->pelanggan_model->tambah($data);
			// Create session login pelanggan
			$this->session->set_userdata('nama_pelanggan',$i->post('nama_pelanggan'));
			$this->session->set_userdata('email',$i->post('email'));
			// End create session
			$this->session->set_flashdata('sukses','Registrasi berhasil');
			redirect(base_url('registrasi/sukses'),'refresh');
		}
		// end masuk database
	}

	// Sukses
	public function sukses()
	{
		$data 	= array(	'title'	=> 'Registration Is Successful',
							'isi'	=> 'registrasi/sukses'
						);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

}

/* End of file Registrasi.php */
/* Location: ./application/controllers/Registrasi.php */