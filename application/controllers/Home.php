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
		$this->load->model('M_RTH');

	}

	public function index(){
		$data['rth'] = $this->M_RTH->get();
		$data['count_rth'] = $this->M_RTH->count_rth();
		$data['count_pengaduan'] = $this->M_RTH->count_pengaduan();
		$data['count_reservasi'] = $this->M_RTH->count_reservasi();

		// $data['jumlah_pengaduan_all'] = $this->M_Ref->getCountWhere('pengaduan',null,null);
		// $data['jumlah_pengaduan_selesai'] = $this->M_Ref->getCountWhere('pengaduan','status',3);
		// $data['jumlah_pengaduan_proses'] = $this->M_Ref->getCountWhere('pengaduan','status',2);
		// $data['kategori_favorit'] = $this->M_Publik->get_kategori_pengaduan_favorit();
		$data['content'] = $this->load->view('publik/index', $data, true);
		$this->load->view('layouts/index', $data);
	}

	public function rth(){

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

		
		$data['rth'] = $this->M_Publik->get_rth(null,$implode_ktg,$implode_status);
		$data['kategori'] = [];
		$data['status'] = [];
		$data['content'] = $this->load->view('publik/rth', $data, true);
		$this->load->view('layouts/index', $data);
	}

	public function detail_rth($id = null){
		$data['rth'] = $this->M_Publik->get_rth_where($id);
		// $data['komentar'] = $this->M_Publik->get_komentar($id);
		$data['content'] = $this->load->view('publik/detail_rth', $data, true);
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

	public function hapus_komentar($id,$id_pengaduan_callback = null){

		$this->db->where('id_komentar', $id);
		$delete = $this->db->delete('komentar');

		return redirect('Home/detail_pengaduan/'.$id_pengaduan_callback);
	}

	public function buat_reservasi($id){

		$data['rth'] = $this->M_Publik->get_rth_where($id);
		$data['fasilitas'] = $this->M_Ref->getWhere('fasilitas_reservasi','id_rth',$id);
		// $data['komentar'] = $this->M_Publik->get_komentar($id);
		$data['content'] = $this->load->view('publik/buat_reservasi', $data, true);
		$this->load->view('layouts/index', $data);
	}

	public function buat_pengaduan($id){

		$data['rth'] = $this->M_Publik->get_rth_where($id);
		$data['visibilitas'] = $this->M_Ref->getAllResult('visibilitas');
		$data['kategori'] = $this->M_Ref->getAllResult('jenis_pengaduan');
		// $data['komentar'] = $this->M_Publik->get_komentar($id);
		$data['content'] = $this->load->view('publik/buat_pengaduan', $data, true);
		$this->load->view('layouts/index', $data);
	}

	public function add_pengaduan(){

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
			$gambar = null;
		}

		$data = array(
			'nama_pengadu' => $this->input->post('nama'),
			'email_pengadu' => $this->input->post('email'),
			'id_jenispengaduan' => $this->input->post('jenis'),
			'id_rth' => $this->input->post('id_rth'),
			'id_user' => $this->session->userdata('id'),
			'id_status_pengaduan' => 1,
			'subjek' => $this->input->post('subjek'),
			'deskripsi_pengaduan' => $this->input->post('deskripsi'),
			'foto' => $gambar,
			'lokasi' => $this->input->post('lokasi'),
			'visibilitas' => $this->input->post('visibilitas'),

		);
		$insert = $this->M_Ref->insertTable('pengaduan', $data);

		if($insert){
			$this->setflashdata('pengaduan_message', 'Berhasil Tambah Pengaduan');
			redirect('Home/buat_pengaduan/' . $this->input->post('id_rth'));
		}
		else{
			$this->setflashdata('pengaduan_message', 'Gagal Tambah Pengaduan', 'error');
			redirect('Home/buat_pengaduan' . $this->input->post('id_rth'));
		}
	}

	public function kontak(){

		$data['content'] = $this->load->view('publik/kontak', false, true);
		$this->load->view('layouts/index', $data);
	}

	public function hubungi_kami(){

		$nama = $this->input->post('nama');
		$id_user = $this->session->userdata('id');
		$email = $this->input->post('email');
		$isi = $this->input->post('isi');

		$data = array(

			'id_user' => $id_user,
			'nama' => $nama,
			'email' => $email,
			'isi' => $isi
		);

		$insert = $this->M_Ref->insertTable('kotak_masuk', $data);

		return redirect('Home/kontak');
	}

	public function get_fasilitas_detail(){
		$id = $this->input->post('id_fasilitas');
		$data = $this->M_Ref->getWhereRow('fasilitas_reservasi','id_fasilitas_reservasi',$id);

		echo json_encode($data);
	}

	public function setflashdata($flashId='message', $message='', $type='success')
    {
        $this->session->set_flashdata($flashId, "
            <div class=\"alert alert-{$type} dark alert-dismissible fade show\" role=\"alert\">
                {$message}
                <button class=\"btn-close\" type=\"button\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
            </div>");
    }
}
