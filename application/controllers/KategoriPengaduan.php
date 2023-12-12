<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KategoriPengaduan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('view_helper');
		$this->load->model('M_Ref');
	}

	public function index(){

        $data['kategori'] = $this->M_Ref->getAllResult('kategori_pengaduan');

		$data['content'] = $this->load->view('pages/kategori_pengaduan/index', $data, true);
		$this->load->view('layouts-admin/index', $data);
	}

    public function tambah()
    {
        $data = array(
			'kategori' => $this->input->post('kategori')
		);
		$insert = $this->M_Ref->insertTable('kategori_pengaduan', $data);

		if($insert){
            $this->session->set_flashdata('message', '<div class="alert alert-light-success" role="alert"> Kategori berhasil ditambahkan.</div>');  
			redirect('KategoriPengaduan');
		}
    }
    
}

?>