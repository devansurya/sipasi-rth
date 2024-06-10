<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KategoriReservasi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('view_helper');
		$this->load->model('M_Ref');
	}

	public function index(){

        $data['jenis'] = $this->M_Ref->getAllResult('jenis_reservasi');

		$data['content'] = $this->load->view('pages/kategori_reservasi/index', $data, true);
		$this->load->view('layouts-admin/index', $data);
	}

    public function tambah()
    {
        $data = array(
			'jenis_reservasi' => $this->input->post('jenis'),
		);
		$insert = $this->M_Ref->insertTable('jenis_reservasi', $data);

		if($insert){
            $this->session->set_flashdata('kategori_reservasi_message', '<div class="alert alert-light-success" role="alert"> Jenis Reservasi berhasil ditambahkan.</div>');  
			redirect('KategoriReservasi');
		}
    }

    public function delete($id)
    {
        $this->M_Ref->deleteData('jenis_reservasi', 'id_jenisreservasi',$id);
        
        $this->session->set_flashdata('kategori_reservasi_message', '<div class="alert alert-light-danger" role="alert"> Jenis Reservasi berhasil dihapus.</div>');  
		redirect('KategoriReservasi');
    }

    public function edit_kategori($id)
    {
        $data['kategori'] = $this->M_Ref->getWhereRow('jenis_reservasi', 'id_jenisreservasi', $id);

		$data['content'] = $this->load->view('pages/kategori_reservasi/edit', $data, true);
		$this->load->view('layouts-admin/index', $data);
    }

    public function update()
    {
        $data =  array(
			'jenis_reservasi' => $this->input->post('jenis'),
		);
		$this->db->where('id_jenisreservasi', $this->input->post('id_jenisreservasi'));
        $this->db->update('jenis_reservasi', $data);
        
        $this->session->set_flashdata('kategori_reservasi_message', '<div class="alert alert-light-primary" role="alert"> Jenis Reservasi berhasil diupdate.</div>');  
		redirect('KategoriReservasi');
    }
    
    
}

?>