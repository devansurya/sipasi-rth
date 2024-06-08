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

	public function testing(){
		$this->load->library('unit_test');
		$test = 1 + 1;

		$expected_result = 2;

		$test_name = 'Adds one plus one';

		$this->unit->run($test, $expected_result, $test_name);

		$str = '
		<table border="0" cellpadding="4" cellspacing="1">
		{rows}
		<tr>
		<td>{item}</td>
		<td>{result}</td>
		</tr>
		{/rows}
		</table>';

		$this->unit->set_template($str);

		echo $this->unit->report();
	}

	public function index(){

		$data['data'] = $this->M_Pengaduan->get();
		$data['content'] = $this->load->view('pages/pengaduan/index', $data, true);
		$this->load->view('layouts-admin/index', $data);
	}

	public function detail_pengaduan($id = null){
		if (!is_numeric($id)) return $this->output->set_status_header(400);

		if($this->input->get('notif')){
			$dataUpdate =  array(
				'status_baca' => 1
			);
			$this->db->where('id_notifikasi', $this->input->get('notif'));
			$updateNotif = $this->db->update('notifikasi', $dataUpdate);
		}
		
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

	public function ubah_pengaduan($id=null){
		if (!$id) return $this->output->set_status_header(404);
		$data['data'] =  $this->M_Pengaduan->get_one($id);
		$data['content'] = $this->load->view('pages/pengaduan/edit', $data, true);

		return $this->load->view('layouts-admin/index', $data);
	}

	public function edit($id){
		if (!$id) return false;
		$config['upload_path'] = './assets/img/upload/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		// $config['max_size'] = '3000';
		// $config['max_width'] = '1024';
		// $config['max_height'] = '1000';
		$config['file_name'] = 'img' . time();
		$this->load->library('upload', $config);

		if ($this->upload->do_upload('lampiran')) {
			$image = $this->upload->data();
			unlink('assets/img/upload/' . $this->input->post('old_pict', TRUE));
			$gambar = $image['file_name'];

		} else {
			$gambar = $this->input->post('old_pict');
		}


		$data = array(
			'id_kategori' => $this->input->post('kategori'),
			'subjek' => $this->input->post('subjek'),
			'deskripsi' => $this->input->post('deskripsi'),
			'foto' => $gambar,
			'lokasi' => $this->input->post('lokasi'),
			'visibilitas' => $this->input->post('visibilitas'),
		);
		
		if($this->M_Pengaduan->update($id, $data)){
			$this->setflashdata('pengaduan_message', 'Berhasil Edit Pengaduan');
			redirect('Pengaduan');
		}
		else{
			$this->setflashdata('pengaduan_message', 'Gagal Edit Pengaduan', 'error');
			redirect('Pengaduan');
		}
	}

	public function delete($id=null)
	{
		if (!$id) redirect('Pengaduan');
		if ($this->M_Pengaduan->delete($id)) {
			$this->setflashdata('pengaduan_message', 'Berhasil Hapus Pengaduan');
			redirect('Pengaduan'); 
		}
		else return $this->output->set_status_header(401)->set_output('Unauthorized');
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
			$gambar = null;
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
			$this->setflashdata('pengaduan_message', 'Berhasil Tambah Pengaduan');
			redirect('Pengaduan');
		}
		else{
			$this->setflashdata('pengaduan_message', 'Gagal Tambah Pengaduan', 'error');
			redirect('Pengaduan');
		}
	}

	public function ubah_status($id){

		$status = $this->input->post('status');
		$id_user = $this->input->post('id_user');

		$data =  array(
			'id_status_pengaduan' => $status
		);
		$this->db->where('id_pengaduan', $id);
		$update = $this->db->update('pengaduan', $data);
		
		$this->setflashdata('pengaduan_message', 'Berhasil Update Status Pengaduan');
		redirect('Pengaduan');
		// if($update){
		// 	if($status != '1'){
		// 		$pesan = null;
		// 		$color = 'primary';
		// 		if($status == 2){
		// 			$pesan = 'Pengaduan anda sedang dalam status penanganan';
		// 			$color = 'warning';
		// 		}elseif($status == 3){
		// 			$pesan = 'Pengaduan anda telah selesai';
		// 			$color = 'success';
		// 		}

		// 		$data = array(
		// 			'id_user' => $id_user,
		// 			'id_pengaduan' => $id,
		// 			'pesan' => $pesan,
		// 			'color' => $color

		// 		);
		// 		$insert = $this->M_Ref->insertTable('notifikasi', $data);

		// 	}
		// 	$this->setflashdata('pengaduan_message', 'Berhasil Update Status Pengaduan');
		// 	redirect('Pengaduan');
		// }
		// else{
		// 	$this->setflashdata('pengaduan_message', 'Gagal Update Status Pengaduan', 'error');
		// 	redirect('Pengaduan');
		// }
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