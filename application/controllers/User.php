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
}