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
		$this->db->select("bosp.*,bp.product_name,bp.product_short_name, bp.product_mrp,CONCAT(bp.quantity,bp.unit) AS unit,bp.seourls,bp.product_description,bp.product_brand,bpi.product_image_url")
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
				bp.product_short_name,
				bp.product_mrp,
				bosp.product_price,
				bp.quantity,
				bp.unit,
				bp.seourls,
				IF(bosi.product_id,1,0) AS is_subscribed,
				IF(bosc.product_id, 1, 0) AS in_cart
			FROM bb_ord_subs_product bosp
			INNER JOIN bb_ord_subs_category boscat ON(bosp.category = boscat.category_id)
			LEFT JOIN bb_products bp USING(product_id)
			LEFT JOIN bb_ord_subscription bos ON(bos.user_id = '{$user_id}')
			LEFT JOIN bb_ord_subs_cart bosc ON bp.product_id = bosc.product_id AND bosc.user_id = '{$user_id}'
			LEFT JOIN bb_ord_subs_item bosi
				ON(bosp.product_id = bosi.product_id AND bos.order_id = bosi.order_id AND bosi.end_date >= '{$now}')
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
	
	#parsing date wise configurations
	public function parseProductConfigs($date,$productConfigs){
		$configs = json_decode($productConfigs);
		$configuration = stdClass;
		if(!empty($configs)){
			array_walk($configs,function($config)use($date,&$configuration){
				if(strtotime($date) == strtotime($config->date)){
					$configuration = $config;
				}
			});
		}
		return $configuration;
	}
	
	# Getting single 
	public function getCategory($filter){
		$column = key($filter);
		$value = $filter[$column];
		$condition = "{$column} = '{$value}'";
		$sql = "SELECT 
			category_id,
			category_url,
			image_url,
			category_name
		FROM bb_ord_subs_category
		WHERE {$condition}";
		return $this->db->query($sql)->row();
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
			'table' => "(SELECT bosp.*, bp.product_name, bp.product_short_name, bp.product_mrp,CONCAT(bp.quantity,bp.unit) as unit, bp.seourls FROM bb_ord_subs_product bosp INNER JOIN bb_products bp USING(product_id))temp",
			"columns" => array("product_id","product_name","category","product_mrp","product_price","unit","seourls","product_image_url"),
			"target" => "product_name",
			"string" => $term
		);
		$products = $this->stringSearch->search($options,"desc",300);
		if(!empty($filter)){
			$products = $this->stringSearch->matchings($products,$filter);
		}
		array_walk($products, function(&$product){
			$product->product_image_url = $this->getImageName($product->product_id);
		});
		return $products;
	}
	public function suggestions($term,$filter = null){
		$init_term = $term;
		$words = explode(" ",$term);
		$string = array_map(function(&$word){
			return "+".$word."*";
		},$words);
		$term = implode(" ",$string);
		$condition = ($this->session->area_id) ? "FIND_IN_SET('{$this->session->area_id}',bosp.serving_areas)" : "1=1";
		$condition .= " AND (MATCH(bp.product_name) AGAINST('{$term}' IN BOOLEAN MODE) OR MATCH(boscat.category_name) AGAINST('{$term}' IN BOOLEAN MODE))";
		$iconUrl = "https://d2gxays8f387d8.cloudfront.net/prodstore/productimg_thumbs_50_50/";
		$sql = "SELECT bosp.*, boscat.category_name, bp.product_name,bp.product_short_name, bp.product_mrp,CONCAT(bp.quantity,bp.unit) as unit, bp.seourls FROM bb_ord_subs_product bosp INNER JOIN bb_products bp USING(product_id) INNER JOIN bb_ord_subs_category boscat ON bosp.category = boscat.category_id
		WHERE {$condition}
		ORDER BY MATCH(boscat.category_name) AGAINST('{$term}' IN BOOLEAN MODE) DESC, MATCH(bp.product_name) AGAINST('{$term}' IN BOOLEAN MODE) DESC, bosp.rank ASC LIMIT 10";
		$products =  $this->db->query($sql)->result();
		if(!empty($filter)){
			$products = $this->stringSearch->matchings($products,$filter);
		}
		array_walk($products,function(&$product)use($iconUrl){
			$product->product_icon = $iconUrl.$this->getImageName($product->product_id);
		});
		$response = [];
		foreach($products as $product){
			$product->type = 'product';
			array_push($response,$product);
		}
		
		return $response;
	}
	
	public function filterSearchProducts($options){
		$condition = ($this->session->area_id) ? "FIND_IN_SET('{$this->session->area_id}',bosp.serving_areas)" : "1=1";
		if(!empty($options['category'])){
			$condition .= " AND boscat.category_url = '{$options['category']}'";
		}
		$order_by = "ORDER BY bosp.rank ASC, bosp.id ASC";
		if(strtolower($options['term']) != "" && strtolower($options['term']) != "all"){
			$words = explode(" ",$options['term']);
			$string = array_map(function(&$word){
				return "+".$word."*";
			},$words);
			$term = implode(" ",$string);
			
			$condition .= " AND (MATCH(bp.product_name) AGAINST('{$term}' IN BOOLEAN MODE) OR MATCH(boscat.category_name) AGAINST('{$term}' IN BOOLEAN MODE))";
			$order_by = "ORDER BY MATCH(boscat.category_name) AGAINST('{$term}' IN BOOLEAN MODE) DESC, MATCH(bp.product_name) AGAINST('{$term}' IN BOOLEAN MODE) DESC, bosp.rank ASC, bosp.id ASC";
		}
		
		if(isset($options['exceptProduct'])){
			$condition .= " AND bp.product_id NOT IN({$options['exceptProduct']})";
		}
		
		$limit = "";
		if($options['limit']){
			$limit .= "LIMIT {$options['offset']},{$options['limit']}";
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
				bp.product_short_name,
				bp.product_mrp,
				bosp.product_price,
				CONCAT(bp.quantity,bp.unit) AS unit,
				bp.seourls,
				IF(bosi.product_id,1,0) AS is_subscribed,
				IF(bosc.product_id, 1, 0) AS in_cart
			FROM bb_ord_subs_product bosp
			INNER JOIN bb_ord_subs_category boscat ON(bosp.category = boscat.category_id)
			INNER JOIN bb_products bp ON(bosp.product_id = bp.product_id)
			LEFT JOIN bb_ord_subscription bos ON(bos.user_id = '{$user_id}')
			LEFT JOIN bb_ord_subs_cart bosc ON bp.product_id = bosc.product_id AND bosc.user_id = '{$user_id}'
			LEFT JOIN bb_ord_subs_item bosi
				ON(bosp.product_id = bosi.product_id AND bos.order_id = bosi.order_id AND bosi.end_date >= '{$now}')
			WHERE {$condition} GROUP BY bosp.product_id {$order_by} {$limit}";
		return $this->db->query($sql)->result();
	}
	
	public function loadSearches($options,$aggr = false){
		$products = $this->filterSearchProducts($options);
		array_walk($products,function(&$product){
			$product->product_image_url = $this->getImageName($product->product_id);
			if($product->is_subscribed){
				$product->date_configs = $this->getDateConfigs($this->session->user_id,$product->product_id);
				$product->date_configs->date_config = json_decode($product->date_configs->date_config,true);
				$product->date_configs->pattern_value = ($product->date_configs->pattern == 'weekdays')
					? json_decode($product->date_configs->pattern_value,true) : $product->date_configs->pattern_value;
			}
		});
		$aggregations = [];
		
		if(!empty($products) && $aggr){
			$aggregations = $this->getCategoryAggregations($options);
		}
		$total_hits = 0;
		array_walk($aggregations,function($aggr)use(&$total_hits){$total_hits+=$aggr->hits;});
		usort($aggregations,function($a,$b){return ($a->hits < $b->hits) ? +1 : -1;});
		$response = (object)[
			"filters" => (object)[
				"term" => $options['term'],
				"type" => $options['category']
			],
			"hits" => $total_hits,
			"products" => $products,
			"aggregations" => $aggregations
		];
		return $response; 
	}
	
	#getting category aggregations
	public function getCategoryAggregations($options){
		$condition = ($this->session->area_id) ? "FIND_IN_SET('{$this->session->area_id}',bosp.serving_areas)" : "1=1";
		$order_by = "ORDER BY bosp.rank ASC";
		if(strtolower($options['term']) != "" && strtolower($options['term']) != "all"){
			$words = explode(" ",$options['term']);
			$string = array_map(function(&$word){
				return "+".$word."*";
			},$words);
			$term = implode(" ",$string);
			$condition .= " AND (MATCH(bp.product_name) AGAINST('{$term}' IN BOOLEAN MODE) OR MATCH(boscat.category_name) AGAINST('{$term}' IN BOOLEAN MODE))";
			$order_by .= ", MATCH(bp.product_name) AGAINST('{$term}' IN BOOLEAN MODE) DESC, MATCH(boscat.category_name) AGAINST('{$term}' IN BOOLEAN MODE) DESC";
		}
		
		$user_id = $this->session->user_id;
		$now = date("Y-m-d");
		
		$sql = "SELECT bosp.id,
			COUNT(DISTINCT(bosp.product_id)) AS hits,
			boscat.category_name,
			boscat.category_url,
			boscat.category_id,
			boscat.image_url
		FROM bb_ord_subs_product bosp
		INNER JOIN bb_ord_subs_category boscat ON(bosp.category = boscat.category_id)
		LEFT JOIN bb_products bp ON(bosp.product_id = bp.product_id)
		LEFT JOIN bb_ord_subscription bos ON(bos.user_id = '{$user_id}')
		WHERE {$condition} GROUP BY boscat.category_id {$order_by}";
		return $this->db->query($sql)->result();
	}
	
	public function getImageName($product_id){
		$sql = "SELECT product_image_url FROM bb_product_images WHERE product_id = '{$product_id}' AND is_default = 1";
		$image = $this->db->query($sql)->row();
		return (!empty($image)) ? $image->product_image_url : "";
	}
}
