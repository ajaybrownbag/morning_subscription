<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model(array("product","user"));
	}
	
	public function index(){
		$user_id = (!$this->session->has_userdata('user_id')) ? $this->session->user_id : null;
		$term = $this->input->post_get("q");
		$term = ( $term != 'all' ) ? $term : "";
		$this->load->view('search-results');
	}

	public function searchResults(){
		$this->load->view('search-results');
	}

	
}
