<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Dokumentasi');
		$this->load->model('M_Guru');
	}

	public function index(){
		$data['dokumentasi'] = $this->M_Dokumentasi->getdata();
		$data['guru'] = $this->M_Guru->getdata();
		$data['content'] = $this->load->view('index', $data, true);
		$this->load->view('layouts/index', $data);
	}

	public function visimisi(){
		$data['content'] = $this->load->view('visimisi', null, true);
		$this->load->view('layouts/index', $data);
	}

	public function sejarah(){
		$data['content'] = $this->load->view('sejarah', null, true);
		$this->load->view('layouts/index', $data);
	}

	public function struktur(){
		$data['content'] = $this->load->view('struktur', null, true);
		$this->load->view('layouts/index', $data);
	}

	public function guru(){
		$data['guru'] = $this->M_Guru->getdata();
		$data['content'] = $this->load->view('guru', $data, true);
		$this->load->view('layouts/index', $data);
	}

	public function detail_dokumentasi(){
		$id = $this->input->get('id');
		$data['dokumentasi'] = $this->M_Dokumentasi->getdatawhere($id);
		$data['content'] = $this->load->view('detail-dokumentasi', $data, true);
		$this->load->view('layouts/index', $data);
	}
}
