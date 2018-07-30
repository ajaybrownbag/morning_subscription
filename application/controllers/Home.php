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
					$product->date_configs = $this->product->getDateConfigs($user_id,$product->product_id);
					$product->date_configs->date_config = json_decode($product->date_configs->date_config,true);
					$product->date_configs->pattern_value = ($product->date_configs->pattern == 'weekdays')
					? json_decode($product->date_configs->pattern_value,true) : $product->date_configs->pattern_value;
				}else{
					$product->date_configs = (object)array();
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
			$this->notFound();
		}
	}
	public function myCart(){
		$this->load->view('my-cart');
	}
	public function activeSubscription(){
		$user_id = $this->env->user_id;
		if(empty($user_id)){
			$this->notFound();
			return;
		}else{
			$subscription = $this->subscription->get($user_id);
		}
		$this->load->view('active-subscription',array("subscription" => $subscription));
	}
	public function subscriptionHistory(){
		$this->load->view('subscription-history');
	}
	public function notFound(){
		$this->load->view("errors/html/error_404");
	}
}
