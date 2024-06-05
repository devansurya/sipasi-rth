<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Test extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('view_helper');
	}
	public function index(){

		// $data['data'] = null;
		$data['data'] = $this->M_RTH->get();
		$data['content'] = $this->load->view('test/output-reservasi', $data, true);
		$this->load->view('layouts-admin/index', $data);
	}

	public function tambah(){
		
		
		$data['content'] = $this->load->view('pages/rth/tambah', false, true);

		return $this->load->view('layouts-admin/index', $data);

	}

}