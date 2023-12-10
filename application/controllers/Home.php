<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Dokumentasi');
		$this->load->model('M_Publik');
		$this->load->model('M_Ref');

	}

	public function index(){
		$data['pengaduan'] = $this->M_Publik->get_pengaduan(15);
		// $data['guru'] = $this->M_Guru->getdata();
		$data['content'] = $this->load->view('publik/index', $data, true);
		$this->load->view('layouts/index', $data);
	}

	public function detail_pengaduan($id){

		$data['pengaduan'] = $this->M_Publik->get_pengaduan_where($id);
		$data['komentar'] = $this->M_Publik->get_komentar($id);
		$data['content'] = $this->load->view('publik/detail_pengaduan', $data, true);
		$this->load->view('layouts/index', $data);
	}

	public function komentar_pengaduan(){

		$id_pengaduan = $this->input->post('id_pengaduan');
		$id_user = $this->session->userdata('id');
		$komentar = $this->input->post('komentar');

		$data = array(

			'id_pengaduan' => $id_pengaduan,
			'id_user' => $id_user,
			'komentar' => $komentar

		);

		$insert = $this->M_Ref->insertTable('komentar', $data);

		return redirect('Home/detail_pengaduan/'.$id_pengaduan);
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
