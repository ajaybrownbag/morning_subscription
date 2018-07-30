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
				$products = $this->product->suggestions(trim($term));
				echo json_encode(array_values($products));
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
				#testing
				$options = [
					"term" => $term, 
					"index" => 0, 
					"category" => $category,
					"limit" => 30, 
					"offset" => 0
				];
				$response = $this->product->loadSearches($options);
				echo json_encode($response);
			break;
			
			#Invalidate user action if not found
			default: echo json_encode(array("status" => false, "message" => "Invalid Action"));
		}
		return;
	}
	
	# Handle for user account
	public function myAccount(){
		$action = $this->input->post("action");
		switch($action){
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