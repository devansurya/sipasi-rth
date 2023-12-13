	<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Administrator extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Dokumentasi');
		$this->load->model('M_Guru');
		$this->load->helper('view_helper');
        cek_login();
	}

	public function index(){
		$data['content'] = $this->load->view('pages/dashboard/index', false, true);
		$this->load->view('layouts-admin/index', $data);
	}

	public function kotak_saran(){
		$data['content'] = $this->load->view('pages/kotak_saran/index', false, true);
		$this->load->view('layouts-admin/index', $data);
	}

	public function user_management(){
		$data['content'] = $this->load->view('pages/user_management/index', false, true);
		$this->load->view('layouts-admin/index', $data);
	}
}