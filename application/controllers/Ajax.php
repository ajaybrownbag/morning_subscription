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
			
			
			
			
			#Invalidate user action if not found
			default: echo json_encode(array("status" => false, "message" => "Invalid Action"));
		}
		return;
	}
	
	
	
	
	
}