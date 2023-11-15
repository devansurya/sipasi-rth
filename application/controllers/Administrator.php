<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Administrator extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Dokumentasi');
		$this->load->model('M_Guru');
	}

	public function index(){
		$data['content'] = $this->load->view('admin/dashboard', false, true);
		$this->load->view('layouts-admin/index', $data);
	}

	public function kotak_saran(){
		$data['content'] = $this->load->view('admin/kotak_saran', false, true);
		$this->load->view('layouts-admin/index', $data);
	}

	public function user_management(){
		$data['content'] = $this->load->view('admin/user_management', false, true);
		$this->load->view('layouts-admin/index', $data);
	}

}