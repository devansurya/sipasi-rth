<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_RTH extends CI_Model {

	public function get($where = '') {
		// Select the required fields from rth and joined tables
		$this->db->select('r.*, d_kec.kecamatan as kec_rth, d_kel.kelurahan as kel_rth');
		$this->db->from('rth r');
		$this->db->join('(SELECT kd_kecamatan, kecamatan FROM wilayah GROUP BY kd_kecamatan) d_kec', 'r.kecamatan = d_kec.kd_kecamatan', 'left');
		$this->db->join('(SELECT kd_kelurahan, kelurahan FROM wilayah GROUP BY kd_kelurahan) d_kel', 'r.kelurahan = d_kel.kd_kelurahan', 'left');
	
		// Add where clause if provided
		if (!empty($where)) {
			$this->db->where($where);
		}
	
		// Order the results by create_date in descending order
		$this->db->order_by('r.create_date', 'desc');
	
		// Execute the query and fetch the result set
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

		$this->db->select('p.*, kp.kategori, u.username, sp.status, c.nim, c.nama');
		$this->db->from('pengaduan p');
		$this->db->join('kategori_pengaduan kp', 'p.id_kategori = kp.id_kategori', 'left');
		$this->db->join('status_pengaduan sp', 'sp.id_status = p.status', 'left');
		$this->db->join('user u', 'u.id_user = p.id_user', 'left');
		$this->db->join('contact c', 'c.id_contact = u.id_contact', 'left');

		if($limit){
			$this->db->limit($limit);
		}

		$this->db->order_by('p.created_at', 'desc');

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

		$this->db->select("p.*,sp.id_status, ct.nim,ct.email, kp.kategori, u.username, sp.status,ct.nama, ct.nama username,p.foto,v.visibilitas as privasi_status");
		$this->db->from('pengaduan p');
		$this->db->join('kategori_pengaduan kp', 'p.id_kategori = kp.id_kategori', 'left');
		$this->db->join('status_pengaduan sp', 'sp.id_status = p.status', 'left');
		$this->db->join('visibilitas v', 'v.id_visibilitas = p.visibilitas', 'left');
		$this->db->join('user u', 'u.id_user = p.id_user', 'left');
		$this->db->join('contact ct', 'u.id_contact = ct.id_contact', 'left');
		$this->db->where("p.id_pengaduan={$id}");
		$this->db->order_by('p.created_at', 'desc');

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