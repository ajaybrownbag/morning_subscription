<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model(array("product","user"));
	}
	public function index(){
		$user_id = $this->env->user_id;
		$categories = $this->product->getCategories();
		array_walk($categories,function(&$category)use($user_id){
			$category->products = $this->product->getProducts($user_id,null,$category->category_id,0,10);
			array_walk($category->products,function(&$product)use($user_id){
				if($product->is_subscribed){
					$product->days_details = $this->product->getDaysDetails($user_id,$product->product_id);
				}else{
					$product->days_details = (object)array();
				}
			});
		});
		$this->load->view('home',array("categories" => $categories));
	}

	public function productDetails($url){
		$product = $this->product->getByUrl($url);
		if(!empty($product)){
			$details = $this->product->get($product->product_id);
			$this->load->view('product-details',array("details" => $details));
		}else{
			$this->error();
		}
	}
	public function myCart(){
		$this->load->view('my-cart');
	}
	public function activeSubscription(){
		$this->load->view('active-subscription');
	}
	public function subscriptionHistory(){
		$this->load->view('subscription-history');
	}
	public function searchResults(){
		$this->load->view('search-results');
	}
	
	public function error(){
		$this->load->view("errors/html/error_404");
	}
	
}
