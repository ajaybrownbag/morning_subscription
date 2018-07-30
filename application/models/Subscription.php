<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscription extends CI_Model{
	
	public function __construct(){
		parent::__construct();
		$this->load->model(array('stringSearch'));
	}
	
	#======= Searching Functions Starts ==========
	public function searchCity($term,$state = "Delhi"){
		$options = array(
			"table" => "(SELECT bc.city_id, bc.city_name
				FROM bb_city bc
				INNER JOIN bb_area_sector bas ON bc.city_id = bas.city_id
				INNER JOIN bb_ord_subs_society boss ON bas.area_id = boss.area_id
				WHERE bc.state = '{$state}' GROUP BY bc.city_id)tempCity",
			"columns" => array("city_id","city_name"),
			"target" => "city_name",
			"string" => $term
		);
		$cities = $this->stringSearch->search($options,"desc",400);
		return $cities;
	}
	
	public function searchArea($term,$city_id){
		$options = array(
			"table" => "(SELECT bas.area_id, bas.area_name,bas.area_zipcode
				FROM bb_area_sector bas
				INNER JOIN bb_ord_subs_society boss ON bas.area_id = boss.area_id
				WHERE bas.city_id = '{$city_id}' GROUP BY bas.area_id)tempArea",
			"columns" => array("area_id","area_name","area_zipcode"),
			"target" => "area_name",
			"string" => $term
		);
		$areas = $this->stringSearch->search($options,"desc",400);
		return $areas;
	}
	
	public function searchSociety($term,$area_id){
		$options = array(
			"table" => "(SELECT boss.society_id, boss.society_name,bas.area_zipcode as zipcode
				FROM bb_ord_subs_society boss
				INNER JOIN bb_area_sector bas ON boss.area_id = bas.area_id
				WHERE boss.area_id = '{$area_id}' GROUP BY boss.society_id)tempSociety",
			"columns" => array("society_id","society_name","zipcode"),
			"target" => "society_name",
			"string" => $term
		);
		$societies = $this->stringSearch->search($options,"desc",400);
		return $societies;
	}
	#======= Searching Functions Ends =========
	
	
	# Getting serving areas
	public function getAreas($city_id = null){
		$condition = ($city_id) ? "bas.city_id = '{$city_id}'" : "1=1";
		$sql = "SELECT 
			DISTINCT(boss.area_id) AS area_id,
			bas.area_name,
			boss.zipcode
		FROM bb_ord_subs_society boss
		LEFT JOIN bb_area_sector bas USING(area_id)
		WHERE {$condition}";
		return $this->db->query($sql)->result();
	}
	
	# Getting societies according to area_id or all
	public function getSocieties($area_id = null){
		$condition = ($area_id) ? "area_id  = '{$area_id}'" : "1=1";
		$sql = "SELECT * FROM bb_ord_subs_society boss where {$condition}";
		return $this->db->query($sql)->result();
	}
	
	# Getting societies according to area_id or all
	public function getBuildings($society_id = null){
		$condition = ($society_id) ? "society_id  = '{$society_id}'" : "1=1";
		$sql = "SELECT * FROM bb_ord_subs_building where {$condition}";
		return $this->db->query($sql)->result();
	}
	
	# Getting single society information[society_id]
	public function getSociety($society_id){
		$condition = "boss.society_id = '{$society_id}'";
		$sql = "SELECT 
			bc.city_id, 
			bc.city_name,
			bas.area_name,
			bas.area_zipcode,
			bas.area_id,
			boss.society_name,
			boss.society_id
		FROM bb_ord_subs_society boss
		INNER JOIN bb_area_sector bas ON(boss.area_id = bas.area_id)
		INNER JOIN bb_city bc ON (bas.city_id = bc.city_id)
		WHERE $condition";
		return $this->db->query($sql)->row();
	}
	
	# Getting single area information[area_id]
	public function getArea($area_id){
		$condition = "boss.area_id = '{$area_id}'";
		$sql = "SELECT 
			bc.city_id, 
			bc.city_name,
			bas.area_name,
			bas.area_zipcode,
			bas.area_id
		INNER JOIN bb_area_sector bas ON(boss.area_id = bas.area_id)
		INNER JOIN bb_city bc ON (bas.city_id = bc.city_id)
		WHERE $condition";
		return $this->db->query($sql)->row();
	}
	
	
	
	public function userCart($user_id = null){
		if(empty($user_id)) return array();
		$products = $this->db->get_where("bb_ord_subs_cart",array("user_id" => $user_id))->result();
		$cartItems = array();
		array_walk($products, function($product)use(&$cartItems){
			$info = $this->product->get($product->product_id);
			$info->quantity = $product->quantity;
			array_push($cartItems, $info);
		});
		return $cartItems;
	}
	
	private function getWallet($user_id){
		$token = $this->user->getWalletToken($user_id);
		$walletData = array("user_id" => $user_id);
		$this->load->library('wallet');
		$walletResponse = $this->wallet->apiRequest('wallet',$walletData,$token);
		# remove extra data
		if($walletResponse->status){
			unset($walletResponse->wallet->wallet_id);
			unset($walletResponse->wallet->user_id);
			unset($walletResponse->wallet->total_browncoins);
			unset($walletResponse->wallet->status);
			unset($walletResponse->wallet->timeStamp);
			$response = $walletResponse->wallet;
		}else{
			$response = $walletResponse;
		}

		return $response;
	}
	
	// calculate subscribed items total
	public function get($user_id){
		$walletResponse = $this->getWallet($user_id);
		return $walletResponse;
		// $walletResponse->reserved_wallet_cash = $walletResponse->subscription_amount - $walletResponse->payable_amount;
		// $sod = new SubsOrderDAO();
		// $myAccount = $sod->getSubscription(array('user_id' => $user_id));
		// $subsOrderItems = $sod->getSubscriptionOrder($user_id);
		// array_walk($subsOrderItems, function(&$item) use($sod,$user_id){
			// $calculations = $sod->calculateDeliveries($item,$user_id);
			// $masterInfo = $sod->getProduct($item['product_id']);
			// $item['product_mrp'] = $masterInfo['product_mrp'];
			// $item['product_price'] = $masterInfo['product_price'];
			// $item['product_name'] = $masterInfo['product_name'];
			// $item['unit'] = $masterInfo['quantity'].$masterInfo['unit'];
			// $item['product_image_url'] = $masterInfo['product_image_url'];
			// $item['total_deliveries'] = $calculations['deliveryCount'];
			// $item['total_amount'] = $calculations['total_amount'];
			// unset($item['vacation_start_date']);
			// unset($item['vacation_end_date']);
		// });
		// $min_date = (strtotime($myAccount['start_date']) > strtotime(date("Y-m-d")))
			// ? $myAccount['start_date']
			// : date("Y-m-d");
		// if(strtotime($min_date) > strtotime($myAccount['end_date'])){
			// $max_date = $min_date = null;
		// }else{
			// $max_date = $myAccount['end_date'];
		// }
		// $extraCharges = $sod->getSubscriptionDeliveryCharges($user_id);
		// $walletResponse->subscription_amount = $walletResponse->subscription_amount-$extraCharges['deliveryCharge'];
		// $response = array(
			// 'status' => true,
			// 'vacations' => array(
				// "min_date" => $min_date,
				// "max_date" => $max_date,
				// "vacation_start_date" => $myAccount['vacation_start_date'],
				// "vacation_end_date" => $myAccount['vacation_end_date']
			// ),
			// 'delivery_charge' => $extraCharges['deliveryCharge'],
			// 'delivery_days' => $extraCharges['deliveryDays'],
			// 'calculation' => $walletResponse,
			// 'subscription_items' => $subsOrderItems
		// );
		// echo json_encode($response);
		// return;
	}
}
