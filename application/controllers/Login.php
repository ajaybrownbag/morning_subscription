<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model(array("user"));
	}
	
	public function logout(){
		$this->user->logout();
		redirect(base_url(), 'refresh');
	}
}
