<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Env extends CI_Model{
	#======================================
	# Default Constructor
	public function __construct(){
		parent::__construct();
		$this->load->model(array("product","user","subscription"));
		$this->user_id = $this->session->user_id;
		$this->area_id = $this->session->area_id;
		$this->userProfile = $this->user->getProfile($this->user_id);
		$this->wallet_token = $this->session->wallet_token;
		$this->cartItems = $this->subscription->userCart($this->user_id);
		$this->user->refreshTokens($this->user_id);
	}	
	
	
}