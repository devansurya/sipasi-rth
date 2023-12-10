<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();
		$this->load->model('M_User');
	}

    public function Profile($id)
	{
        $dataq['profile'] = $this->M_User->getProfile($id);

		$data['content'] = $this->load->view('profile', $dataq, true);
		$this->load->view('layouts-admin/index', $data);
	}

	public function updateProfile()
	{
		$update = array(
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'email' => $this->input->post('email'),
            'telp' => $this->input->post('telp')
        );

		$this->db->where('id_contact', $this->input->post('id_contact'));
        $this->db->update('contact', $update);
		redirect('User/Profile/'. $this->input->post('id_user'));
	}

	public function editProfile($id)
	{
        $dataq['profile'] = $this->M_User->getProfile($id);

		$data['content'] = $this->load->view('edit-profile', $dataq, true);
		$this->load->view('layouts-admin/index', $data);
	}

	public function ubahProfile()
 	{
		$id_user = $this->input->post('id_user');
		$id_contact = $this->input->post('id_contact');
		$nim = $this->input->post('nim');

		$dataq['profile'] = $this->M_User->getProfile($id_user);
		
 		$upload_image = $_FILES['image']['name'];

		if ($upload_image) {
			$config['upload_path'] = './upload-profile/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			// $config['max_size'] = '7000';
			// $config['max_width'] = '1024';
			// $config['max_height'] = '1000';
			$config['file_name'] = 'pro' . time();
			$this->load->library('upload', $config);

			if ($this->upload->do_upload('image')) {
				$gambar_lama = $dataq['profile']['image'];
				if ($gambar_lama != 'user.png') {
					unlink(FCPATH . 'upload-profile/' . $gambar_lama);
				}

				$gambar_baru = $this->upload->data('file_name');
				$this->db->set('image', $gambar_baru);
			} else {

			}
		}
		
		$this->db->where('id_contact', $id_contact);
		$this->db->update('contact');

		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Profil Berhasil diubah </div>');
		redirect('User/editProfile/'. $id_user);
 		
 	}
}