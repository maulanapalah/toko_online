<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategoriberita_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing all kategori
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('berita_kategori');
		$this->db->order_by('id_kategori', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// Detail kategori
	public function detail($id_kategori)
	{
		$this->db->select('*');
		$this->db->from('berita_kategori');
		$this->db->where('id_kategori', $id_kategori);
		$this->db->order_by('id_kategori', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// Detail slug kategori
	public function read($slug_kategori)
	{
		$this->db->select('*');
		$this->db->from('berita_kategori');
		$this->db->where('slug_kategori', $slug_kategori);
		$this->db->order_by('id_kategori', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// login
	public function login($kategoriname,$password)
	{
		$this->db->select('*');
		$this->db->from('berita_kategori');
		$this->db->where(array('kategoriname' => $kategoriname,
							   'password' => SHA1($password)));
		$this->db->order_by('id_kategori', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// tambah
	public function tambah($data)
	{
		$this->db->insert('berita_kategori', $data);
	}

	// edit
	public function edit($data)
	{
		$this->db->where('id_kategori', $data['id_kategori']);
		$this->db->update('berita_kategori', $data);
	}

	// delete
	public function delete($data)
	{
		$this->db->where('id_kategori', $data['id_kategori']);
		$this->db->delete('berita_kategori', $data);
	}

}

/* End of file Kategoriberita_model.php */
/* Location: ./application/models/Kategoriberita_model.php */