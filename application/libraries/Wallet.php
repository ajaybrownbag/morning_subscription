<?php
defined('BASEPATH') OR exit('No direct script access allowed');
define("API_URL","http://localhost/bbWallet/api/");
// define("API_URL","http://ec2-35-154-69-175.ap-south-1.compute.amazonaws.com/api/");
class Wallet{
	public function __construct(){
		$this->url = API_URL;
		$headers = apache_request_headers();
		$this->userAgent = $headers['User-Agent'];
	}
	
	public function apiRequest($api, $params, $token){
		$data = $params;
		$apiUrl = $this->url.$api;
		$curl = curl_init($apiUrl);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Token: '.$token));
		curl_setopt($curl, CURLOPT_USERAGENT,$this->userAgent);
		curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($curl);
		curl_close($curl);
		return json_decode($response);
	}	
}