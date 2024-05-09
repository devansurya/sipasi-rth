<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Firebase\JWT\JWT;
use Firebase\JWT\Key;


class MY_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->response = (object) [
			'code'=> 200,
		];
	}

	public function index()
	{
		// $this->sendResponse();
	}

	public function sendResponse(){
		$this->output
			->set_status_header($this->response->code)
			->set_content_type('application/json')
			->set_output(json_encode($this->response));
	}

	public function securityCheck()
	{
		$this->response->code = 401;
	}

}

/* End of file baseApiController.php */
/* Location: ./application/controllers/baseApiController.php */