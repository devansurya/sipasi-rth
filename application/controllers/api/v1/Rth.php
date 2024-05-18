<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Rth extends \MY_Controller {
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->verify();
		$this->handleRequest($this);
	}

	//get list
	//if has id parameter then get one
	protected function get()
	{
		try {
			$id = $this->input->get('id') ?? null;

			$this->db->select('r.*');
			$this->db->from('rth r');

			$this->db->order_by('r.create_date', 'desc');

			if (!empty($id)) {
				$this->db->where('r.id_rth', $id);
			}
			else {
				$this->response->count = $this->db->count_all_results('', false);
				
			}

			$this->db->limit(20);
			$data = $this->db->get()->result_array();

			if (empty($data) && !empty($id)) {
				throw new Exception("Data with Id : {$id} Not Found", 404);
			}

			$this->response->data = $data;
			$this->response->message = 'Success';

		} catch (Exception $e) {
			$this->response->code = $e->getCode();
			$this->response->error = "{$e->getMessage()}";
		}
	}

	//insert data
	protected function post()
	{
		try {

	 		$this->form_validation->set_rules('nama_rth', 'nama_rth', 'trim|required');
	 		$this->form_validation->set_rules('deskripsi_rth', 'deskripsi_rth', 'trim|required');
	 		$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	 		$this->form_validation->set_rules('kelurahan', 'kelurahan', 'trim|required');
	 		$this->form_validation->set_rules('kecamatan', 'kecamatan', 'trim|required');

	 		if (!$this->form_validation->run()) {
	 			throw new Exception(strip_tags(validation_errors()), 403);
	 		}

	 		$data = [
	 			'nama_rth' => $this->input->post('nama_rth',true),
		 		'deskripsi_rth' => $this->input->post('deskripsi_rth',true),
		 		'kelurahan' => $this->input->post('kelurahan',true),
		 		'kecamatan' => $this->input->post('kecamatan',true),
		 		'alamat' => $this->input->post('alamat',true),
		 		'foto_rth' => $this->input->post('foto_rth',true) ?? '',
		 		'status_reservasi' => $this->input->post('status_reservasi',true) ?? 0,
	 		];

	 		$this->db->insert('rth', $data);

	 		$this->response->message = "Success";
	 		$this->response->data['id'] = $this->db->insert_id();

		} catch (Exception $e) {
			$this->response->code = $e->getCode();
			$this->response->error = "{$e->getMessage()}";
		}
	}

	//edit data
	protected function patch()
	{
		
	}
	//delete data
	protected function delete()
	{
		
	}
}