<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_User extends CI_Model {

	public function verifyemail($key)  
	{  
		$data = array('status' => 1);  
		$this->db->where('md5(email)', $key);  
		return $this->db->update('contact', $data);  
	}

	public function getProfile($id)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->join('user_profile', 'user_profile.id_user = user.id_user');
		$this->db->where('user.id_user', $id);

		return $this->db->get()->row_array();
	}

	public function getListUser()
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->join('user_profile', 'user_profile.id_user = user.id_user');
		$this->db->join('user_role', 'user_role.id_user = user.id_user');
		$this->db->join('role', 'role.id_role = user_role.id_role');

		return $this->db->get()->result_array();
	}

}