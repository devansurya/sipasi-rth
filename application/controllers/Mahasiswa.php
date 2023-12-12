<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('view_helper');
        cek_login();
	}

	public function index(){
		$data['content'] = $this->load->view('pages/dashboard/index', false, true);
		$this->load->view('layouts-admin/index', $data);
	}

	
}