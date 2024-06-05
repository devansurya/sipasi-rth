<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Dokumentasi');
		$this->load->model('M_Guru');
	}

	public function index(){
        if($this->session->userdata('id_role') == 1){
            redirect('Dashboard');
        }elseif($this->session->userdata('id_role') == 2){
            redirect('Dashboard');
        }elseif($this->session->userdata('id_role') == 3){
            redirect('Dashboard');
        }

		$this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/login');
        } else {
            $this->_login();
        }
	}

	private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->select('user.id_user, user.email, user.password, user_role.id_role, user_profile.nama, role.role, user.is_active')
		->from('user')->join('user_profile', 'user.id_user = user_profile.id_user', 'left')
        ->join('user_role', 'user.id_user = user_role.id_user', 'left')
        ->join('role', 'user_role.id_role = role.id_role', 'left')
		->where('email', $email)->get()
		->row_array();
        if ($user) {
            if ($user['is_active'] == 1){
                if (md5($password) == $user['password']) {
                    $data = [
                        'id' => $user['id_user'],
                        'email' => $user['email'],
                        'id_role' => $user['id_role'],
                        'role' => $user['role'],
                        'nama' => $user['nama'],
                        'password' => $user['password'],
                    ];
                    $this->session->set_userdata($data);
                    if ($user['id_role'] == 1) {
                        redirect('Dashboard');
                    } elseif ($user['id_role'] == 2) {
                        redirect('Dashboard');
                    } elseif ($user['id_role'] == 3) {
                        redirect('Dashboard');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-secondary dark alert-dismissible fade show" role="alert">Password salah.<button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                    redirect('Auth');
                }
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-secondary dark alert-dismissible fade show" role="alert">Akun belum di Aktivasi oleh Admin.<button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                    redirect('Auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-secondary dark alert-dismissible fade show" role="alert">Username belum terdaftar.<button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            redirect('Auth');
        }
    }

	public function register(){
		$this->load->view('auth/register');
	}

    public function logout()
    {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('id_role');
        $this->session->unset_userdata('role');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('password');

        $this->session->set_flashdata('message', '<div class="alert alert-success dark alert-dismissible fade show" role="alert">Anda telah logout !!!<button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        redirect('Auth');
    }
}