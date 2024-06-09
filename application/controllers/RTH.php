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

}