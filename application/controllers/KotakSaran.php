<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KotakSaran extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index(){
		$data['content'] = $this->load->view('pages/kotak_saran/index', false, true);
		$this->load->view('layouts-admin/index', $data);
	}
}