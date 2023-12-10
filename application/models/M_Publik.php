<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Publik extends CI_Model {

	public function get_pengaduan($limit = null){

		$this->db->select('p.*, kp.kategori, u.username, sp.status, c.nim, c.nama,COUNT(k.id_komentar) as jumlah_komentar');
		$this->db->from('pengaduan p');
		$this->db->join('kategori_pengaduan kp', 'p.id_kategori = kp.id_kategori', 'left');
		$this->db->join('status_pengaduan sp', 'sp.id_status = p.status', 'left');
		$this->db->join('user u', 'u.id_user = p.id_user', 'left');
		$this->db->join('contact c', 'c.id_contact = u.id_contact', 'left');
		$this->db->join('komentar k', 'k.id_pengaduan = p.id_pengaduan', 'left');

		if($limit){
			$this->db->limit($limit);
		}

		$this->db->where('p.visibilitas !=', 3);

		$this->db->order_by('p.created_at', 'desc');

		$this->db->group_by('p.id_pengaduan');

		$data = $this->db->get()->result_array();

		return $data;
	}

	public function get_pengaduan_where($id= ''){

		$this->db->select("p.*,sp.id_status, ct.nim,ct.email, kp.kategori, u.username, sp.status,sp.color as status_color,ct.nama");
		$this->db->from('pengaduan p');
		$this->db->join('kategori_pengaduan kp', 'p.id_kategori = kp.id_kategori', 'left');
		$this->db->join('status_pengaduan sp', 'sp.id_status = p.status', 'left');
		$this->db->join('user u', 'u.id_user = p.id_user', 'left');
		$this->db->join('contact ct', 'u.id_contact = ct.id_contact', 'left');
		$this->db->where("p.id_pengaduan={$id}");
		$this->db->order_by('p.created_at', 'desc');

		$this->db->where('p.visibilitas !=', 3);

		$data = $this->db->get()->row();

		return $data;
	}

	public function get_komentar($id_pengaduan){

		$this->db->select('k.*, u.username, c.nim, c.nama,c.image');
		$this->db->from('komentar k');
		$this->db->join('user u', 'u.id_user = k.id_user', 'left');
		$this->db->join('contact c', 'c.id_contact = u.id_contact', 'left');

		$this->db->where('k.id_pengaduan', $id_pengaduan);

		$this->db->order_by('k.created_at', 'asc');

		$data = $this->db->get()->result_array();

		return $data;
	}


}