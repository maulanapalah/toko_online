<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_berita extends CI_Controller {

	// load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('kategoriberita_model');
		// proteksi halaman
		$this->simple_login->cek_login();
	}

	// data kategori
	public function index()
	{
		$berita_kategori = $this->kategoriberita_model->listing();

		$data = array('title' 	  		=> 'Data Kategori Blog' ,
					  'berita_kategori'	=> $berita_kategori,
					  'isi'   	  		=> 'admin/berita_kategori/list'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// tambah kategori
	public function tambah()
	{
		// validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama_kategori','Nama kategori','required|is_unique[berita_kategori.nama_kategori]',
			array( 'required' 	=> '%s Harus diisi',
				   'is_unique'	=> '%s Sudah ada. Buat kategori baru'));

		if ($valid->run()===FALSE) {
		// end validasi

		$data = array('title' => 'Tambah Kategori Blog' ,
					  'isi'   => 'admin/berita_kategori/tambah'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);

		// masuk database
		}else{
			$i 			   = $this->input;
			$slug_kategori = url_title($this->input->post('nama_kategori'), 'dash', TRUE);

			$data = array( 	'slug_kategori'		=> $slug_kategori,
							'nama_kategori'		=> $i->post('nama_kategori'),
						    'urutan'			=> $i->post('urutan')
						);
			$this->kategoriberita_model->tambah($data);
			$this->session->set_flashdata('sukses','Data telah ditambah');
			redirect(base_url('admin/Kategori_berita'),'refresh');
		}
		// end masuk database
	}

	// edit kategori
	public function edit($id_kategori)
	{
		$berita_kategori = $this->kategoriberita_model->detail($id_kategori);

		// validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama_kategori','Nama Kategori','required',
			array( 'required' => '%s Harus diisi'));

		if ($valid->run()===FALSE) {
		// end validasi

		$data = array('title' => 'Edit Kategori Blog' ,
					  'berita_kategori'  => $berita_kategori,
					  'isi'   => 'admin/berita_kategori/edit'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// masuk database
		}else{
			$i 				= $this->input;
			$slug_kategori  = url_title($this->input->post('nama_kategori'), 'dash', TRUE);

			$data = array( 'id_kategori'    => $id_kategori,
						   'slug_kategori'	=> $slug_kategori,
						   'nama_kategori'	=> $i->post('nama_kategori'),
						   'urutan'		    => $i->post('urutan')
						);
			$this->kategoriberita_model->edit($data);
			$this->session->set_flashdata('sukses','Data telah diedit');
			redirect(base_url('admin/Kategori_berita'),'refresh');
		}
		// end masuk database
	}

	public function delete($id_kategori)
	{
		$data = array('id_kategori' => $id_kategori);
		$this->kategoriberita_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/Kategori_berita'),'refresh');
	}

}

/* End of file Kategori_berita.php */
/* Location: ./application/controllers/admin/Kategori_berita.php */