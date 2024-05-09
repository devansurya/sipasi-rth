<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// require
use Firebase\JWT\JWT;
use Firebase\JWT\Key;


class MY_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->response = (object) [
			'code'=> 200,
		];
		$this->secret_key = 'painandsuffering';
	}

	public function sendResponse(){
		$this->output
			->set_status_header($this->response->code)
			->set_content_type('application/json')
			->set_output(json_encode($this->response));
	}

	public function verify()
	{
		try {
			$token = $this->input->request_headers()['Authorization'] ?? '';
			$token = explode(' ', $token);
			$token = $token[1] ?? '';
			if (empty($token)) throw new Exception('Unauthorized', 401);
			$decoded = JWT::decode($token, new Key($this->secret_key, 'HS512'));

			if (!$decoded) throw new Exception('Unauthorized', 401);

		} catch (Exception $e) {
			$this->response->code = empty($e->getCode()) ? 500 : $e->getCode();
			$this->response->error = "{$e->getMessage()}";
			$this->sendResponse();
		}

	}

}

/* End of file baseApiController.php */
/* Location: ./application/controllers/baseApiController.php */