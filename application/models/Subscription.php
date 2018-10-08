<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('DataTable.php');
class Subscription extends CI_Model{
	use Datatable;
	var $sqlQuery = '';
	# table populating settings
	var $settings = array(
		'subscription_history' => array(
			'table' => "bb_ord_subs_order_transaction",
			'column_order' => array(null,'txn_id',null,'delivery_charge','total_amount','delivery_date'),
			'column_search' => array('txn_id'),
			'order' => array('delivery_date',"DESC"),
		)
	);
	public function __construct(){
		parent::__construct();
		$this->load->model(array('stringSearch','product'));
	}

	#Populate Table
	public function populateTable($reference,$conditions=null){
		$this->_get_datatables_query($reference,$conditions);
    if($_POST['length'] != -1)
    $this->db->limit($_POST['length'], $_POST['start']);
    $query = $this->db->get();
    return $query->result();
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

	#======================================
	# Getting top selling products
	public function getTopSellingProducts($user_id = null,$area_id = null,$index=0,$limit=10){
		$condition = ($area_id) ? "FIND_IN_SET('{$area_id}',bosp.serving_areas)" : "1=1";
		$offset = $index*$limit;
		$now = date("Y-m-d");
		$sql = "SELECT bosp.id,
				bosp.product_id,
				TIME_FORMAT(bosp.cutoff_time,'%H:%i') as cutoff_time,
				bp.product_name,
				bp.product_short_name,
				bp.product_mrp,
				bosp.product_price,
				CONCAT(bp.quantity,bp.unit) AS unit,
				bp.seourls,
				IF(bosi.product_id,1,0) AS is_subscribed,
				IF(bosc.product_id, 1, 0) AS in_cart
			FROM bb_ord_subs_product bosp
			INNER JOIN bb_products bp USING(product_id)
			LEFT JOIN bb_ord_subscription bos ON(bos.user_id = '{$user_id}')
			LEFT JOIN bb_ord_subs_cart bosc ON bp.product_id = bosc.product_id AND bosc.user_id = '{$user_id}'
			LEFT JOIN bb_ord_subs_item bosi
				ON(bosp.product_id = bosi.product_id AND bos.order_id = bosi.order_id AND bosi.end_date >= '{$now}')
			WHERE {$condition} GROUP BY bosp.id ORDER BY COUNT(bosi.product_id) DESC, bosp.rank ASC
			LIMIT {$index},{$limit}";
		return $this->db->query($sql)->result();
	}

	#======================================
	# Getting Offer products
	public function getOfferProducts($user_id = null,$area_id = null,$index=0,$limit=10){
		$condition = ($area_id) ? "FIND_IN_SET('{$area_id}',bosp.serving_areas)" : "1=1";
		$offset = $index*$limit;
		$now = date("Y-m-d");
		$sql = "SELECT bosp.id,
				bosp.product_id,
				TIME_FORMAT(bosp.cutoff_time,'%H:%i') as cutoff_time,
				bp.product_name,
				bp.product_short_name,
				bp.product_mrp,
				bosp.product_price,
				CONCAT(bp.quantity,bp.unit) AS unit,
				bp.seourls,
				IF(bosi.product_id,1,0) AS is_subscribed,
				IF(bosc.product_id, 1, 0) AS in_cart
			FROM bb_ord_subs_product bosp
			INNER JOIN bb_products bp USING(product_id)
			LEFT JOIN bb_ord_subscription bos ON(bos.user_id = '{$user_id}')
			LEFT JOIN bb_ord_subs_cart bosc ON bp.product_id = bosc.product_id AND bosc.user_id = '{$user_id}'
			LEFT JOIN bb_ord_subs_item bosi
				ON(bosp.product_id = bosi.product_id AND bos.order_id = bosi.order_id AND bosi.end_date >= '{$now}')
			WHERE {$condition} GROUP BY bosp.id ORDER BY (100 - bosp.product_price * 100 / bp.product_mrp) DESC, bosp.rank ASC
			LIMIT {$index},{$limit}";
		return $this->db->query($sql)->result();
	}
	#===========================================
	#Getting user cart
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

	# Getting Subscription Cart Details
	public function getSubscriptionCart($user_id){
		# getting cart items and order items
		$subsCartItems = $sod->getSubscriptionCart($user_id);
		$wallet = $this->getWallet($user_id);
		# calculating cart item
		$cartTotal = 0;
		$cart_items = array();
		$afterTomorrow = strtotime(date("Y-m-d")." +2 day");
		$tomorrow = strtotime(date("Y-m-d")." +1 days");
		$current_cutoff = strtotime(date("H:i:s"));
		foreach($subsCartItems as $cartItem){
			$item_info = $cartItem;
			$calculations = $sod->calculateDeliveries($cartItem,$user_id);
			$item_info['total_deliveries'] = $calculations['deliveryCount'];
			$item_info['total_amount'] = $calculations['total_amount'];
			$cartTotal += $calculations['total_amount'];
			$productInfo = $sod->getSubscriptionProduct($cartItem['product_id']);

			$item_info['update_available'] = 0;
			$item_info['update_message'] = "";

			if($tomorrow > strtotime($cartItem['end_date'])){
				$item_info['update_available'] = 1;
				$item_info['update_message'] = "Selected date has been expired.";
			}elseif($afterTomorrow > strtotime($cartItem['start_date'])){
				if(strtotime($productInfo['cutoff_time']) < $current_cutoff){
					if(strtotime($cartItem['start_date']) >= strtotime($cartItem['end_date'])){
						$item_info['update_available'] = 1;
						$item_info['update_message'] = "Cutoff time exceeded! Not available for tomorrow.";
					}else{
						$item_info['update_available'] = 1;
						$item_info['update_message'] = "Cutoff time exceeded! It will adjust for day after tomorrow.";
					}
				}
			}

			$product_info = $sod->getProduct($cartItem['product_id']);
			$item_info['product_name'] = $product_info['product_name'];
			$item_info['product_mrp'] = $product_info['product_mrp'];
			$item_info['product_price'] = $product_info['product_price'];
			$item_info['product_image_url'] = $product_info['product_image_url'];
			$item_info['unit'] = $product_info['unit'];

			$item_info['date_configs']['pattern'] = $cartItem['pattern'];
			$item_info['date_configs']['pattern_value'] = ($cartItem['pattern'] == "weekdays")
			? json_decode($cartItem['pattern_value'],true) : $cartItem['pattern_value'];
			# Remove extra data
			unset($item_info['date_config']);
			unset($item_info['pattern']);
			unset($item_info['pattern_value']);
			unset($item_info['vacation_start_date']);
			unset($item_info['vacation_end_date']);

			array_push($cart_items,$item_info);
		}
		$extraCharges = $sod->calculateCartDeliveries($user_id);
		$payable_amount = (($cartTotal+$extraCharges['deliveryCharge']+$wallet->payable_amount) >= $wallet->total_amount)
			? (($cartTotal+$extraCharges['deliveryCharge']+$wallet->payable_amount) - $wallet->total_amount) : 0;
		$used_walletCash = ((($cartTotal+$extraCharges['deliveryCharge']+$wallet->payable_amount)) >= $wallet->total_amount)
				? $wallet->total_amount : ($cartTotal+$extraCharges['deliveryCharge']+$wallet->payable_amount);
		echo json_encode(array(
			'status' => true,
			'message' => "Successfully Calculated",
			'subscription_cart_total' => $cartTotal,
			'delivery_charge' => $extraCharges['deliveryCharge'],
			'subs_pending_amount' => !empty($wallet->payable_amount) ? $wallet->payable_amount : 0,
			'used_walletCash' => !empty($used_walletCash) ? $used_walletCash : 0,
			'pending_wallet_txn' => !empty($wallet->pending_wallet_txn) ? $wallet->pending_wallet_txn : 0,
			'total_amount' => !empty($wallet->total_amount) ? $wallet->total_amount : 0,
			'payable_amount' => $payable_amount,
			'delivery_days' => $extraCharges['deliveryDays'],
			'cart_items' => $cart_items
		));
		return;
	}

	#Getting Subs ORDER
	public function getSubscriptionOrder($user_id){
		$sql = "SELECT
				bosi.item_id,
				bosi.order_id,
				bosi.product_id,
				bosi.quantity,
				bosi.date_config,
				bosi.pattern,
				bosi.pattern_value,
				bosi.start_date,
				bosi.end_date,
				bosi.pause_date_start,
				bosi.pause_date_end,
				bos.vacation_start_date,
				bos.vacation_end_date
			FROM bb_ord_subs_item bosi
			LEFT JOIN bb_ord_subscription bos ON bosi.order_id = bos.order_id
			WHERE bos.user_id = '{$user_id}'";
		return $this->db->query($sql)->result();
	}

	# calculate subscribed items total
	public function get($user_id){
		$walletResponse = $this->getWallet($user_id);
		$walletResponse->reserved_wallet_cash = $walletResponse->subscription_amount - $walletResponse->payable_amount;
		$myAccount = $this->getSubscription(array('user_id' => $user_id));
		$subsOrderItems = $this->getSubscriptionOrder($user_id);
		return $subsOrderItems;
		$minCutOffTime = null;
		array_walk($subsOrderItems, function(&$item) use($user_id,&$minCutOffTime){
			$calculations = $this->product->calculateDeliveries($item,$user_id);
			$masterInfo = $this->product->get($item->product_id);
			$item->product_mrp = $masterInfo->product_mrp;
			$item->product_price = $masterInfo->product_price;
			$item->product_name = $masterInfo->product_name;
			$item->unit = $masterInfo->unit;
			$item->cutoff_time = $masterInfo->cutoff_time;
			$item->product_image_url = $masterInfo->product_image_url;
			$item->total_deliveries = $calculations->deliveryCount;
			$item->total_amount = $calculations->total_amount;
			$item->date_configs->pattern = $item->pattern;
			$item->date_configs->pattern_value = ($item->pattern == 'weekdays')
				? json_decode($item->pattern_value,true) : $item->pattern_value;

			$minCutOffTime = (empty($minCutOffTime))
			? $masterInfo->cutoff_time
			: ((strtotime($minCutOffTime) > strtotime($masterInfo->cutoff_time))
				? $masterInfo->cutoff_time
				: $minCutOffTime);
			unset($item->date_config);
			unset($item->pattern);
			unset($item->pattern_value);
			unset($item->vacation_start_date);
			unset($item->vacation_end_date);
		});

		$nowTime = date("H:i:s");
		$fixedDate = (strtotime($minCutOffTime) <=  strtotime($nowTime))
			? strtotime(date("Y-m-d")." +2 day") : strtotime(date("Y-m-d")." +1 day");
		$min_date = (strtotime($myAccount->start_date) > $fixedDate)
			? $myAccount->start_date
			: date("Y-m-d",$fixedDate);
		if(strtotime($min_date) > strtotime($myAccount->end_date)){
			$max_date = $min_date = null;
		}else{
			$max_date = $myAccount->end_date;
		}
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

	#Calculate Delivery Charges
	public function getSubscriptionDeliveryCharges($user_id){
		$systemSettings = new SettingDAO();
		$settings = $systemSettings->getSystemSettingByTitle('subscription_delivery_charge');
		$perOrderCharge = $settings['value'];
		$response = array(
			'deliveryCharge' => 0,
			'deliveryDays' => 0,
			'adjustedDeliveryCharge' => 0
		);
		$subscription = $this->getSubscription(array('user_id' => $user_id));
		$startDate = strtotime(date("Y-m-d")." +1 day");
		$last_date = strtotime($subscription['end_date']);
		$startDate = (strtotime($subscription['start_date']) > $startDate)
			? strtotime($subscription['start_date'])
			: $startDate;
		$subscribedItems = $this->getSubscriptionOrder($user_id);
		while($startDate <= $last_date){
			$orderStatus = $this->checkOrderForDate($subscription, $subscribedItems, date("Y-m-d",$startDate));
			$response['deliveryCharge'] += ($orderStatus) ? $perOrderCharge : 0;
			$response['deliveryDays'] += ($orderStatus) ? 1 : 0;
			$startDate = strtotime(date("Y-m-d",$startDate)." +1 day");
		}
		return $response;
	}

	# Getting the subscription order
	public function getSubscription($option){
		$key = key($option);
		$value = $option[$key];
		$this->db->where($key,$value);
		$subscription = $this->db->get("bb_ord_subscription")->row();
		return $subscription;
	}

	#Getting Ordered
	public function getOrdered($user_id,$date){
		$subs = $this->getSubscription(array("user_id" => $user_id));
		if(empty($subs)) return null;
		$sql = "SELECT COUNT(*) AS ordered
		FROM bb_ord_subs_order_transaction
		WHERE order_id='{$subs['order_id']}' AND delivery_date = '{$date}'";
		return $this->db->query($sql)->row();
	}

	#calculate Deliveries
	public function calculateDeliveries($product, $user_id){
		$order = $this->getOrdered($user_id,date("Y-m-d"));
		$start_date = ($order['ordered']) ? strtotime(date("Y-m-d")." +1 day") : strtotime(date("Y-m-d"));
		$start_date = (strtotime($product['start_date']) > $start_date) ? strtotime($product['start_date']) : $start_date;
		$end_date = strtotime($product['end_date']);
		$productDetails = $this->product->get($product['product_id']);
		$deliveryCount = 0;
		$total_amount = 0;
		$tempProduct = $product;
		while($end_date >= $start_date){
			$configs = $this->product->parseProductConfigs(date("Y-m-d",$start_date),$product['date_config']);
			$vacations = (!empty($product['vacation_start_date']) && !empty($product['vacation_end_date']))
			? array($product['vacation_start_date'],$product['vacation_end_date']) : null;
			$pause_range = (!empty($product['pause_date_start']) && !empty($product['pause_date_end']))
				? array($product['pause_date_start'],$product['pause_date_end']) : null;

			$status = (!empty($configs)) ? (($configs['status'] == 'true') ? 1 : 0) : 0;

			if(!empty($vacations) && $status){
				$status = ($start_date < strtotime($vacations[0]) || $start_date > strtotime($vacations[1]))
				? 1 : 0;
			}
			if(!empty($pause_range) && $status){
				$status = ($start_date < strtotime($pause_range[0]) || $start_date > strtotime($pause_range[1]))
				? 1 : 0;
			}
			if($status){
				$deliveryCount++;
				$quantity = (!empty($configs)) ? (($configs['status'] == 'true') ? $configs['quantity'] : 0) : $configs['quantity'];
				$total_amount += $productDetails['product_price'] * $quantity;
			}
			$start_date = strtotime(date("Y-m-d" ,$start_date)." +1 day");
		}

		return array(
			'deliveryCount' => $deliveryCount,
			'total_amount' => $total_amount
		);
	}
	public function loadTransaction($txn_id){
		$this->db->select("*")
		->from("bb_ord_subs_order_transaction")
		->where("txn_id",$txn_id);
		return $this->db->get()->row();
	}
	public function loadOrderProducts($txn_id){
		$products = array();
		$transaction = $this->loadTransaction($txn_id);
		$items = json_decode($transaction->items);
		foreach($items as $item){
			$masterProduct = $this->product->get($item->product_id);
			$imageURL = "https://d2gxays8f387d8.cloudfront.net/prodstore/productimg_thumbs_50_50/";
			$item->product_price = isset($item->product_price) ? $item->product_price : $item->product_mrp;
			$product = array(
				'txn_id' => $txn_id,
				'product_image_url' => $imageURL.$masterProduct->product_image_url,
				'seourls' => $masterProduct->seourls,
				'product_id' => $item->product_id,
				'product_name' => $masterProduct->product_name,
				'product_mrp' => $item->product_mrp,
				'product_price' => $item->product_price,
				'quantity' => $item->quantity,
				'unit' => $masterProduct->unit,
				'total' => $item->product_price*$item->quantity
			);
			array_push($products,$product);
		}
		return $products;
	}
}
