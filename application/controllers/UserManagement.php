	<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserManagement extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_User');
		$this->load->model('M_Ref');
	}

	public function index(){
		$data['data'] = $this->M_User->getListUser();

		$data['content'] = $this->load->view('pages/user_management/index', $data, true);
		$this->load->view('layouts-admin/index', $data);
	}

	public function tambah(){
		
		$data['role'] = $this->M_Ref->getAllResult('role');
		$data['content'] = $this->load->view('pages/user_management/tambah', $data, true);

		return $this->load->view('layouts-admin/index', $data);

	}
}