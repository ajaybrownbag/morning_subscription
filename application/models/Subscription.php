<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscription extends CI_Model{
	
	public function __construct(){
		parent::__construct();
		
	}
	
	# Getting serving areas
	public function getAreas($city_id = null){
		$condition = ($city_id) ? "bas.city_id = '{$city_id}'" : "1=1";
		$this->db->query("SELECT DISTINCT(boss.area_id) AS area_id,
				bas.area_name,
				boss.zipcode
			FROM bb_ord_subs_society boss
			LEFT JOIN bb_area_sector bas USING(area_id)
			WHERE {$condition}");
		$areas = $this->db->get()->result();
		
        return $areas;
	}
	
	# Getting societies according to area_id or all
	public function getSocieties($area_id = null){
		$condition = ($area_id) ? "area_id  = '{$area_id}'" : "1=1";
		$sql = "SELECT * FROM bb_ord_subs_society boss where {$condition}";
		$this->db->query($sql);
		$societies = $this->db->get()->result();
		return $societies;
	}
	
	# Getting societies according to area_id or all
	public function getBuildings($society_id = null){
		$condition = ($society_id) ? "society_id  = '{$society_id}'" : "1=1";
		$sql = "SELECT * FROM bb_ord_subs_building where {$condition}";
		$this->db->query($sql);
		$buildings = $this->db->get()->result();
		return $buildings;
	}
	
	
	public function userCart($user_id = null){
		if(empty($user_id)) return array();
		$products = $this->db->get_where("bb_ord_subs_cart",array("user_id" => $user_id))->result();
		$cartItems = array();
		array_walk($products, function($product)use(&$cartItems){
			$info = $this->product->get($product->product_id);
			$info->quantity = $product->quantity;
			array_push($cartItems, $info);
		});
		return $cartItems;
	}
}
