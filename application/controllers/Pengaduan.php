<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaduan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('view_helper');
		$this->load->model('M_Pengaduan');
		$this->load->model('M_status');
	}

	public function index(){
		$data['data'] = $this->M_Pengaduan->get();
		$data['content'] = $this->load->view('admin/pengaduan', $data, true);
		$this->load->view('layouts-admin/index', $data);

	}

	public function detail_pengaduan($id){
		if (!is_numeric($id)) return $this->output->set_status_header(400);
		
		$data['data'] = $this->M_Pengaduan->get_one($id);
		$data['list_status'] = $this->M_status->get();

		$data['content'] = $this->load->view('admin/detail_pengaduan', $data, true);
		$this->load->view('layouts-admin/index', $data);
	}

}