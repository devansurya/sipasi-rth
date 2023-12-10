<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaduan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('view_helper');
		$this->load->model('M_Pengaduan');
		$this->load->model('M_Status');
		$this->load->model('M_Ref');
	}

	public function index(){

		$data['data'] = $this->M_Pengaduan->get();
		$data['content'] = $this->load->view('pages/pengaduan/index', $data, true);
		$this->load->view('layouts-admin/index', $data);

	}

	public function detail_pengaduan($id){
		if (!is_numeric($id)) return $this->output->set_status_header(400);
		
		$data['data'] = $this->M_Pengaduan->get_one($id);
		$data['list_status'] = $this->M_Status->get();

		$data['content'] = $this->load->view('pages/pengaduan/detail', $data, true);
		$this->load->view('layouts-admin/index', $data);
	}

	public function tambah(){
		
		$data['visibilitas'] = $this->M_Ref->getAllResult('visibilitas');
		$data['kategori'] = $this->M_Ref->getAllResult('kategori_pengaduan');
		$data['content'] = $this->load->view('pages/pengaduan/tambah', $data, true);

		return $this->load->view('layouts-admin/index', $data);

	}

	public function add(){

		$config['upload_path'] = './assets/img/upload/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		// $config['max_size'] = '3000';
		// $config['max_width'] = '1024';
		// $config['max_height'] = '1000';
		$config['file_name'] = 'img' . time();
		$this->load->library('upload', $config);

		if ($this->upload->do_upload('lampiran')) {
			$image = $this->upload->data();
			$gambar = $image['file_name'];
		} else {
			$gambar = '';
		}

		$data = array(
			'id_kategori' => $this->input->post('kategori'),
			'subjek' => $this->input->post('subjek'),
			'deskripsi' => $this->input->post('deskripsi'),
			'foto' => $gambar,
			'lokasi' => $this->input->post('lokasi'),
			'status' => 1,
			'visibilitas' => $this->input->post('visibilitas'),
			'id_user' => $this->session->userdata('id'),

		);
		
		$insert = $this->M_Ref->insertTable('pengaduan', $data);

		if($insert){
			redirect('Pengaduan');
		}
	}

}