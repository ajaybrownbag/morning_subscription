<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model(array("product","user"));
		// if(!$this->user->isLoggedIn()){
			// redirect('/', 'refresh');
			// return;
		// }
	}
	public function index(){
		$categories = $this->product->getCategories();
		array_walk($categories,function(&$category){
			$category->products = $this->product->getByCategory($category->category,10);
		});
		$this->load->view('home',array("categories" => $categories));
	}

	public function productDetails($url){
		$product_id = $this->product->getIdByUrl($url);
		$details = $this->product->get($product_id);
		$this->load->view('product-details',array("details" => $details));
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

	
}
