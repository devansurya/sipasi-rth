<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_User extends CI_Model {

	public function verifyemail($key)  
	{  
		$data = array('status' => 1);  
		$this->db->where('md5(email)', $key);  
		return $this->db->update('contact', $data);  
	}

}