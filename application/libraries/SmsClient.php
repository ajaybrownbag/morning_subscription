<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SmsClient{

	private $username,
			$password,
			$senderid,
			$messagetype,
			$DReports,
			$url;

	public function __construct(){
		$this->username = "brownbag"; //your username
		$this->password = "BrownBag@123"; //your password
		$this->senderid = "BRWNBG"; //Your senderid
		$this->messagetype = "N"; //Type Of Your Message
		$this->DReports = "Y"; //Delivery Reports
		$this->url = "http://www.smscountry.com/SMSCwebservice_Bulk.aspx";
	}

	public function send($message, $mobile, $priority=false) {
		if($priority){
			$this->username = "brownbag_otp"; //your username
			$this->password = "BrownBagOTP@123"; //your password
		}
		$message = urlencode($message);
		$data_url = "User={$this->username}&passwd={$this->password}&mobilenumber={$mobile}&message={$message}&sid={$this->senderid}&mtype={$this->messagetype}&DR={$this->DReports}";
		$ch = curl_init();
		if (!$ch){die("Couldn't initialize a cURL handle");}
		$ret = curl_setopt($ch, CURLOPT_URL,$this->url);
		curl_setopt ($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
		curl_setopt ($ch, CURLOPT_POSTFIELDS,$data_url);
		$ret = curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		$curlresponse = curl_exec($ch);
		if(curl_errno($ch)){
			curl_close($ch);
			return false;
		}
		if (empty($ret)) {
			curl_close($ch);
			return false;
		} else {
			$info = curl_getinfo($ch);
			curl_close($ch);
			return true;
		}
	}
}
