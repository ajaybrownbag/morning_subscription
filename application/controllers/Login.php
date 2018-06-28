<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model(array("product"));
	}
	public function index(){
		$categories = $this->product->getCategories();
		$products = $this->product->getAll();
		$term = "";
		$filter = array("category" => "bread");
		$filtered = $this->product->search($term,$filter);
		$this->load->view('home',array('products'=>$products, "categories" => $categories,"filtered" => $filtered));
	}

	public function productDetails(){
		$this->load->view('product_details');
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

	
}
