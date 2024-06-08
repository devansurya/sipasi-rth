<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Pengaduan extends CI_Model {

	public function get($where= ''){

		$this->db->select('p.*, jp.jenis_pengaduan, rth.nama_rth, sp.status');
		$this->db->from('pengaduan p');
		$this->db->join('jenis_pengaduan jp', 'p.id_jenispengaduan = jp.id_jenispengaduan', 'left');
		$this->db->join('status_pengaduan sp', 'p.id_status_pengaduan = sp.id_status', 'left');
		$this->db->join('rth', 'rth.id_rth = p.id_rth', 'left');
		$this->db->join('user u', 'u.id_user = p.id_user', 'left');
		// $this->db->join('contact c', 'c.id_contact = u.id_contact', 'left');

		if($this->session->userdata('id_role') == 3){
			$this->db->where('p.id_user', $this->session->userdata('id'));
		}

		if (!empty($where)) $this->db->where($where);
		$this->db->order_by('p.create_date', 'desc');

		$data = $this->db->get()->result_array();

		return $data;
	}

	public function update($id,$data){
		if($this->session->userdata('id_role') == 2){
			$this->db->where("id_user = {$this->session->userdata('id')} and id_pengaduan={$id}");
		}
		else if ($this->session->userdata('id_role') !== 2) {
			$this->db->where("id_pengaduan={$id}");
		}

	    $this->db->update('pengaduan', $data);
	    return true;
	}

	public function get_all($limit = null){

		$this->db->select('p.*, kp.jenis_pengaduan, u.email, sp.status, c.nama');
		$this->db->from('pengaduan p');
		$this->db->join('jenis_pengaduan kp', 'p.id_jenispengaduan = kp.id_jenispengaduan', 'left');
		$this->db->join('status_pengaduan sp', 'sp.id_status = p.id_status_pengaduan', 'left');
		$this->db->join('user u', 'u.id_user = p.id_user', 'left');
		$this->db->join('user_profile c', 'c.id_user = u.id_user', 'left');

		if($limit){
			$this->db->limit($limit);
		}

		$this->db->order_by('p.create_date', 'desc');

		$data = $this->db->get()->result_array();

		return $data;
	}
	public function delete($id='')
	{	
		if($this->session->userdata('id_role') == 2){
			$this->db->where("id_user = {$this->session->userdata('id')} and id_pengaduan={$id}");
		}
		else if ($this->session->userdata('id_role') !== 2) {
			$this->db->where("id_pengaduan={$id}");
		}
		else return false;
		$this->db->delete('pengaduan');
		return true;
	}

	public function get_one($id= ''){

		$this->db->select('p.*, jp.jenis_pengaduan, rth.nama_rth, v.visibilitas as privasi_status');
		$this->db->from('pengaduan p');
		$this->db->join('jenis_pengaduan jp', 'p.id_jenispengaduan = jp.id_jenispengaduan', 'left');
		$this->db->join('rth', 'rth.id_rth = p.id_rth', 'left');
		$this->db->join('visibilitas v', 'v.id_visibilitas = p.visibilitas', 'left');
		$this->db->where("p.id_pengaduan={$id}");
		$this->db->order_by('p.create_date', 'desc');

		$data = $this->db->get()->row();

		return $data;
	}

	public function count_all(){

		$this->db->from('pengaduan p');
		$this->db->join('kategori_pengaduan kp', 'p.id_kategori = kp.id_kategori', 'left');
		$this->db->join('status_pengaduan sp', 'sp.id_status = p.status', 'left');
		$this->db->join('user u', 'u.id_user = p.id_user', 'left');

		$data = $this->db->count_all_results();

		return $data;
	}

}