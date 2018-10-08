<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model(array("subscription","product","user"));
	}

	public function index(){
		$topSellingProducts = $this->topSellingsProducts();
		$offerProducts = $this->offerProducts();
		$data = array(
			"topSellingProducts" => $topSellingProducts,
			"offerProducts" => $offerProducts
		);
		$this->load->view('home',$data);
	}

	public function topSellingsProducts(){
		$user_id = $this->env->user_id;
		$area_id = $this->env->area_id;
		$topSellingProducts = $this->subscription->getTopSellingProducts($user_id,$area_id,0,10);
		array_walk($topSellingProducts,function(&$product)use($user_id){
			$product->product_image_url = $this->product->getImageName($product->product_id);
			if($product->is_subscribed){
				$product->date_configs = $this->product->getDateConfigs($user_id,$product->product_id);
				$product->date_configs->date_config = json_decode($product->date_configs->date_config,true);
				$product->date_configs->pattern_value = ($product->date_configs->pattern == 'weekdays')
				? json_decode($product->date_configs->pattern_value,true) : $product->date_configs->pattern_value;
			}else{
				$product->date_configs = (object)array();
			}
		});
		return $topSellingProducts;
	}

	public function offerProducts(){
		$user_id = $this->env->user_id;
		$area_id = $this->env->area_id;
		$offerProducts = $this->subscription->getOfferProducts($user_id,$area_id,0,10);
		array_walk($offerProducts,function(&$product)use($user_id){
			$product->product_image_url = $this->product->getImageName($product->product_id);
			if($product->is_subscribed){
				$product->date_configs = $this->product->getDateConfigs($user_id,$product->product_id);
				$product->date_configs->date_config = json_decode($product->date_configs->date_config,true);
				$product->date_configs->pattern_value = ($product->date_configs->pattern == 'weekdays')
				? json_decode($product->date_configs->pattern_value,true) : $product->date_configs->pattern_value;
			}else{
				$product->date_configs = (object)array();
			}
		});
		return $offerProducts;
	}



	public function productDetails($url){
		$product = $this->product->getByUrl($url);
		if(!empty($product)){
			$details = $this->product->get($product->product_id);
			$category = $this->product->getCategory(["category_id" => $details->category]);
			$similarProducts = $this->product->loadSearches([
				"category" => $category->category_url,
				"term" => "",
				"offset" => 0,
				"limit" => 10,
				"exceptProduct" => $product->product_id
			],false);
			$this->load->view('product-details',array("details" => $details,"similarProducts" => $similarProducts->products));
		}else{
			$this->notFound();
		}
	}
	public function myCart(){
		$user_id = $this->env->user_id;
		if(empty($user_id)){
			$this->unauthorized();
			return;
		}else{
			// $subscription = $this->subscription->get($user_id);
			$this->load->view('my-cart');
		}
	}
	public function activeSubscription(){
		$user_id = $this->env->user_id;
		if(empty($user_id)){
			$this->unauthorized();
			return;
		}else{
			$subscription = $this->subscription->get($user_id);
			$this->load->view('active-subscription',array("subscription" => $subscription));
		}
	}
	public function subscriptionHistory(){
		$user_id = $this->env->user_id;
		if(empty($user_id)){
			$this->unauthorized();
			return;
		}else{
			$this->load->view('subscription-history');
		}
	}
	public function notFound(){
		$this->load->view("errors/html/error_404");
	}
	public function unauthorized(){
		redirect(base_url());
	}
}
