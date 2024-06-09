	<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserManagement extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_User');
		$this->load->model('M_Ref');
	}

	public function index(){
		$data['data'] = $this->M_User->getListUser();

		$data['content'] = $this->load->view('pages/user_management/index', $data, true);
		$this->load->view('layouts-admin/index', $data);
	}

	public function tambah(){
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');  
        // $this->form_validation->set_rules('nim', 'NIM', 'required|is_unique[user.username]');
        $this->form_validation->set_rules('no_telp', 'No Telepon', 'required');  
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]');  
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[15]');  
        if ($this->form_validation->run() == false) {
            $data['role'] = $this->M_Ref->getAllResult('role');
			$data['content'] = $this->load->view('pages/user_management/tambah', $data, true);

			return $this->load->view('layouts-admin/index', $data);
        } else {
            $this->_addUser();
        }

	}

	private function _addUser()
    {
        $id_role = $this->input->post('role');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $telp = $this->input->post('telp');
        $alamat = $this->input->post('alamat');

        $password = $this->input->post('password');  
        $passhash = hash('md5', $password); 

        $data2 = array( 
            'email' => $email,  
            'password' => $passhash,
            'is_active' => $status  
        );  

        $this->M_Ref->insertTable('user', $data2);
        $id_user = $this->db->insert_id();

        $data1 = array(
            'nama' => $nama,
            'alamat' => $alamat,
            'no_telp' => $telp,
            'id_user' => $id_user,
        );

        $this->M_Ref->insertTable('user_profile', $data1); 

        $data3 = array( 
            'id_role' => $id_role,  
            'id_user' => $id_user 
        );  

        $this->M_Ref->insertTable('user_role', $data3);
		
		$this->session->set_flashdata('user_management_message', '<div class="alert alert-light-success" role="alert"> Akun berhasil ditambahkan.</div>'); 
        redirect('UserManagement');  
    }

	public function detail_user($id)
	{
        $dataq['profile'] = $this->M_User->getProfile($id);

		$data['content'] = $this->load->view('pages/user_management/detail-user', $dataq, true);
		$this->load->view('layouts-admin/index', $data);
	}

    public function aktivasiAkun()
    {
        $status = $this->input->post('status');

        $data = array(
            'status' => $status,
        );

        $this->db->where('id_contact', $this->input->post('id_contact'));
        $this->db->update('contact', $data);

        $this->session->set_flashdata('user_management_message', '<div class="alert alert-light-success" role="alert"> Akun berhasil diUpdate.</div>'); 
        redirect('UserManagement'); 
    }

    public function delete($id_user, $id_contact)
    {
        $this->M_Ref->deleteData('contact', 'id_contact',$id_contact);
        $this->M_Ref->deleteData('user', 'id_user',$id_user);
        
        $this->session->set_flashdata('user_management_message', '<div class="alert alert-light-danger" role="alert"> Data berhasil dihapus.</div>');  
		redirect('UserManagement');
    }
}