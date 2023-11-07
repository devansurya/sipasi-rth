<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Guru extends CI_Model {

	public function getdata(){

		$this->db->select('*');
		$this->db->from('guru');
		$this->db->order_by('nama', 'asc');
		$data = $this->db->get()->result_array();

		return $data;
	}


}