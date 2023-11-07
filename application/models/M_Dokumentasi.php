<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Dokumentasi extends CI_Model {

	public function getdata(){

		$this->db->select('*');
		$this->db->from('galeri');
		$this->db->order_by('created_at', 'desc');
		$data = $this->db->get()->result_array();

		return $data;
	}

	public function getdatawhere($id){

		$this->db->select('*');
		$this->db->from('galeri');
		$this->db->where('id_galeri', $id);
		$data = $this->db->get()->row_array();

		return $data;
	}


}