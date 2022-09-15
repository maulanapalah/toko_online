<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Size extends CI_Controller {

	// load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('size_model');
		$this->load->model('kategori_model');
		// proteksi halaman
		$this->simple_login->cek_login();
	}

	// data size
	public function index()
	{
		$size = $this->size_model->listing();

		$data = array('title' 	  => 'Data Size Produk' ,
					  'size'  	  => $size,
					  'isi'   	  => 'admin/size/list'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// tambah size
	public function tambah()
	{
		// ambil data kategori
		$kategori = $this->kategori_model->listing();

		// validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama_size','Nama size','required|is_unique[size.nama_size]',
			array( 'required' 	=> '%s Harus diisi',
				   'is_unique'	=> '%s Sudah ada. Buat size baru'));

		if ($valid->run()===FALSE) {
		// end validasi

		$data = array('title'   => 'Tambah Size Produk',
					  'kategori'=> $kategori,
					  'isi'     => 'admin/size/tambah'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);

		// masuk database
		}else{
			$i 			= $this->input;
			$slug_size 	= url_title($this->input->post('nama_size'), 'dash', TRUE);

			$data = array('slug_size'	=> $slug_size,
						  'id_kategori'	=> $i->post('id_kategori'),
						  'nama_size'	=> $i->post('nama_size'),
						  'urutan'		=> $i->post('urutan')
						);
			$this->size_model->tambah($data);
			$this->session->set_flashdata('sukses','Data telah ditambah');
			redirect(base_url('admin/size'),'refresh');
		}
		// end masuk database
		$data = array('title' 	=> 'Tambah Size' ,
					  'kategori'=> $kategori,
					  'isi'   	=> 'admin/size/tambah'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}


	// edit size
	public function edit($id_size)
	{
		$size = $this->size_model->detail($id_size);

		// ambil data kategori
		$kategori 	= $this->kategori_model->listing();

		// validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama_size','Nama Size','required',
			array( 'required' => '%s Harus diisi'));

		if ($valid->run()===FALSE) {
		// end validasi

		$data = array('title' 	=> 'Edit Size Produk' ,
					  'size'  	=> $size,
					  'kategori'=> $kategori,
					  'isi'   	=> 'admin/size/edit'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// masuk database
		}else{
			$i 				= $this->input;
			$slug_size  = url_title($this->input->post('nama_size'), 'dash', TRUE);

			$data = array( 'id_size'   	 	=> $id_size,
						   'slug_size'		=> $slug_size,
						   'id_kategori'	=> $i->post('id_kategori'),
						   'nama_size'		=> $i->post('nama_size'),
						   'urutan'		    => $i->post('urutan')
						);
			$this->size_model->edit($data);
			$this->session->set_flashdata('sukses','Data telah diedit');
			redirect(base_url('admin/size'),'refresh');
		}
		// end masuk database

		$data = array('title' 	=> 'Edit Size: '.$size->nama_size,
					  'kategori'=> $kategori,
					  'size'	=> $size,
					  'isi'   	=> 'admin/size/edit'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}


	public function delete($id_size)
	{
		$data = array('id_size' => $id_size);
		$this->size_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/size'),'refresh');
	}
}

/* End of file Size.php */
/* Location: ./application/controllers/admin/Size.php */