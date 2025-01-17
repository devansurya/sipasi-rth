<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_RTH extends CI_Model {

	public function get($where = '') {
		// Select the required fields from rth and joined tables
		$this->db->select('r.*, d_kec.kecamatan as kec_rth, d_kel.kelurahan as kel_rth');
		if($this->session->userdata('id_role') == 2){
			$this->db->from('penempatan_petugas pp');
			$this->db->join('rth r', 'r.id_rth = pp.id_rth', 'left');
			$this->db->join('(SELECT kd_kecamatan, kecamatan FROM wilayah GROUP BY kd_kecamatan) d_kec', 'r.kecamatan = d_kec.kd_kecamatan', 'left');
			$this->db->join('(SELECT kd_kelurahan, kelurahan FROM wilayah GROUP BY kd_kelurahan) d_kel', 'r.kelurahan = d_kel.kd_kelurahan', 'left');
			$this->db->where('pp.id_user', $this->session->userdata('id'));
		}else{
			$this->db->from('rth r');
			$this->db->join('(SELECT kd_kecamatan, kecamatan FROM wilayah GROUP BY kd_kecamatan) d_kec', 'r.kecamatan = d_kec.kd_kecamatan', 'left');
			$this->db->join('(SELECT kd_kelurahan, kelurahan FROM wilayah GROUP BY kd_kelurahan) d_kel', 'r.kelurahan = d_kel.kd_kelurahan', 'left');
		}
	
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

	public function count_rth() {
		$this->db->select('r.*');
		$this->db->from('rth r');

		$data = $this->db->count_all_results();
	
		return $data;
	}
	public function count_pengaduan() {
		$this->db->select('pengaduan.*');
		$this->db->from('pengaduan');

		$data = $this->db->count_all_results();
	
		return $data;
	}

	public function count_reservasi() {
		$this->db->select('reservasi.*');
		$this->db->from('reservasi');

		$data = $this->db->count_all_results();
	
		return $data;
	}

	public function get_petugas(){

		$this->db->select('u.id_user,up.nama,up.no_telp, up.alamat');
		$this->db->from('user u');
		$this->db->join('user_profile up', 'u.id_user = up.id_user', 'left');
		$this->db->join('user_role ur', 'ur.id_user = u.id_user', 'left');
		$this->db->join('penempatan_petugas pp', 'u.id_user = pp.id_user', 'left');
		$this->db->where('ur.id_role', 2);
        // $this->db->where('pp.id_user IS NULL');
        // $this->db->or_where('pp.id_rth', $id_rth);

		

		$this->db->order_by('up.nama', 'asc');
		$this->db->group_by('u.id_user');

		$data = $this->db->get()->result();

		return $data;
	}

}