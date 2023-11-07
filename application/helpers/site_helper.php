<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('get_csrf_token')) {
	function get_csrf_token(){
		$ci = get_instance();
		if (!$ci->session->csrf_token) {
			$ci->session->csrf_token = hash('sha1', time());
		}
		return $ci->session->csrf_token;
	}
}

if (!function_exists('get_csrf_name')) {
	function get_csrf_name(){
		return "token";
	}
}

if (!function_exists('cek_csrf')) {
	function cek_csrf(){
		$ci = get_instance();
		if ($ci->input->post(get_csrf_name()) != $ci->session->csrf_token OR !$ci->input->post(get_csrf_name()) OR !$ci->session->csrf_token) {
			$ci->session->unset_userdata('csrf_token');
			$ci->output->set_status_header(403);
			show_error('The action you have requested is not allowed.');
			return false;
		}
		$ci->session->unset_userdata('csrf_token');
	}
}

function csrf(){
	return "<input type='hidden' name='".get_csrf_name()."' value='".get_csrf_token()."'/>";
}

?>