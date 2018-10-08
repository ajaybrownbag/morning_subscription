<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model(array("product","user","stringSearch"));
	}
	
	public function index(){
		$user_id = (!$this->session->has_userdata('user_id')) ? $this->session->user_id : null;
		$category = $this->input->post_get("type");
		$term = $this->input->post_get("q");
		if(empty($term)){
			$this->notFound();
			return;
		}
		
		$options = [
			"term" => trim($term), 
			"category" => $category,
			"limit" => 20, 
			"offset" => 0
		];
		$response = $this->product->loadSearches($options,true);
		$this->load->view('search-results',["response" => $response]);
	}

	public function notFound(){
		$this->load->view("errors/html/error_404");
	}
}
