<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerBase extends CI_Controller {

    public function __construct() {
     parent::__construct();

     if($this->session->userdata('id')){
         $profile = $this->db->select('*')->from('user u')
         ->join('user_profile up', 'up.id_user = u.id_user', 'inner');
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