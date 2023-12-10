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
		$this->db->join('contact', 'contact.id_contact = user.id_contact');
		$this->db->where('user.id_user', $id);

		return $this->db->get()->row_array();
	}

}