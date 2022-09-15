<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

	// load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('berita_model');
		$this->load->model('kategoriberita_model');
	}

	// listing data berita
	public function index()
	{
		$site 				= $this->konfigurasi_model->listing();
		$listing_kategori	= $this->berita_model->listing_kategori();
		// mengambil data total
		$total				= $this->berita_model->total_berita();
		// paginasi start
		$this->load->library('pagination');
		
		$config['base_url'] 		= base_url().'berita/index/';
		$config['total_rows'] 		= $total->total;
		$config['use_page_numbers'] = TRUE;
		$config['per_page'] 		= 6;
		$config['uri_segment'] 		= 3;
		$config['num_links'] 		= 5;
		$config['full_tag_open']	= '<ul class="pagination">';
		$config['full_tag_close'] 	= '</ul>';
		$config['first_link'] 		= 'First';
		$config['first_tag_open'] 	= '<li>';
		$config['first_tag_close'] 	= '</li>';
		$config['last_link']		= 'Last';
		$config['last_tag_open'] 	= '<li class="disabled"><li class="active"><a href="#">';
		$config['last_tag_close'] 	= '<spam class="sr-only"></a></li></li>';
		$config['next_link'] 		= '&gt;';
		$config['next_tag_open'] 	= '<div>';
		$config['next_tag_close'] 	= '</div>';
		$config['prev_link'] 		= '&lt;';
		$config['prev_tag_open'] 	= '<div>';
		$config['prev_tag_close'] 	= '</div>';
		$config['cur_tag_open'] 	= '<b>';
		$config['cur_tag_close'] 	= '</b>';
		$config['first_url']		= base_url().'/berita/';
		$this->pagination->initialize($config);
		// ambil data berita
		$page 		= ($this->uri->segment(3)) ? ($this->uri->segment(3)-1) * $config['per_page']:0;
		$berita 	= $this->berita_model->berita($config['per_page'],$page);
		// paginasi end

		$data = array( 'title'  			=> 'Blog '.$site->namaweb,
					   'site'				=> $site,
					   'listing_kategori' 	=> $listing_kategori,
					   'berita'				=> $berita,
					   'pagin'				=> $this->pagination->create_links(),
					   'isi'				=> 'berita/list'
					);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	// listing data kategori berita
	public function kategori($slug_kategori)
	{
		// kategori detail
		$kategori			= $this->kategoriberita_model->read($slug_kategori);
		$id_kategori		= $kategori->id_kategori;
		// data global
		$site 				= $this->konfigurasi_model->listing();
		$listing_kategori	= $this->berita_model->listing_kategori();
		// mengambil data total
		$total				= $this->berita_model->total_kategori($id_kategori);
		// paginasi start
		$this->load->library('pagination');
		
		$config['base_url'] 		= base_url().'berita/kategori/'.$slug_kategori.'/index/';
		$config['total_rows'] 		= $total->total;
		$config['use_page_numbers'] = TRUE;
		$config['per_page'] 		= 6;
		$config['uri_segment'] 		= 5;
		$config['num_links'] 		= 5;
		$config['full_tag_open']	= '<ul class="pagination">';
		$config['full_tag_close'] 	= '</ul>';
		$config['first_link'] 		= 'First';
		$config['first_tag_open'] 	= '<li>';
		$config['first_tag_close'] 	= '</li>';
		$config['last_link']		= 'Last';
		$config['last_tag_open'] 	= '<li class="disabled"><li class="active"><a href="#">';
		$config['last_tag_close'] 	= '<spam class="sr-only"></a></li></li>';
		$config['next_link'] 		= '&gt;';
		$config['next_tag_open'] 	= '<div>';
		$config['next_tag_close'] 	= '</div>';
		$config['prev_link'] 		= '&lt;';
		$config['prev_tag_open'] 	= '<div>';
		$config['prev_tag_close'] 	= '</div>';
		$config['cur_tag_open'] 	= '<b>';
		$config['cur_tag_close'] 	= '</b>';
		$config['first_url']		= base_url().'/berita/kategori/'.$slug_kategori;
		$this->pagination->initialize($config);
		// ambil data berita
		$page 		= ($this->uri->segment(5)) ? ($this->uri->segment(5)-1) * $config['per_page']:0;
		$berita 	= $this->berita_model->kategori($id_kategori, $config['per_page'],$page);
		// paginasi end

		$data = array( 'title'  			=> $kategori->nama_kategori,
					   'site'				=> $site,
					   'listing_kategori' 	=> $listing_kategori,
					   'berita'				=> $berita,
					   'pagin'				=> $this->pagination->create_links(),
					   'isi'				=> 'berita/list'
					);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	// detail berita
	public function detail($slug_berita)
	{
		$site 				= $this->konfigurasi_model->listing();
		$berita 			= $this->berita_model->read($slug_berita);
		$id_berita 			= $berita->id_berita;
		// $gambar	 			= $this->berita_model->gambar($id_berita);
		$berita_related		= $this->berita_model->home();

		$data = array( 'title'  		=> $berita->nama_berita,
					   'site'			=> $site,
					   'berita'			=> $berita,
					   'berita_related'	=> $berita_related,
					   // 'gambar'		=> $gambar,
					   'isi'			=> 'berita/detail'
					);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

}

/* End of file Berita.php */
/* Location: ./application/controllers/Berita.php */