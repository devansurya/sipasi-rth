<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Ref extends CI_Model {

	public function insertTable($table,$data){
		$query = $this->db->insert($table, $data);
		$id = $this->db->insert_id();

		return $id;
		
	}
	
	public function getAll($table)
	{
		$this->db->select('*');
		$this->db->from($table);
		$query = $this->db->get()->result_array();
		return $query;
	}

	public function getAllResult($table)
	{
		$this->db->select('*');
		$this->db->from($table);
		$query = $this->db->get()->result();
		return $query;
	}

	public function getWhere($table,$field,$where)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($field, $where);
		$query = $this->db->get()->result_array();
		return $query;
	}

	public function getWhereRow($table,$field,$where)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($field, $where);
		$query = $this->db->get()->row_array();
		return $query;
	}

	public function getWhereNot($table,$field,$where)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($field . ' != "' . $where . '"');
		$query = $this->db->get()->result();
		return $query;
	}

	public function getCountWhere($table,$field = null,$where = null)
	{
		
		if($where){
			$this->db->where($field, $where);
		}
		return $this->db->get($table)->num_rows();
	}

	public function deleteData($table, $field, $where)
	{
		$this->db->where($field, $where);
		$this->db->delete($table);
	}

	public function getKec(){
		$query = $this->db->query('SELECT DISTINCT kd_kecamatan, kecamatan from wilayah WHERE jenis = "kecamatan"')->result();
		return $query;

	}

	public function getKel(){
		$id = $this->input->post('id');
		$query = $this->db->query('SELECT DISTINCT kd_kelurahan, kelurahan from wilayah WHERE jenis = "kelurahan" AND  kd_kecamatan = "' . $id . '"')->result();
		return $query;

	}

}