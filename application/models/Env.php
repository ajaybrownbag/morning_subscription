<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Env extends CI_Model{
	#======================================
	# Default Constructor
	public function __construct(){
		parent::__construct();
		$this->load->model(array("product","user","subscription"));
		$this->user_id = ($this->session->has_userdata('user_id')) ? $this->session->user_id : 335;
		$this->userProfile = (!empty($this->user_id)) ? $this->user->getProfile($this->user_id) : (object)array();
		$this->wallet_token = (!empty($this->user_id)) ? $this->session->wallet_token : null;
		$this->cartItems = (!empty($this->user_id)) ? $this->subscription->userCart($this->user_id) : array();
		if(!empty($this->user_id)){$this->user->refreshTokens($this->user_id);}
	}	
	
	
}