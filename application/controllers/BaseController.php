<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerBase extends CI_Controller {

    public function __construct() {
     parent::__construct();

     if($this->session->userdata('id')){
         $profile = $this->db->select('*')->from('user u')
         ->join('contact c', 'c.id_contact = u.id_contact', 'inner');
         where('u.id_user', $this->session->userdata('id'))->get()->row_array();

         $this->load->vars(array(
            'nama' => $this->session->userdata('nama')
        ));
     }else{
        $this->load->vars(array(
            'nama' => '-'
        ));
     }
 }


}

/* End of file ControllerBase.php */
/* Location: ./application/controllers/ControllerBase.php */