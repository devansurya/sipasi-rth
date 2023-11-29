<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Pengaduan extends CI_Model {

	public function get($where= ''){

		$this->db->select('p.id_pengaduan,p.created_at,p.visibilitas,p.keterangan, kp.kategori, p.created_at, u.username, sp.status');
		$this->db->from('pengaduan p');
		$this->db->join('kategori_pengaduan kp', 'p.id_kategori = kp.id_kategori', 'inner');
		$this->db->join('status_pengaduan sp', 'sp.id_status = p.status', 'inner');
		$this->db->join('user u', 'u.id_user = p.id_user', 'inner');
		if (!empty($where)) $this->db->where($where);
		$this->db->order_by('p.created_at', 'desc');

		$data = $this->db->get()->result_array();

		return $data;
	}

	public function get_one($id= ''){

		$this->db->select("p.id_pengaduan,p.created_at, p.keterangan, p.deskripsi,sp.id_status, ct.nim,ct.email, kp.kategori, p.created_at, u.username, sp.status");
		$this->db->from('pengaduan p');
		$this->db->join('kategori_pengaduan kp', 'p.id_kategori = kp.id_kategori', 'inner');
		$this->db->join('status_pengaduan sp', 'sp.id_status = p.status', 'inner');
		$this->db->join('user u', 'u.id_user = p.id_user', 'inner');
		$this->db->join('contact ct', 'u.id_contact = ct.id_contact', 'left');
		$this->db->where("p.id_pengaduan={$id}");
		$this->db->order_by('p.created_at', 'desc');

		$data = $this->db->get()->row();

		return $data;
	}

	public function count_all(){

		$this->db->from('pengaduan p');
		$this->db->join('kategori_pengaduan kp', 'p.id_kategori = kp.id_kategori', 'inner');
		$this->db->join('status_pengaduan sp', 'sp.id_status = p.status', 'inner');
		$this->db->join('user u', 'u.id_user = p.id_user', 'inner');

		$data = $this->db->count_all_results();

		return $data;
	}

}