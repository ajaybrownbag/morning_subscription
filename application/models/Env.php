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
		$this->society_id = $this->session->society_id;
		$this->userProfile = $this->user->getProfile($this->user_id);
		$this->wallet_token = $this->session->wallet_token;
		$this->categories = $this->product->getCategories($this->area_id);
		$this->cartItems = $this->subscription->userCart($this->user_id);
		$this->user->refreshTokens($this->user_id);
	}
	
	public function setLocation($society_id){
		$location = $this->subscription->getSociety($society_id);
		$locationData = array(
			"city_id" => $location->city_id,
			"area_id" => $location->area_id,
			"society_id" => $location->society_id
		);
		$this->session->set_userdata($locationData);
		return true;
	}
	public function checkLocation(){
		$response = [
			"status" => false,
			"message" => "Location not found!",
			"location" => []
		];
		if($this->session->society_id){
			$locationData = array(
				"city_id" => $this->session->city_id,
				"area_id" => $this->session->area_id,
				"society_id" => $this->session->society_id
			);
			$response = [
				"status" => true,
				"message" => "Location found!",
				"location" => $locationData
			];
		}
		return $response;
	}
	
	public function isLoggedIn(){
		return $this->user->isLoggedIn();
	}
}