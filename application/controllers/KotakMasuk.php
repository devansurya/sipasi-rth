<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KotakMasuk extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Ref');
	}

	public function index(){
		$data['data'] = $this->M_Ref->getAll('kotak_masuk');
		$data['content'] = $this->load->view('pages/kotak_masuk/index', $data, true);
		$this->load->view('layouts-admin/index', $data);
	}

	public function delete($id=null)
	{
		if (!$id) redirect('KotakMasuk');
		$this->db->where('id_kotak_masuk', $id);
		$delete = $this->db->delete('kotak_masuk');
		if ($delete) {
			$this->setflashdata('kotak_masuk_message', 'Berhasil Hapus Kotak Masuk');
			redirect('KotakMasuk'); 
		}
		else return $this->output->set_status_header(401)->set_output('Unauthorized');
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