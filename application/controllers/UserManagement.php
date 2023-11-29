	<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserManagement extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index(){
		$data['content'] = $this->load->view('pages/user_management/index', false, true);
		$this->load->view('layouts-admin/index', $data);
	}
}