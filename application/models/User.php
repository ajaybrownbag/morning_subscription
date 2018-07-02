<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model{
	
	#=================================================
	# Default Construct
	public function __construct(){
		parent::__construct();
	}
	
	#===================================================
	# Getting user profile
	public function getProfile($user_id){
		if(empty($user_id)) return (object)array();
		$sql = "SELECT 
			bu.user_id,
			bu.first_name,
			bu.last_name,
			bu.mobile_number,
			bu.email_id,
			bosuf.flat_number,
			bosuf.floor,
			bosuf.door_bell,
			bosb.building_name,
			boss.society_name,
			bas.area_name
		FROM bb_users bu
		LEFT JOIN bb_ord_subs_user_flat bosuf USING(user_id)
		LEFT JOIN bb_ord_subs_building bosb ON(bosuf.building_id = bosb.building_id)
		LEFT JOIN bb_ord_subs_society boss ON(bosb.society_id = boss.society_id)
		LEFT JOIN bb_area_sector bas ON(boss.area_id = bas.area_id)
		WHERE bu.user_id = '{$user_id}'";
		return $this->db->query($sql)->row();
		
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






