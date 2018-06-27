<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model{
	
	#=================================================
	# Default Construct
	public function __construct(){
		parent::__construct();
	}
	
	#===================================================
	# Get user wallet token
	public function getWalletToken($user_id){
		$this->db->select("wallet_token")
		->from("bb_users")
		->where("user_id",$user_id);
		$user = $this->db->get()->result()[0];
		return $user->wallet_token;
	}
	
	#=====================================================
	#Process Login
	public function login($mobile,$password){
		$password = sha1($password);
		$user = $this->db->get_where(array("mobile_number" => $mobile, "password" => $password))->result();
		if(!empty($user)){
			$details = array(
				"user_id" => $this->encrypt->encode($user[0]->user_id),
				"wallet_token" => $user[0]->wallet_token,
				"logged_in" => true
			);
			#setting user into session
			$this->setDetails($details);
			return (object)array("status"=> true,"message"=>"Success");
		}else{
			return (object)array("status"=> false,"message"=>"Invalid Credentials!");
		}
	}
	
	#===========================================
	#logout process
	public function logout(){
		$this->session->sess_destroy();
	}
	
	#====================================================
	#Registration process
	public function register($user){
		
	}
	
	#===============================================
	#Check if logged in
	public function isLoggedIn(){
		if($this->session->has_userdata('logged_in'))
		return ($this->session->userdata('logged_in')) ? true : false;
		return false;
	}
	
	#==================================================
	#check for already exist
	public function isExist($options){
		$user = $this->db->get_where("bb_users",$options)->result();
		return (!empty($user)) ? true : false;
	}
	
	#================================================
	#Set the user information in session
	public function setDetails($details){
		$this->session->set_userdata($details);
	}
	
	#=============================================
	#Refresh the wallet tokens
	public function refreshTokens($user_id){
		$user = $this->db->get_where("bb_users",array("user_id" => $user_id))->result();
		if(!empty($user)){
			$this->session->set_userdata("wallet_token", $user[0]->wallet_token);
		}
		return true;
	}
}






