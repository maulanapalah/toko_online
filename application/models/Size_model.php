<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Size_model extends CI_Model {

public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	// Listing all produk
	public function listing()
	{
		$this->db->select('size.*,
						kategori.nama_kategori
						');
		$this->db->from('size');
		// Join
		$this->db->join('kategori', 'kategori.id_kategori = size.id_kategori', 'left');
		// end Join
		$this->db->group_by('size.id_size');
		$this->db->order_by('id_size', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// Detail size
	public function detail($id_size)
	{
		$this->db->select('*');
		$this->db->from('size');
		$this->db->where('id_size', $id_size);
		$this->db->order_by('id_size', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// Detail slug size
	public function read($slug_size)
	{
		$this->db->select('*');
		$this->db->from('size');
		$this->db->where('slug_size', $slug_size);
		$this->db->order_by('id_size', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// login
	// public function login($sizename,$password)
	// {
	// 	$this->db->select('*');
	// 	$this->db->from('size');
	// 	$this->db->where(array('sizename' => $sizename,
	// 						   'password' => SHA1($password)));
	// 	$this->db->order_by('id_size', 'desc');
	// 	$query = $this->db->get();
	// 	return $query->row();
	// }
	
	// tambah
	public function tambah($data)
	{
		$this->db->insert('size', $data);
	}

	// edit
	public function edit($data)
	{
		$this->db->where('id_size', $data['id_size']);
		$this->db->update('size', $data);
	}

	// delete
	public function delete($data)
	{
		$this->db->where('id_size', $data['id_size']);
		$this->db->delete('size', $data);
	}	

}

/* End of file Size_model.php */
/* Location: ./application/models/Size_model.php */