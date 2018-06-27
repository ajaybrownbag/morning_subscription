<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Environment extends CI_Model{
	
	#======================================
	# Default Constructor
	public function __construct(){
		parent::__construct();
		$this->load->model(array("product","user"));
		$user_id = ($this->session->has_userdata('user_id')) ? $this->encrypt->decode($this->session->user_id) : null;
		if(!empty($user_id)){$this->user->refreshTokens($user_id);}
	}
	
}