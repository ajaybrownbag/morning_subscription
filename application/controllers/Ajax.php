<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {
	#============================================================
	# Default Constructor
	public function __construct(){
		parent::__construct();
		$this->load->model(array("product","subscription"));
		#Validate is ajax request
		if(!$this->input->is_ajax_request()){
			exit('Unautherized Access!');
		}
	}

	#============================================================
	# Handle all ajax requests
	public function userAction(){
		$action = $this->input->post_get("action");
		switch($action){
			#Search City
			case "searchCity":
				$term = $this->input->post("term");
				$state = $this->input->post_get("state");
				$cities = $this->subscription->searchCity($term,$state);
				echo json_encode($cities);
			break;

			#Search Area
			case "searchArea":
				$term = $this->input->post("term");
				$city_id = $this->input->post_get("city_id");
				$areas = $this->subscription->searchArea($term,$city_id);
				echo json_encode($areas);
			break;

			#Search Society
			case "searchSociety":
				$term = $this->input->post("term");
				$area_id = $this->input->post_get("area_id");
				$societies = $this->subscription->searchSociety($term,$area_id);
				echo json_encode($societies);
			break;

			#Set Location
			case "checkLocation":
				$response = $this->env->checkLocation();
				echo json_encode($response);
			break;

			#Set Location
			case "setLocation":
				$society_id = $this->input->post("society_id");
				$this->env->setLocation($society_id);
				echo json_encode(["status" => true, "message" => "Set successfully"]);
			break;

			#Product search
			case "searchProduct":
				$category = $this->input->post("category");
				$term = $this->input->post("term");
				$filter = !empty($category) ? array("category" => $category) : null;
				$products = $this->product->search($term,$filter);
				echo json_encode($products);
			break;

			#getting product search suggestions
			case "getSuggestions":
				$term = $this->input->post_get("term");
				$response = $this->product->suggestions(trim($term));
				echo json_encode($response);
			break;

			#getting products for sliders
			case "loadMoreSearchResults":
				$category = $this->input->post("categroy");
				$term = $this->input->post("term");
				$index = $this->input->post("index");
				$limit = 10;
				$offset = ($index) ? $index*$limit : $index;
				$options = [
					"term" => $term,
					"index" => $index,
					"category" => $category,
					"limit" => $limit,
					"offset" => $offset
				];

				$products = $this->product->loadMoreSearches($options);
				echo json_encode($products);
			break;

			case "loadCategoryProducts":
				$category_id = $this->input->post("category_id");
				$index = $this->input->post("index");
				$offset = ($index) ? $index*10 : $index;
				$limit = 10;
				$user_id = $this->session->user_id;
				$area_id = $this->session->area_id;
				$products = $this->product->getProducts($user_id,$area_id,$category_id,$offset,$limit);
				array_walk($products,function(&$product)use($user_id){
					$product->product_image_url = $this->product->getImageName($product->product_id);
					if($product->is_subscribed){
						$product->date_configs = $this->product->getDateConfigs($user_id,$product->product_id);
						$product->date_configs->date_config = json_decode($product->date_configs->date_config,true);
						$product->date_configs->pattern_value = ($product->date_configs->pattern == 'weekdays')
							? json_decode($product->date_configs->pattern_value,true) : $product->date_configs->pattern_value;
					}
				});
				if(!empty($products)){
					echo json_encode(array(
						"status" => true,
						"message" => "Successfully Fetched",
						"products" => $products
					));
				}else{
					echo json_encode(array(
						"status" => false,
						"message" => "All Fetched",
						"products" => $products
					));
				}
			break;
			case "filterCategoryResults":
				$user_id = (!$this->session->has_userdata('user_id')) ? $this->session->user_id : null;
				$category = $this->input->post("type");
				$term = $this->input->post("term");
				$index = $this->input->post("index");
				$limit = 20;
				$offset = $index*$limit;
				#testing
				$options = [
					"term" => trim($term),
					"category" => $category,
					"limit" => $limit,
					"offset" => $offset
				];
				$response = $this->product->loadSearches($options);
				echo json_encode($response);
			break;

			#Invalidate user action if not found
			default: echo json_encode(array("status" => false, "message" => "Invalid Action"));
		}
		return;
	}

	# Handle product related actions
	public function productActions(){
		$action = $this->input->post("action");

		$response = (object) [
			"status" => false,
			"message" => "No data found!"
		];
		switch($action){
			case "getConfigurstions":
				$product_id = $this->input->post("product_id");
				$configs = $this->product->getDateConfigs($this->session->user_id,$product_id);
				$response = (object)[
					"status" => true,
					"message" => "Successfully Fetched!",
					"configs" => $configs
				];
			break;
			default: $response = (object)[
				"status" => false,
				"message" => "Invalid Request!"
			];
		}
		echo json_encode($response);
		return;
	}
	#Getting Order ITEMS
	public function getOrderItems(){
		$txn_id = $this->input->post("txn_id");
		$response = $this->subscription->loadOrderProducts($txn_id);
		echo json_encode($response);
	}
	# Geting User Orders history
	public function getOrderHistory(){
		$user_id = $this->env->user_id;
		$reference = "subscription_history";
		if(empty($user_id)){
			echo json_encode([
				"status" => false,
				"message" => "Unauthorized Access!"
			]);
			return;
		}
		$subscription = $this->subscription->getSubscription(["user_id" => $user_id]);
		$condition = ["order_id" => $subscription->order_id];
		$dateRange = $this->input->post("daterange");
		if(!empty($dateRange)){
			$ranges = explode(" - ",$dateRange);
			$condition["delivery_date >="] = $ranges[0];
			$condition["delivery_date <="] = $ranges[1];
		}else{
			$condition["delivery_date >="] = date("Y-m-d",strtotime("-1 months"));
			$condition["delivery_date <="] = date("Y-m-d");
		}

		$orders = $this->subscription->populateTable($reference,$condition);
		$data = array();
		foreach($orders as $order){
			$items = json_decode($order->items,true);
			$row = array();
			$row["details"] = "<span></span>";
			$row['txn_id'] = $order->txn_id;
			$row['total_items'] = count($items);
			$row['delivery_charge'] = $order->delivery_charge;
			$row['total_amount'] = $order->total_amount;
			$row['delivery_date'] = date("d M, Y",strtotime($order->delivery_date));
			array_push($data,$row);
		}
		$total = $this->subscription->count_all($reference,$condition);
		$filtered = $this->subscription->count_filtered($reference,$condition);
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $total,
			"recordsFiltered" => $filtered,
			"data" => $data,
		);
		echo json_encode($output);
	}

	# Handle for user account
	public function myAccount(){
		$action = $this->input->post("action");
		switch($action){
			case "isLoggedIn":
				$mobile = $this->input->post("mobile");
				$password = $this->input->post("password");
				$response = $this->user->login($mobile,$password);
				echo json_encode($response);
			break;
			# Login
			case "doLogin":
				$mobile = $this->input->post("mobile");
				$password = $this->input->post("password");
				$response = $this->user->login($mobile,$password);
				echo json_encode($response);
			break;
			case "signUp":
				$subaction = $this->input->post("subaction");
				switch($subaction){
					case "step_1":
						$mobile = $this->input->post("mobile");
						$email = $this->input->post("email");
						$password = $this->input->post("password");
						if(!$this->user->isExist(["mobile_number"=>$mobile])){
							$user = [
								"mobile_number" => $mobile,
								"email_id" => $email,
								"password" => $password
							];
							$response = $this->user->register($user);
						}
					break;
					case "step_2":

					break;
					default:
				}
			break;
			default: echo json_encode(array("status"=> false,"message"=>"Invalid Action!"));
		}
	}

}
