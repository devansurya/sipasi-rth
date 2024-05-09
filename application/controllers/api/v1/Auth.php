<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends \MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$reqType = $this->input->server('REQUEST_METHOD');
		if (!method_exists($this, 'GET')) {
			$this->response->error = 'Method Not Allowed';
			$this->response->code = 403;
			return $this->sendResponse();
		}
		$this->$reqType();
	}

	private function GET()
	{
		$this->input->get('email');
		$this->input->get('password');

		
		$this->sendResponse();
	}

}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */