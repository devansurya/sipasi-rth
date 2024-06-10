<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Reservasi extends CI_Model {

	public function get($where= ''){

		$this->db->select('r.*, jr.jenis_reservasi, rth.nama_rth, sr.status,up.nama');
		$this->db->from('reservasi r');
		$this->db->join('jenis_reservasi jr', 'r.id_jenisreservasi = jr.id_jenisreservasi', 'left');
		$this->db->join('status_reservasi sr', 'r.id_status_reservasi = sr.id_status_reservasi', 'left');
		$this->db->join('rth', 'rth.id_rth = r.id_rth', 'left');
		$this->db->join('user u', 'u.id_user = r.id_user', 'left');
		$this->db->join('user_profile up', 'up.id_user = r.id_user', 'left');
		// $this->db->join('contact c', 'c.id_contact = u.id_contact', 'left');
		if($this->session->userdata('id_role') == 2){
			$this->db->join('penempatan_petugas pp', 'pp.id_rth = rth.id_rth', 'left');
			$this->db->where('pp.id_user', $this->session->userdata('id'));
		}

		if($this->session->userdata('id_role') == 3){
			$this->db->where('r.id_user', $this->session->userdata('id'));
		}

		if (!empty($where)) $this->db->where($where);
		$this->db->order_by('r.create_date', 'desc');

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

		$this->db->select('r.*, jr.jenis_reservasi, rth.nama_rth,rth.foto_rth, f.nama as nama_fasilitas, f.luas, f.kapasitas, f.foto as foto_fasilitas,up.nama,up.no_telp,u.email,sr.status, sr.deskripsi as detail_status');
		$this->db->from('reservasi r');
		$this->db->join('jenis_reservasi jr', 'r.id_jenisreservasi = jr.id_jenisreservasi', 'left');
		$this->db->join('status_reservasi sr', 'r.id_status_reservasi = sr.id_status_reservasi', 'left');
		$this->db->join('rth', 'rth.id_rth = r.id_rth', 'left');
		$this->db->join('fasilitas_reservasi f', 'f.id_fasilitas_reservasi = r.id_fasilitas_reservasi', 'left');
		$this->db->join('user u', 'u.id_user = r.id_user', 'left');
		$this->db->join('user_profile up', 'up.id_user = r.id_user', 'left');
		$this->db->where("r.id_reservasi={$id}");
		$this->db->order_by('r.create_date', 'desc');

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