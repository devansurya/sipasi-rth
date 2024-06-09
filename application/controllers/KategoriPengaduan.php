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

        $data['jenis'] = $this->M_Ref->getAllResult('jenis_pengaduan');

		$data['content'] = $this->load->view('pages/kategori_pengaduan/index', $data, true);
		$this->load->view('layouts-admin/index', $data);
	}

    public function tambah()
    {
        $data = array(
			'jenis_pengaduan' => $this->input->post('jenis'),
			'deskripsi' => $this->input->post('kategori'),
		);
		$insert = $this->M_Ref->insertTable('jenis_pengaduan', $data);

		if($insert){
            $this->session->set_flashdata('kategori_pengaduan_message', '<div class="alert alert-light-success" role="alert"> Jenis Pengaduan berhasil ditambahkan.</div>');  
			redirect('KategoriPengaduan');
		}
    }

    public function delete($id)
    {
        $this->M_Ref->deleteData('jenis_pengaduan', 'id_jenispengaduan',$id);
        
        $this->session->set_flashdata('kategori_pengaduan_message', '<div class="alert alert-light-danger" role="alert"> Jenis Pengaduan berhasil dihapus.</div>');  
		redirect('KategoriPengaduan');
    }

    public function edit_kategori($id)
    {
        $data['kategori'] = $this->M_Ref->getWhereRow('jenis_pengaduan', 'id_jenispengaduan', $id);

		$data['content'] = $this->load->view('pages/kategori_pengaduan/edit', $data, true);
		$this->load->view('layouts-admin/index', $data);
    }

    public function update()
    {
        $data =  array(
			'jenis_pengaduan' => $this->input->post('jenis'),
			'deskripsi' => $this->input->post('deskripsi')
		);
		$this->db->where('id_jenispengaduan', $this->input->post('id_jenispengaduan'));
        $this->db->update('jenis_pengaduan', $data);
        
        $this->session->set_flashdata('kategori_pengaduan_message', '<div class="alert alert-light-primary" role="alert"> Jenis Pengaduan berhasil diupdate.</div>');  
		redirect('KategoriPengaduan');
    }
    
    
}

?>