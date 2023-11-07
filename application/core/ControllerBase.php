<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerBase extends CI_Controller {

    public function __construct() {
       parent::__construct();
       $this->opsi = $this->config->item('opsi');
       $this->jumlah_opsi = $this->config->item('jml_opsi');
    }

    // layouting tamplates 
	public function layout($title = '')
    {
        // For Menu Akses
        $data_login = $this->session->userdata();
        $data = array(
          'admin_id' => $data_login['admin_id'],
          'admin_user' => $data_login['admin_user'],
          'admin_level' => $data_login['admin_level'],
          'admin_konid' => $data_login['admin_konid'],
          'admin_nama' => $data_login['admin_nama'],
          'admin_valid' => $data_login['admin_valid'],
          'kelas' => $data_login['kelas'],
          'admin_nocard' => $data_login['admin_nocard'],
        ); 
        if ($data_login['admin_level'] == "guru") {
            $cek_walas = $this->db->get_where('m_wali_kelas', ['id_guru' => $data_login['admin_konid']])->num_rows();
            $data['admin_walas'] = $cek_walas;
        }

        $page = array(
            "head" => $this->load->view('layouts/head', array("title" => $title), true),
            "header" => $this->load->view('layouts/header', $data, true),
            "sidebar" => $this->load->view('layouts/sidebar', false, true),
            "footer" => $this->load->view('layouts/footer', false, true),
            "main_js" => $this->load->view('layouts/main_js', false, true),
        );
        return $page;
        // print_r($data);
    }

    public function layout_ujian($title = '')
    {
        // For Menu Akses
        $data = [
            "mode" => "ujian"
        ];

        $page = array(
            "head" => $this->load->view('layouts/head', array("title" => $title), true),
            "header" => $this->load->view('layouts/header', $data, true),
            "footer" => $this->load->view('layouts/footer', false, true),
            "main_js" => $this->load->view('layouts/main_js', $data, true),
        );
        return $page;
        // print_r($data);
    }

    public function message_form_validation()
    {
        $this->form_validation->set_message('required', '%s tidak boleh kosong.');
        $this->form_validation->set_message('min_length', '%s minimal 8 karakter.');
        $this->form_validation->set_message('max_length', '%s maximal 50 karakter.');
        $this->form_validation->set_message('xss_clean', '%s tidak valid.');
        $this->form_validation->set_error_delimiters("", "<br/>");
    }

}

/* End of file ControllerBase.php */
/* Location: ./application/controllers/ControllerBase.php */