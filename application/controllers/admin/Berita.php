<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

	// load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('berita_model');
		$this->load->model('kategoriberita_model');
		// proteksi halaman
		$this->simple_login->cek_login();
	}

	// data berita
	public function index()
	{
		$berita = $this->berita_model->listing();

		$data = array('title' => 'Data Blog' ,
					  'berita'  => $berita,
					  'isi'   => 'admin/berita/list'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// tambah berita
	public function tambah()
	{
		// ambil data kategori
		$berita_kategori = $this->kategoriberita_model->listing();

		// validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama_berita','Nama Berita','required',
			array( 'required' => '%s Harus diisi'));

		$valid->set_rules('kode_berita','Kode Berita','required|is_unique[berita.kode_berita]',
			array( 'required' => '%s Harus diisi',
				   'is_unique'=> '%s sudah ada. Buat kode berita baru'));


		if ($valid->run()) {
			$config['upload_path'] 		= './assets/upload/images/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
			$config['max_size']  		= '2400';
			$config['max_width']  		= '2024';
			$config['max_height'] 		= '2024';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('gambar')){
				
		// end validasi

		$data = array('title' 			=> 'Tambah Blog' ,
					  'berita_kategori'	=> $berita_kategori,
					  'error'			=> $this->upload->display_errors(),
					  'isi'   			=> 'admin/berita/tambah'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// masuk database
		}else{
			$upload_gambar = array('upload_data' => $this->upload->data());

			// create thumbnail gambar
			$config['image_library'] 	= 'gd2';
			$config['source_image'] 	= './assets/upload/images/'.$upload_gambar['upload_data']['file_name'];
			// lokasi folder thumbnail
			$config['new_image']		='./assets/upload/images/thumbs/';
			$config['create_thumb'] 	= TRUE;
			$config['maintain_ratio'] 	= TRUE;
			$config['width']         	= 250;
			$config['height']       	= 250;
			$config['thumb_marker']		= '';

			$this->load->library('image_lib', $config);

			$this->image_lib->resize();
						// end create thumbnail

			$i = $this->input;
    		$slug_berita = url_title($this->input->post('nama_berita').'-'.$this->input->post('kode_berita'), 'dash', TRUE);
			$data = array( 'id_user'		=> $this->session->userdata('id_user'),
						   'id_kategori'	=> $i->post('id_kategori'),
						   'kode_berita'    => $i->post('kode_berita'),
						   'nama_berita' 	=> $i->post('nama_berita'),
						   'slug_berita'   	=> $slug_berita,
						   'keterangan'		=> $i->post('keterangan'),
						   'keywords'		=> $i->post('keywords'),
						   // yang di simpan nama file gambar
						   'gambar'			=> $upload_gambar['upload_data']['file_name'],
						   'status_berita'	=> $i->post('status_berita'),
						   'tanggal_post'	=> date('Y-m-d H:i:s')
						);
			$this->berita_model->tambah($data);
			$this->session->set_flashdata('suskes','Data telah ditambah');
			redirect(base_url('admin/berita'),'refresh');
		}}
		// end masuk database
		$data = array('title' 			=> 'Tambah Blog' ,
					  'berita_kategori'	=> $berita_kategori,
					  'isi'   			=> 'admin/berita/tambah'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// edit berita
	public function edit($id_berita)
	{
		// ambil data berita yang akan di edit
		$berita 		= $this->berita_model->detail($id_berita);
		// ambil data kategori
		$berita_kategori= $this->kategoriberita_model->listing();
		// validasi input
		$valid 			= $this->form_validation;

		$valid->set_rules('nama_berita','Nama Berita','required',
			array( 'required' => '%s Harus diisi'));

		$valid->set_rules('kode_berita','Kode Berita','required',
			array( 'required' => '%s Harus diisi'));


		if ($valid->run()) {
			// check jika gambar di ubah
			if (!empty($_FILES['gambar']['name'])) {

			$config['upload_path'] 		= './assets/upload/images/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
			$config['max_size']  		= '2400';
			$config['max_width']  		= '2024';
			$config['max_height'] 		= '2024';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('gambar')){
				
		// end validasi

		$data = array('title' 	=> 'Edit Blog: '.$berita->nama_berita,
					  'berita_kategori'=> $berita_kategori,
					  'berita'  => $berita,
					  'error'	=> $this->upload->display_errors(),
					  'isi'   	=> 'admin/berita/edit'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// masuk database
		}else{
			$upload_gambar = array('upload_data' => $this->upload->data());

			// create thumbnail gambar
			$config['image_library'] 	= 'gd2';
			$config['source_image'] 	= './assets/upload/images/'.$upload_gambar['upload_data']['file_name'];
			// lokasi folder thumbnail
			$config['new_image']		='./assets/upload/images/thumbs/';
			$config['create_thumb'] 	= TRUE;
			$config['maintain_ratio'] 	= TRUE;
			$config['width']         	= 250;
			$config['height']       	= 250;
			$config['thumb_marker']		= '';

			$this->load->library('image_lib', $config);

			$this->image_lib->resize();
			// end create thumbnail

			$i = $this->input;
			// slug berita
    		$slug_berita = url_title($this->input->post('nama_berita').'-'.$this->input->post('kode_berita'), 'dash', TRUE);

			$data = array( 'id_berita'		=> $id_berita,
						   'id_user'		=> $this->session->userdata('id_user'),
						   'id_kategori'	=> $i->post('id_kategori'),
						   'kode_berita'    => $i->post('kode_berita'),
						   'nama_berita' 	=> $i->post('nama_berita'),
						   'slug_berita'   	=> $slug_berita,
						   'keterangan'		=> $i->post('keterangan'),
						   'keywords'		=> $i->post('keywords'),
						   // yang di simpan nama file gambar
						   'gambar'			=> $upload_gambar['upload_data']['file_name'],
						   'status_berita'	=> $i->post('status_berita')
						);
			$this->berita_model->edit($data);
			$this->session->set_flashdata('suskes','Data telah diedit');
			redirect(base_url('admin/berita'),'refresh');
		}}else{
			// edit berita tanpa ganti gambar
			$i = $this->input;
			// slug berita
    		$slug_berita = url_title($this->input->post('nama_berita').'-'.$this->input->post('kode_berita'), 'dash', TRUE);

			$data = array( 'id_berita'		=> $id_berita,
						   'id_user'		=> $this->session->userdata('id_user'),
						   'id_kategori'	=> $i->post('id_kategori'),
						   'kode_berita'    => $i->post('kode_berita'),
						   'nama_berita' 	=> $i->post('nama_berita'),
						   'slug_berita'   	=> $slug_berita,
						   'keterangan'		=> $i->post('keterangan'),
						   'keywords'		=> $i->post('keywords'),
						   // yang di simpan nama file gambar(gambar tidak di ganti)
						   // 'gambar'		=> $upload_gambar['upload_data']['file_name'],
						   'status_berita'	=> $i->post('status_berita')
						);
			$this->berita_model->edit($data);
			$this->session->set_flashdata('suskes','Data telah diedit');
			redirect(base_url('admin/berita'),'refresh');
		}}
		// end masuk database
		$data = array('title' 			=> 'Edit Blog: '.$berita->nama_berita,
					  'berita_kategori'	=> $berita_kategori,
					  'berita'			=> $berita,
					  'isi'   			=> 'admin/berita/edit'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// delete berita
	public function delete($id_berita)
	{
		// proses hapus gambar
		$berita = $this->berita_model->detail($id_berita);
		unlink('./assets/upload/images/'.$berita->gambar);
		unlink('./assets/upload/images/thumbs/'.$berita->gambar);

		// end proses hapus
		$data = array('id_berita' => $id_berita);
		$this->berita_model->delete($data);
		$this->session->set_flashdata('Sukses', 'Data telah dihapus');
		redirect(base_url('admin/berita'),'refresh');
	}

}

/* End of file Berita.php */
/* Location: ./application/controllers/admin/Berita.php */