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

}