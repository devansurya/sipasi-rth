<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registrasi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_User');
		$this->load->model('M_Ref');

	}

	public function index()
    {
        //$this->load->view('auth/register');
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');  
        // $this->form_validation->set_rules('nim', 'NIM', 'required|is_unique[user.username]');
        $this->form_validation->set_rules('telp', 'No Telepon', 'required');  
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[contact.email]');  
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[15]');  
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/register');
        } else {
            $this->_registrasi();
        }
	}

	private function _registrasi()
    {
       
        $id_role = 2;
        $status = 0;
        $nim = $this->input->post('nim');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $telp = $this->input->post('telp');

        $data1 = array(
            'nim' => $nim,
            'nama' => $nama,
            'email' => $email,
            'telp' => $telp,
            'status' => $status
        );

        // Insert data1 to 'contact' table
        $this->M_Ref->insertTable('contact', $data1);

        // Get the inserted contact ID
        $id_contact = $this->db->insert_id();

        $password = $this->input->post('password');  
        $passhash = hash('md5', $password);  
        $saltid = md5($email);

        $data2 = array( 
            'username' => $nim,  
            'password' => $passhash,
            'id_role' => $id_role,
            'id_contact' => $id_contact  
        );  

        $this->M_Ref->insertTable('user', $data2);

        $this->session->set_flashdata('message', '<div class="alert alert-success text-center">Akun berhasil dibuat. Tunggu di Aktivasi oleh Admin</div>');  
        redirect('Registrasi');

        // Insert data2 to 'user' table
        // if ($this->M_Ref->insertTable('user', $data2))  
        // {  
        //     if ($this->sendemail($email, $saltid))  
        //     {  
        //         // successfully sent mail to user email  
        //         $this->session->set_flashdata('message', '<div class="alert alert-success text-center">Please confirm the mail sent to your email id to complete the registration.</div>');  
        //         redirect('Registrasi');  
        //     }  
        //     else  
        //     {  
        //         $this->session->set_flashdata('message', '<div class="alert alert-danger text-center">Please try again ...</div>');  
        //         redirect('Registrasi');  
        //     }  
        // }  
        // else  
        // {  
        //     $this->session->set_flashdata('message', '<div class="alert alert-danger text-center">Something Wrong. Please try again ...</div>');  
        //     redirect('Registrasi');  
        // }  
    }


    public function sendemail($email, $saltid)
    {
        // Configure the email setting
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.gmail.com'; // SMTP host name
        $config['smtp_port'] = '465'; // SMTP port number
        $config['smtp_user'] = 'ganggakong@gmail.com';
        $config['smtp_pass'] = '********'; // $from_email password
        $config['mailtype'] = 'html';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;
        $config['newline'] = "\r\n"; // Use double quotes

        $this->email->initialize($config);

        $url = base_url() . "user/confirmation/" . $saltid;

        $this->email->from('ganggakong@gmail.com', 'CodesQuery');
        $this->email->to($email);
        $this->email->subject('Please Verify Your Email Address');

        $message = "<html><head><head></head><body><p>Hi,</p><p>Thanks for registration with CodesQuery.</p><p>Please click below link to verify your email.</p>" . $url . "<br/><p>Sincerely,</p><p>CodesQuery Team</p></body></html>";

        $this->email->message($message);

        return $this->email->send();
    }

    public function confirmation($key)
    {
        if ($this->M_User->verifyemail($key)) {
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Your Email Address is successfully verified!</div>');
            redirect(base_url());
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Your Email Address Verification Failed. Please try again later...</div>');
            redirect(base_url());
        }
    }
}