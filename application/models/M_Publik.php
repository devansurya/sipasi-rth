<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Publik extends CI_Model {

	public function get_rth($limit = null,$ktg = null,$status = null){

		$this->db->select("r.id_rth, r.nama_rth, r.deskripsi_rth, r.alamat, r.foto_rth, r.status_reservasi, r.create_date , kec.kecamatan, kel.kelurahan");
		$this->db->from('rth r');
		$this->db->join('wilayah kec', 'kec.kd_kecamatan = r.kecamatan', 'left');
		$this->db->join('wilayah kel', 'kel.kd_kelurahan = r.kelurahan', 'left');
		

		if($limit){
			$this->db->limit($limit);
		}

		// if($ktg){
		// 	$this->db->where('p.id_kategori IN '.$ktg);
		// }

		if($status){
			$this->db->where('r.status_reservasi IN '.$status);
		}

		// $this->db->where('p.visibilitas !=', 3);

		$this->db->order_by('r.create_date', 'desc');

		$this->db->group_by('r.id_rth');

		$data = $this->db->get()->result_array();

		return $data;
	}

	public function get_rth_where($id= ''){

		$this->db->select("r.id_rth, r.nama_rth, r.deskripsi_rth, r.alamat, r.foto_rth, r.status_reservasi, r.create_date , kec.kecamatan, kel.kelurahan");
		$this->db->from('rth r');
		$this->db->join('wilayah kec', 'kec.kd_kecamatan = r.kecamatan', 'left');
		$this->db->join('wilayah kel', 'kel.kd_kelurahan = r.kelurahan', 'left');
		$this->db->where("r.id_rth={$id}");
		$this->db->order_by('r.create_date', 'desc');

		$data = $this->db->get()->row();

		return $data;
	}

	public function get_pengaduan($limit = null,$ktg = null,$status = null){

		$this->db->select('p.*, kp.jenis_pengaduan, u.email, sp.status, sp.color as status_color, c.nama,COUNT(k.id_komentar) as jumlah_komentar');
		$this->db->from('pengaduan p');
		$this->db->join('jenis_pengaduan kp', 'p.id_jenispengaduan = kp.id_jenispengaduan', 'left');
		$this->db->join('status_pengaduan sp', 'sp.id_status = p.id_status_pengaduan', 'left');
		$this->db->join('user u', 'u.id_user = p.id_user', 'left');
		$this->db->join('user_profile c', 'c.id_user = u.id_user', 'left');
		$this->db->join('komentar k', 'k.id_pengaduan = p.id_pengaduan', 'left');

		if($limit){
			$this->db->limit($limit);
		}

		if($ktg){
			$this->db->where('p.id_jenispengaduan IN '.$ktg);
		}

		if($status){
			$this->db->where('p.id_status_pengaduan IN '.$status);
		}

		$this->db->where('p.visibilitas !=', 3);

		$this->db->where('p.status_publish !=', 0);

		$this->db->order_by('p.create_date', 'desc');

		$this->db->group_by('p.id_pengaduan');

		$data = $this->db->get()->result_array();

		return $data;
	}

	public function get_pengaduan_where($id= ''){

		$this->db->select("p.*,sp.id_status, kp.jenis_pengaduan, u.email, sp.status,sp.color as status_color,c.nama");
		$this->db->from('pengaduan p');
		$this->db->join('jenis_pengaduan kp', 'p.id_jenispengaduan = kp.id_jenispengaduan', 'left');
		$this->db->join('status_pengaduan sp', 'sp.id_status = p.id_status_pengaduan', 'left');
		$this->db->join('user u', 'u.id_user = p.id_user', 'left');
		$this->db->join('user_profile c', 'c.id_user = u.id_user', 'left');
		$this->db->where("p.id_pengaduan={$id}");
		$this->db->order_by('p.create_date', 'desc');

		$this->db->where('p.visibilitas !=', 3);

		$data = $this->db->get()->row();

		return $data;
	}

	public function get_komentar($id_pengaduan){

		$this->db->select('k.*, u.email, c.nama,c.foto_profile');
		$this->db->from('komentar k');
		$this->db->join('user u', 'u.id_user = k.id_user', 'left');
		$this->db->join('user_profile c', 'c.id_user = u.id_user', 'left');

		$this->db->where('k.id_pengaduan', $id_pengaduan);

		$this->db->order_by('k.created_at', 'asc');

		$data = $this->db->get()->result_array();

		return $data;
	}

	public function get_kategori_pengaduan(){

		$this->db->select('k.*, count(p.id_pengaduan) as total');
		$this->db->from('jenis_pengaduan k');
		$this->db->join('pengaduan p', 'p.id_jenispengaduan = k.id_jenispengaduan', 'left');

		$this->db->order_by('k.jenis_pengaduan', 'asc');
		$this->db->group_by('k.id_jenispengaduan');

		$data = $this->db->get()->result_array();

		return $data;
	}

	public function get_status_pengaduan(){

		$this->db->select('s.*, count(p.id_pengaduan) as total');
		$this->db->from('status_pengaduan s');
		$this->db->join('pengaduan p', 'p.id_status_pengaduan = s.id_status', 'left');

		$this->db->order_by('s.id_status', 'asc');
		$this->db->group_by('s.id_status');

		$data = $this->db->get()->result_array();

		return $data;
	}

	public function get_kategori_pengaduan_favorit(){

		$this->db->select('k.*, count(p.id_pengaduan) as total');
		$this->db->from('kategori_pengaduan k');
		$this->db->join('pengaduan p', 'p.id_kategori = k.id_kategori', 'left');

		$this->db->order_by('total', 'desc');
		$this->db->group_by('k.id_kategori');
		$this->db->limit(3);

		$data = $this->db->get()->result_array();

		return $data;
	}


}