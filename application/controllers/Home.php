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
		$data['jumlah_pengaduan_all'] = $this->M_Ref->getCountWhere('pengaduan',null,null);
		$data['jumlah_pengaduan_selesai'] = $this->M_Ref->getCountWhere('pengaduan','status',3);
		$data['jumlah_pengaduan_proses'] = $this->M_Ref->getCountWhere('pengaduan','status',2);
		$data['kategori_favorit'] = $this->M_Publik->get_kategori_pengaduan_favorit();
		$data['content'] = $this->load->view('publik/index', $data, true);
		$this->load->view('layouts/index', $data);
	}

	public function pengaduan(){

		$ktg = $this->input->get('ktg');
		$data['kategori_filter'] = [];
		$implode_ktg = null;

		if($ktg){
			$ktg = base64_decode($ktg);
			$ktg = json_decode($ktg, true);
			$data['kategori_filter'] = $ktg;
			$implode_ktg = '('.implode(',', $ktg).')';
		}

		$status = $this->input->get('status');
		$data['status_filter'] = [];
		$implode_status = null;

		if($status){
			$status = base64_decode($status);
			$status = json_decode($status, true);
			$data['status_filter'] = $status;
			$implode_status = '('.implode(',', $status).')';
		}	

		
		$data['pengaduan'] = $this->M_Publik->get_pengaduan(null,$implode_ktg,$implode_status);
		$data['kategori'] = $this->M_Publik->get_kategori_pengaduan();
		$data['status'] = $this->M_Publik->get_status_pengaduan();
		$data['content'] = $this->load->view('publik/pengaduan', $data, true);
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

	public function kontak(){
		$data['content'] = $this->load->view('publik/kontak', null, true);
		$this->load->view('layouts/index', $data);
	}
}
