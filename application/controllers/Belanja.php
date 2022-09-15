<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Belanja extends CI_Controller {

	// load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('produk_model');
		$this->load->model('kategori_model');
		$this->load->model('konfigurasi_model');
		$this->load->model('pelanggan_model');
		$this->load->model('header_transaksi_model');
		$this->load->model('transaksi_model');
		// load halper Random string
		$this->load->helper('string');
	}

	// halaman Belanja
	public function index()
	{
		$keranjang = $this->cart->contents();

		$data = array( 'title' 		=> 'Shopping Cart',
					   'keranjang'	=> $keranjang,
					   'isi'		=> 'belanja/list'
					);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	// Belanja sukses
	public function sukses()
	{
		$data = array( 'title' 		=> 'Successful',
					   'isi'		=> 'belanja/sukses'
					);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	// Checkout
	public function checkout()
	{
		// check pelanggan sudah login atau belum? jika belum makan akan di perintahkan untuk registrasi dan lalu kemudian login
		// Mengecek dengan session email

		// kondisi sudah login
		if ($this->session->userdata('email')) {
			$email 			= $this->session->userdata('email');
			$nama_pelanggan = $this->session->userdata('nama_pelanggan');
			$pelanggan 		= $this->pelanggan_model->sudah_login($email,$nama_pelanggan);

			$keranjang 		= $this->cart->contents();

			// validasi input
			$valid = $this->form_validation;

			$valid->set_rules('nama_pelanggan','Nama lengkap','required',
				array( 'required' => '%s Harus diisi'));

			$valid->set_rules('telepon','Nomer Telepon','required',
				array( 'required' => '%s Harus diisi'));

			$valid->set_rules('alamat','Alamat','required',
				array( 'required' => '%s Harus diisi'));

			$valid->set_rules('email','Email','required|valid_email',
				array( 'required' 	  	=> '%s Harus diisi',
					   'valid_email' 	=> '%s tidak valid'));

			if ($valid->run()===FALSE) {
			// end validasi

			$data = array( 'title' 		=> 'Shopping Cart',
						   'keranjang'	=> $keranjang,
						   'pelanggan'	=> $pelanggan,
						   'isi'		=> 'belanja/checkout'
						);
			$this->load->view('layout/wrapper', $data, FALSE);
			// masuk database
			}else{
				$i = $this->input;
				$data = array( 'id_pelanggan'		=> $pelanggan->id_pelanggan,
							   'nama_pelanggan'		=> $i->post('nama_pelanggan'),
							   'email'      		=> $i->post('email'),
							   'telepon'			=> $i->post('telepon'),
							   'alamat'				=> $i->post('alamat'),
							   'kode_transaksi'		=> $i->post('kode_transaksi'),
							   'tanggal_transaksi'	=> $i->post('tanggal_transaksi'),
							   'jumlah_transaksi'	=> $i->post('jumlah_transaksi'),
							   'status_bayar'		=> 'Belum',
							   'tanggal_post'		=> date('Y-m-d H:i:s')
							);
				// proses masuk ke heder transaksi
				$this->header_transaksi_model->tambah($data);
				// proses masuk ke table transaksi
				foreach ($keranjang as $keranjang) {
					$sub_total = $keranjang['price'] * $keranjang['qty'];

					$data = array(	'id_pelanggan'	 	=> $pelanggan->id_pelanggan,
									'kode_transaksi'	=> $i->post('kode_transaksi'),
									'id_produk'			=> $keranjang['id'],
									'harga'				=> $keranjang['price'],
									'jumlah'			=> $keranjang['qty'],
									'total_harga'		=> $sub_total,
									'tanggal_transaksi'	=> $i->post('tanggal_transaksi')			
								);
					$this->transaksi_model->tambah($data);
				}
				// end masuk ke table transaksi
				// setelah masuk ke tabel transaksi, maka keranjang dikosongkan lagi
				$this->cart->destroy();
				// end pengosongan keranjang
				$this->session->set_flashdata('suskes','Chech out berhasil');
				redirect(base_url('belanja/sukses'),'refresh');
			}
			// End masuk database

		}else{
			// kalau belum maka registrasi lebih dahulu
			$this->session->set_flashdata('sukses', 'Silakan registrasi atau login terlebih dahulu');
			redirect(base_url('registrasi'),'refresh');
		}

	}

	// tambah ke keranjang belanja
	public function add()
	{
		// ambil data dari home
		$id 			= $this->input->post('id');
		$qty 			= $this->input->post('qty');
		$price 			= $this->input->post('price');
		$name 			= $this->input->post('name');
		$redirect_page 	= $this->input->post('redirect_page');

		// proses memasukan ke keranjang belanja
		$data = array( 	'id'		=> $id,
						'qty'		=> $qty,
						'price'		=> $price,
						'name'		=> $name
					);
		$this->cart->insert($data);
		// redirect page
		redirect($redirect_page,'refresh');
	}

	// update cart
	public function update_cart($rowid)
	{
		// jika ada data row id
		if ($rowid) {
			$data 	= array(	'rowid'	=> $rowid,
								'qty'	=> $this->input->post('qty')
						);
			$this->cart->update($data);
			$this->session->set_flashdata('sukses', 'Data Updated Successfully');
			redirect(base_url('belanja'),'refresh');
		
		}else{
			// jika tidak ada rowid
			redirect(base_url('belanja'),'refresh');
		}
	}

	// hapus semua keranjang belanja
	public function hapus($rowid="")
	{
		if ($rowid) {
			// hapus per item
			$this->cart->remove($rowid);
			$this->session->set_flashdata('sukses', 'Data Has Been Deleted');
			redirect(base_url('belanja'),'refresh');
		}else{
			// hapus all
			$this->cart->destroy();
			$this->session->set_flashdata('sukses', 'Cart Data Has Been Deleted');
			redirect(base_url('belanja'),'refresh');
		}
	}

}

/* End of file Belanja.php */
/* Location: ./application/controllers/Belanja.php */