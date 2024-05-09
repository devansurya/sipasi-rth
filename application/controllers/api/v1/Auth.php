<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Auth extends \MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$reqType = $this->input->server('REQUEST_METHOD');
		if (!method_exists($this, $reqType)) {
			$this->response->error = 'Method Not Allowed';
			$this->response->code = 403;
			return $this->sendResponse();
		}
		$this->$reqType();
	}

	private function POST()
	{
		try {
			$data = [
				'email' =>$this->input->get('email', true),
				'password' =>$this->input->get('password', true),
			];

			$user = $this->db->select('user.id_user, user.email, user.password, user_role.id_role, user_profile.nama, role.role, user.is_active')
			->from('user')->join('user_profile', 'user.id_user = user_profile.id_user', 'left')
	        ->join('user_role', 'user.id_user = user_role.id_user', 'left')
	        ->join('role', 'user_role.id_role = role.id_role', 'left')
			->where('email', $data['email'])->get()
			->row_array();

			if (!$user) throw new Exception('User Not Found', 401);
			$checkpass = md5($data['password']) == $user['password'];
			if (!$checkpass) {
				throw new Exception('Password Wrong!', 401);
			}

			$createDate  = new DateTimeImmutable();
			$expireDate  = $createDate->modify('+60 minutes')->getTimestamp();
			$serverName  = "localhost";

			$data['iat'] = $createDate->getTimestamp();
			$data['iss'] = $serverName;
			$data['nbf'] = $createDate->getTimestamp();
			$data['exp'] = $expireDate;

			$this->response->data = JWT::encode(
			    $data,
			    $this->secret_key,
			    'HS512'
			);
			$this->response->message = 'Success';

		} catch (Exception $e) {
			$this->response->code = $e->getCode();
			$this->response->error = "{$e->getMessage()}";
		}

		$this->sendResponse();
	}

	public function verifyToken()
	{
		$this->verify();
	}

}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */