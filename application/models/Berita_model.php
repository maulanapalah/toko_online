<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing all berita
	public function listing()
	{
		$this->db->select('berita.*,
						users.nama,
						berita_kategori.nama_kategori,
						berita_kategori.slug_kategori');
		$this->db->from('berita');
		// Join
		$this->db->join('users', 'users.id_user = berita.id_user', 'left');
		$this->db->join('berita_kategori', 'berita_kategori.id_kategori = berita.id_kategori', 'left');

		// end Join
		$this->db->group_by('berita.id_berita');
		$this->db->order_by('id_berita', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing all berita home
	public function home()
	{
		$this->db->select('berita.*,
						users.nama,
						berita_kategori.nama_kategori,
						berita_kategori.slug_kategori');
		$this->db->from('berita');
		// Join
		$this->db->join('users', 'users.id_user = berita.id_user', 'left');
		$this->db->join('berita_kategori', 'berita_kategori.id_kategori = berita.id_kategori', 'left');

		// end Join
		$this->db->where('berita.status_berita', 'Publish');
		$this->db->group_by('berita.id_berita');
		$this->db->order_by('id_berita', 'desc');
		$this->db->limit(50);
		$query = $this->db->get();
		return $query->result();
	}

	// Read berita
	public function read($slug_berita)
	{
		$this->db->select('berita.*,
						users.nama,
						berita_kategori.nama_kategori,
						berita_kategori.slug_kategori');
		$this->db->from('berita');
		// Join
		$this->db->join('users', 'users.id_user = berita.id_user', 'left');
		$this->db->join('berita_kategori', 'berita_kategori.id_kategori = berita.id_kategori', 'left');

		// end Join
		$this->db->where('berita.status_berita', 'Publish');
		$this->db->where('berita.slug_berita', $slug_berita);
		$this->db->group_by('berita.id_berita');
		$this->db->order_by('id_berita', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// berita
	public function berita($limit,$start)
	{
		$this->db->select('berita.*,
						users.nama,
						berita_kategori.nama_kategori,
						berita_kategori.slug_kategori');
		$this->db->from('berita');
		// Join
		$this->db->join('users', 'users.id_user = berita.id_user', 'left');
		$this->db->join('berita_kategori', 'berita_kategori.id_kategori = berita.id_kategori', 'left');

		// end Join
		$this->db->where('berita.status_berita', 'Publish');
		$this->db->group_by('berita.id_berita');
		$this->db->order_by('id_berita', 'desc');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result();
	}

	// total berita
	public function total_berita()
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('berita');
		$this->db->where('status_berita', 'publish');
		$query = $this->db->get();
		return $query->row();
	}

	// kategori berita
	public function kategori($id_kategori,$limit,$start)
	{
		$this->db->select('berita.*,
						users.nama,
						berita_kategori.nama_kategori,
						berita_kategori.slug_kategori');
		$this->db->from('berita');
		// Join
		$this->db->join('users', 'users.id_user = berita.id_user', 'left');
		$this->db->join('berita_kategori', 'berita_kategori.id_kategori = berita.id_kategori', 'left');

		// end Join
		$this->db->where('berita.status_berita', 'Publish');
		$this->db->where('berita.id_kategori', $id_kategori);
		$this->db->group_by('berita.id_berita');
		$this->db->order_by('id_berita', 'desc');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result();
	}

	// total kategori berita
	public function total_kategori($id_kategori)
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('berita');
		$this->db->where('status_berita', 'publish');
		$this->db->where('id_kategori', $id_kategori);
		$query = $this->db->get();
		return $query->row();
	}

	// listing kategori
	public function listing_kategori()
	{
		$this->db->select('berita.*,
						users.nama,
						berita_kategori.nama_kategori,
						berita_kategori.slug_kategori');
		$this->db->from('berita');
		// Join
		$this->db->join('users', 'users.id_user = berita.id_user', 'left');
		$this->db->join('berita_kategori', 'berita_kategori.id_kategori = berita.id_kategori', 'left');

		// end Join
		$this->db->group_by('berita.id_berita');
		$this->db->order_by('id_berita', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// Detail berita
	public function detail($id_berita)
	{
		$this->db->select('*');
		$this->db->from('berita');
		$this->db->where('id_berita', $id_berita);
		$this->db->order_by('id_berita', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// tambah
	public function tambah($data)
	{
		$this->db->insert('berita', $data);
	}

	// edit
	public function edit($data)
	{
		$this->db->where('id_berita', $data['id_berita']);
		$this->db->update('berita', $data);
	}

	// delete
	public function delete($data)
	{
		$this->db->where('id_berita', $data['id_berita']);
		$this->db->delete('berita', $data);
	}
}

/* End of file Berita_model.php */
/* Location: ./application/models/Berita_model.php */