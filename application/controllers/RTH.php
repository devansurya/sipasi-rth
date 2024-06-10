<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RTH extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('view_helper');
		$this->load->model('M_Ref');
	}
	public function index(){

		// $data['data'] = null;
		$data['data'] = $this->M_RTH->get();
		$data['content'] = $this->load->view('pages/rth/index', $data, true);
		$this->load->view('layouts-admin/index', $data);
	}

	public function tambah(){
		
		
		$data['content'] = $this->load->view('pages/rth/tambah', false, true);

		return $this->load->view('layouts-admin/index', $data);

	}

	public function penempatan_petugas($id){
		if (!is_numeric($id)) return $this->output->set_status_header(400);

		
		$data['rth'] = $this->M_Ref->getWhereRow('rth','id_rth',$id);
		$data['petugas'] = $this->M_RTH->get_petugas();
		$penempatan_petugas = $this->M_Ref->getWhere('penempatan_petugas','id_rth',$id);

		$arr_penempatan = [];

		if(!empty($penempatan_petugas)){
			foreach ($penempatan_petugas as $pp) {
				array_push($arr_penempatan, $pp['id_user']);
			}
		}

		$data['penempatan'] = $arr_penempatan;

		$data['content'] = $this->load->view('pages/rth/penempatan_petugas', $data, true);
		$this->load->view('layouts-admin/index', $data);
	}

	public function pilih_penempatan(){
		
		if($this->input->post('status') == '1'){
			$data = array(
				'id_rth' => $this->input->post('id_rth'),
				'id_user' => $this->input->post('id_user'),

			);
			$aksi = $this->M_Ref->insertTable('penempatan_petugas', $data);

			if($aksi){
				$return = ['status' => true, 'message' => 'Berhasil menambah petugas'];

			}else{
				$return = ['status' => false, 'message' => 'Gagal menambah petugas'];
			}
		}else{
			$this->db->where("id_user = {$this->input->post('id_user')} and id_rth={$this->input->post('id_rth')}");
			$aksi = $this->db->delete('penempatan_petugas');

			if($aksi){
				$return = ['status' => true, 'message' => 'Berhasil hapus petugas'];

			}else{
				$return = ['status' => false, 'message' => 'Gagal menambah petugas'];
			}
		}


		

		echo json_encode($return);
	}

	public function edit_rth($id){
		
		$data['rth'] = $this->M_Ref->getWhereRow('rth','id_rth',$id);
		$data['fasilitas'] = $this->M_Ref->getWhere('fasilitas_reservasi','id_rth',$id);
		$data['content'] = $this->load->view('pages/rth/edit', $data, true);

		return $this->load->view('layouts-admin/index', $data);

	}

	public function add_fasilitas(){

		$config['upload_path'] = './assets/img/upload/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		// $config['max_size'] = '3000';
		// $config['max_width'] = '1024';
		// $config['max_height'] = '1000';
		$config['file_name'] = 'img' . time();
		$this->load->library('upload', $config);

		$this->upload->initialize($config);

		if ($this->upload->do_upload('foto')) {
			$image = $this->upload->data();
			$gambar = $image['file_name'];
		} else {
			$gambar = null;
		}

		if(!$this->input->post('id_fasilitas')){
			$data = array(
				'id_rth' => $this->input->post('id_rth'),
				'nama' => $this->input->post('nama'),
				'luas' => $this->input->post('luas'),
				'kapasitas' => $this->input->post('kapasitas'),
				'deskripsi' => $this->input->post('deskripsi'),
				'foto' => $gambar,

			);
			$insert = $this->M_Ref->insertTable('fasilitas_reservasi', $data);

			if($insert){
				$this->setflashdata('rth_message', 'Fasilitas berhasil ditambahkan');
			}else{
				$this->setflashdata('rth_message', 'Fasilitas gagal ditambahkan', 'danger');
			}
		}else{
			$data = array(
				'id_rth' => $this->input->post('id_rth'),
				'nama' => $this->input->post('nama'),
				'luas' => $this->input->post('luas'),
				'kapasitas' => $this->input->post('kapasitas'),
				'deskripsi' => $this->input->post('deskripsi')

			);

			if($gambar){
				$data['foto'] = $gambar;
			}


			$this->db->where('id_fasilitas_reservasi', $this->input->post('id_fasilitas'));
			$update = $this->db->update('fasilitas_reservasi', $data);

			if($update){
				$this->setflashdata('rth_message', 'Fasilitas berhasil diupdate');
			}else{
				$this->setflashdata('rth_message', 'Fasilitas gagal diupdate', 'danger');
			}

		}

		redirect('RTH/edit_rth/'. $this->input->post('id_rth'));
	}

	public function delete_fasilitas($id,$id_rth = null){

		$this->db->where('id_fasilitas_reservasi', $id);
		$delete = $this->db->delete('fasilitas_reservasi');

		if($delete){
			$this->setflashdata('rth_message', 'Fasilitas berhasil dihapus');
		}else{
			$this->setflashdata('rth_message', 'Fasilitas gagal dihapus', 'danger');
		}
		redirect('RTH/edit_rth/'. $id_rth);

	}

	public function get_row_fasilitas(){
		$data = $this->M_Ref->getWhereRow('fasilitas_reservasi','id_fasilitas_reservasi',$this->input->post('id'));
		echo json_encode($data);
	}

	public function tambah_rth(){

		$config['upload_path'] = './assets/img/upload/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		// $config['max_size'] = '3000';
		// $config['max_width'] = '1024';
		// $config['max_height'] = '1000';
		$config['file_name'] = 'img' . time();
		$this->load->library('upload', $config);

		$this->upload->initialize($config);

		if ($this->upload->do_upload('lampiran')) {
			$image = $this->upload->data();
			$gambar = $image['file_name'];
		} else {
			$gambar = null;
		}

		$data = array(
			'nama_rth' => $this->input->post('nama_rth'),
			'deskripsi_rth' => $this->input->post('deskripsi_rth'),
			'kecamatan' => $this->input->post('kecamatan'),
			'kelurahan' => $this->input->post('kelurahan'),
			'alamat' => $this->input->post('alamat'),
			'status_reservasi' => $this->input->post('status_reservasi') ? 1 : 0,


		);

		if($gambar){
			$data['foto_rth'] = $gambar;
		}


		$insert = $this->M_Ref->insertTable('rth', $data);

		if($insert){
			$this->setflashdata('rth_message', 'RTH berhasil dibuat');
		}else{
			$this->setflashdata('rth_message', 'RTH gagal dibuat', 'danger');
		}

		redirect('RTH');
	}

	public function update_rth(){

		$config['upload_path'] = './assets/img/upload/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		// $config['max_size'] = '3000';
		// $config['max_width'] = '1024';
		// $config['max_height'] = '1000';
		$config['file_name'] = 'img' . time();
		$this->load->library('upload', $config);

		$this->upload->initialize($config);

		if ($this->upload->do_upload('lampiran')) {
			$image = $this->upload->data();
			$gambar = $image['file_name'];
		} else {
			$gambar = null;
		}

		$data = array(
			'nama_rth' => $this->input->post('nama_rth'),
			'deskripsi_rth' => $this->input->post('deskripsi_rth'),
			'kecamatan' => $this->input->post('kecamatan'),
			'kelurahan' => $this->input->post('kelurahan'),
			'alamat' => $this->input->post('alamat'),
			'status_reservasi' => $this->input->post('status_reservasi') ? 1 : 0,


		);

		if($gambar){
			$data['foto_rth'] = $gambar;
		}


		$this->db->where('id_rth', $this->input->post('id_rth'));
		$update = $this->db->update('rth', $data);

		if($update){
			$this->setflashdata('rth_message', 'RTH berhasil diupdate');
		}else{
			$this->setflashdata('rth_message', 'RTH gagal diupdate', 'danger');
		}

		redirect('RTH');
	}

	public function delete_rth($id){

		$this->db->where('id_rth', $id);
		$delete = $this->db->delete('rth');

		if($delete){
			$this->setflashdata('rth_message', 'RTH berhasil dihapus');
		}else{
			$this->setflashdata('rth_message', 'RTH gagal dihapus', 'danger');
		}

		redirect('RTH');
	}

	public function get_kec(){

		$data = $this->M_Ref->getKec();

		echo json_encode($data);
	}

	public function get_kel(){

		$data = $this->M_Ref->getKel();

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