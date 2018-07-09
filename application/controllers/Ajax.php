<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {
	#============================================================
	# Default Constructor
	public function __construct(){
		parent::__construct();
		$this->load->model(array("product","stringSearch"));
		#Validate is ajax request
		if(!$this->input->is_ajax_request()){
			exit('Unautherized Access!');
		}
	}
	
	#============================================================
	# Handle all ajax requests
	public function userAction(){
		$action = $this->input->post("action");
		switch($action){
			#Product search 
			case "searchProduct":
				$category = $this->input->post("category");
				$term = $this->input->post("term");
				$filter = !empty($category) ? array("category" => $category) : null;
				$products = $this->product->search($term,$filter);
				echo json_encode($products);
			break;
			
			#getting produc suggestions while searching
			case "getSuggestions":
				$term = $this->input->post("term");
				$products = $this->product->suggestions(trim($term));
				echo json_encode(array_values($products));
			break;
			
			#getting products for sliders
			case "loadMoreProducts":
				$index = $this->input->post("index");
				$category = $this->input->post("categroy");
				$limit = 6;
				$options = ["index" => $index, "category" => $category, "limit" => $limit];
				$products = $this->product->loadMore($options);
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
					$product->days_details = ($product->is_subscribed) 
						? $this->product->getDaysDetails($user_id,$product->product_id)
						: (object)array();
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