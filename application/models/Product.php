<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Model{
	# Default constructor
	public function __construct(){
		parent::__construct();
		$this->load->model(array("stringSearch"));
	}
	
	# Getting product by seourls
	public function getByUrl($seourls){
		$this->db->select("product_id")
		->from("bb_products")
		->where("seourls",$seourls);
		return $this->db->get()->row();
	}
	
	# Getting the product details
	public function get($product_id){
		$this->db->select("bosp.*,bp.product_name, bp.product_mrp,CONCAT(bp.quantity,bp.unit) AS unit,bp.seourls,bp.product_description,bp.product_brand,bpi.product_image_url")
		->from("bb_ord_subs_product bosp")
		->join("bb_products bp","bosp.product_id = bp.product_id","inner")
		->join("bb_product_images bpi","bosp.product_id = bpi.product_id AND bpi.is_default = 1","left")
		->where("bosp.product_id",$product_id);
		return $this->db->get()->row();
	}
	
	# Getting products according to area_id or all
	public function getProducts($user_id = null,$area_id = null,$category_id = null,$index=0,$limit=1000){
		$condition = ($area_id) ? "FIND_IN_SET('{$area_id}',bosp.serving_areas)" : "1=1";
		$condition .= ($category_id) ? " AND bosp.category = '{$category_id}'" : " AND 1=1";
		$now = date("Y-m-d");
		$sql = "SELECT bosp.id,
				bosp.product_id,
				boscat.category_name,
				boscat.category_id,
				TIME_FORMAT(bosp.cutoff_time,'%H:%i') as cutoff_time,
				bp.product_name,
				bp.product_mrp,
				bosp.product_price,
				bp.quantity,
				bp.unit,
				bp.seourls,
				bpi.product_image_url,
				IF(bosi.product_id,1,0) AS is_subscribed,
				IF(bosc.product_id, 1, 0) AS in_cart
			FROM bb_ord_subs_product bosp
			INNER JOIN bb_ord_subs_category boscat ON(bosp.category = boscat.category_id)
			LEFT JOIN bb_products bp USING(product_id)
			LEFT JOIN bb_ord_subscription bos ON(bos.user_id = '{$user_id}')
			LEFT JOIN bb_ord_subs_cart bosc ON bp.product_id = bosc.product_id AND bosc.user_id = '{$user_id}'
			LEFT JOIN bb_ord_subs_item bosi
				ON(bosp.product_id = bosi.product_id AND bos.order_id = bosi.order_id AND bosi.end_date >= '{$now}')
			LEFT JOIN bb_product_images bpi ON bosp.product_id = bpi.product_id AND bpi.is_default = '1'
			WHERE {$condition} GROUP BY bosp.id ORDER BY bosp.rank ASC
			LIMIT {$index}, {$limit}";
		return $this->db->query($sql)->result();
	}
	
	# Getting subscription days for the product
	public function getDateConfigs($user_id = null,$product_id = null){
		$sql = "SELECT 
			bosi.date_config,
			bosi.pattern,
			bosi.pattern_value
		FROM bb_ord_subs_item bosi
		LEFT JOIN bb_ord_subscription bos ON bosi.order_id = bos.order_id
		WHERE bos.user_id = '{$user_id}' AND bosi.product_id = '{$product_id}'";
		return $this->db->query($sql)->row();
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
	# Getting categories according to area_id or all
	public function getCategories($area_id = null){
		$condition = ($area_id) ? "FIND_IN_SET('{$area_id}',bosp.serving_areas)" : "1=1";
		$sql = "SELECT 
			bosc.category_id,
			bosc.category_url,
			bosc.image_url,
			bosc.category_name, 
			count(product_id) as product_count 
		FROM bb_ord_subs_product bosp 
		INNER JOIN bb_ord_subs_category bosc ON(bosp.category = bosc.category_id)
		WHERE {$condition} GROUP BY bosp.category";
		return $this->db->query($sql)->result();
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
		$words = explode(" ",$term);
		$string = array_map(function(&$word){
			return "+".$word."*";
		},$words);
		$term = implode(" ",$string);
		$condition = ($this->session->area_id) ? "FIND_IN_SET('{$this->session->area_id}',bosp.serving_areas)" : "1=1";
		$condition .= " AND MATCH(bp.product_name) AGAINST('{$term}' IN BOOLEAN MODE)";
		$iconUrl = "https://d2gxays8f387d8.cloudfront.net/prodstore/productimg_thumbs_50_50/";
		$sql = "SELECT bosp.*, boscat.category_name, bp.product_name, bp.product_mrp,CONCAT(bp.quantity,bp.unit) as unit, bp.seourls,CONCAT('{$iconUrl}',bpi.product_image_url) as product_icon FROM bb_ord_subs_product bosp INNER JOIN bb_products bp USING(product_id) INNER JOIN bb_ord_subs_category boscat ON bosp.category = boscat.category_id
			LEFT JOIN bb_product_images bpi ON bosp.product_id = bpi.product_id AND bpi.is_default = 1
		WHERE {$condition}
		ORDER BY MATCH(bp.product_name) AGAINST('{$term}' IN BOOLEAN MODE) DESC,bosp.rank ASC";
		$products =  $this->db->query($sql)->result();
		if(!empty($filter)){
			$products = $this->stringSearch->matchings($products,$filter);
		}
		return $products;
	}
	
	public function filterSearchProducts($options){
		$condition = ($this->session->area_id) ? "FIND_IN_SET('{$this->session->area_id}',bosp.serving_areas)" : "1=1";
		if(!empty($options['category'])){
			$condition .= " AND boscat.category_url = '{$options['category']}'";
		}
		$order_by = "ORDER BY bosp.rank ASC";
		if(strtolower($options['term']) != "" && strtolower($options['term']) != "all"){
			$words = explode(" ",$options['term']);
			$string = array_map(function(&$word){
				return "+".$word."*";
			},$words);
			$term = implode(" ",$string);
			
			$condition .= " AND MATCH(bp.product_name) AGAINST('{$term}' IN BOOLEAN MODE)";
			$order_by .= ", MATCH(bp.product_name) AGAINST('{$term}' IN BOOLEAN MODE) DESC, MATCH(boscat.category_name) AGAINST('{$term}' IN BOOLEAN MODE) DESC";
		}
		$user_id = $this->session->user_id;
		
		$now = date("Y-m-d");
		$sql = "SELECT bosp.id,
				bosp.product_id,
				boscat.category_name,
				boscat.category_url,
				boscat.category_id,
				TIME_FORMAT(bosp.cutoff_time,'%H:%i') as cutoff_time,
				bp.product_name,
				bp.product_mrp,
				bosp.product_price,
				CONCAT(bp.quantity,bp.unit) AS unit,
				bp.seourls,
				bpi.product_image_url,
				IF(bosi.product_id,1,0) AS is_subscribed,
				IF(bosc.product_id, 1, 0) AS in_cart
			FROM bb_ord_subs_product bosp
			INNER JOIN bb_ord_subs_category boscat ON(bosp.category = boscat.category_id)
			LEFT JOIN bb_products bp USING(product_id)
			LEFT JOIN bb_ord_subscription bos ON(bos.user_id = '{$user_id}')
			LEFT JOIN bb_ord_subs_cart bosc ON bp.product_id = bosc.product_id AND bosc.user_id = '{$user_id}'
			LEFT JOIN bb_ord_subs_item bosi
				ON(bosp.product_id = bosi.product_id AND bos.order_id = bosi.order_id AND bosi.end_date >= '{$now}')
			LEFT JOIN bb_product_images bpi ON bosp.product_id = bpi.product_id AND bpi.is_default = '1'
			WHERE {$condition} GROUP BY bosp.id {$order_by}";
		return $this->db->query($sql)->result();
	}
	
	public function loadSearches($options){
		$products = $this->filterSearchProducts($options);
		array_walk($products,function(&$product){
			if($product->is_subscribed){
				$product->date_configs = $this->getDateConfigs($this->session->user_id,$product->product_id);
				$product->date_configs->date_config = json_decode($product->date_configs->date_config,true);
				$product->date_configs->pattern_value = ($product->date_configs->pattern == 'weekdays')
					? json_decode($product->date_configs->pattern_value,true) : $product->date_configs->pattern_value;
			}
		});
		$aggregations = $this->stringSearch->aggregate(["category_name","category_url","category_id"],$products);
		
		$response = (object)[
			"term" => $options['term'],
			"hits" => count($products),
			"products" => $products,
			"aggregations" => $aggregations
		];
		return $response; 
	}
}