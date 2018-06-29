<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Model{
	# Default constructor
	public function __construct(){
		parent::__construct();
		$this->load->model(array("stringSearch"));
	}
	
	# Getting product by seourls
	public function getIdByUrl($seourls){
		$this->db->select("product_id")
		->from("bb_products")
		->where("seourls",$seourls);
		$product = $this->db->get()->result();
		return $product[0]->product_id;
	}
	
	# Getting the product details
	public function get($product_id){
		$this->db->select("bosp.*,bp.product_name, bp.product_mrp,CONCAT(bp.quantity,bp.unit) AS unit,bpi.product_image_url")
		->from("bb_ord_subs_product bosp")
		->join("bb_products bp","bosp.product_id = bp.product_id","inner")
		->join("bb_product_images bpi","bosp.product_id = bpi.product_id AND bpi.is_default = 1","left")
		->where("bosp.product_id",$product_id);
		return $this->db->get()->result()[0];
	}
	
	#getting all products
	public function getAll(){
		$this->db->select("bosp.*,bp.product_name, bp.product_mrp,CONCAT(bp.quantity,bp.unit) AS unit,bp.seourls, bpi.product_image_url")
		->from("bb_ord_subs_product bosp")
		->join("bb_products bp","bosp.product_id = bp.product_id","inner")
		->join("bb_product_images bpi","bosp.product_id = bpi.product_id AND bpi.is_default = 1","left");
		return $this->db->get()->result();
	}
	
	public function getByCategory($category,$limit=null){
		$this->db->select("bosp.*,bp.product_name, bp.product_mrp,CONCAT(bp.quantity,bp.unit) AS unit,bp.seourls, bpi.product_image_url")
		->from("bb_ord_subs_product bosp")
		->join("bb_products bp","bosp.product_id = bp.product_id","inner")
		->join("bb_product_images bpi","bosp.product_id = bpi.product_id AND bpi.is_default = 1","left")
		->where("bosp.category",$category);
		if(!empty($limit)){
			$this->db->limit($limit);
		}
		return $this->db->get()->result();
	}
	
	public function getCategories(){
		$this->db->select("category, count(product_id) as product_count")
		->from("bb_ord_subs_product")
		->group_by("category");
		return $this->db->get()->result();
	}
	
	public function search($term,$filter = null){
		$options = array(
			'table' => "(SELECT bosp.*, bp.product_name, bp.product_mrp,CONCAT(bp.quantity,bp.unit) as unit, bp.seourls,bpi.product_image_url FROM bb_ord_subs_product bosp INNER JOIN bb_products bp USING(product_id)
			LEFT JOIN bb_product_images bpi ON bosp.product_id = bpi.product_id AND bpi.is_default = 1)temp",
			"columns" => array("product_id","product_name","category","product_mrp","product_price","unit","seourls","product_image_url"),
			"target" => "product_name",
			"string" => $term
		);
		$products = $this->stringSearch->search($options,"desc",300);
		if(!empty($filter)){
			$products = $this->stringSearch->matchings($products,$filter);
		}
		
		return $products;
	}
	public function suggestions($term,$filter = null){
		$iconUrl = "https://d2gxays8f387d8.cloudfront.net/prodstore/productimg_thumbs_50_50/";
		$options = array(
			'table' => "(SELECT bosp.*, bp.product_name, bp.product_mrp,CONCAT(bp.quantity,bp.unit) as unit, bp.seourls,CONCAT('{$iconUrl}',bpi.product_image_url) as product_icon FROM bb_ord_subs_product bosp INNER JOIN bb_products bp USING(product_id)
			LEFT JOIN bb_product_images bpi ON bosp.product_id = bpi.product_id AND bpi.is_default = 1)temp",
			"columns" => array("product_id","product_name","category","product_mrp","product_price","unit","seourls","product_icon"),
			"target" => "product_name",
			"string" => $term
		);
		$products = $this->stringSearch->search($options,"desc",300);
		if(!empty($filter)){
			$products = $this->stringSearch->matchings($products,$filter);
		}
		
		return $products;
	}
	
	public function loadMore($options){
		
	}
	
}