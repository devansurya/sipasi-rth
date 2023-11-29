<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Status extends CI_Model {

	public function get($where= ''){

		$this->db->select('id_status, status');
		$this->db->from('status_pengaduan');
		if (!empty($where)) $this->db->where($where);

		$data = $this->db->get()->result();

		return $data;
	}

}