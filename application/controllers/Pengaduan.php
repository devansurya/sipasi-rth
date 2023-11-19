<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaduan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Dokumentasi');
		$this->load->model('M_Guru');
	}

	public function index(){
		$data['content'] = $this->load->view('admin/pengaduan', false, true);
		$this->load->view('layouts-admin/index', $data);
	}

	public function detail_pengaduan(){
		$data['content'] = $this->load->view('admin/detail_pengaduan', false, true);
		$this->load->view('layouts-admin/index', $data);
	}

}