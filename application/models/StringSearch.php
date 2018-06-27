<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StringSearch extends CI_Model{

	# Default Constructor
	public function __construct() {
        parent::__construct();
    }
	/*=====================================================
	$options = array(
		'table' => "table_name",
		"columns" => array(col1,col2,col3..),
		"target" => "target column to match",
		"string" => "String..."
	);
	========================================*/
	public function search($options,$dir="desc",$limit=20000, $exact_match = false){
		$table = $options['table'];
		if(is_array($options['target'])){
			foreach($options['target'] as $target){
				if(!in_array($target,$options['columns'])) array_unshift($options['columns'],$target);
			}
		}elseif(!empty($options['target'])){
			if(!in_array($options['target'],$options['columns'])) array_unshift($options['columns'],$options['target']);
		}else{
			return array("status" => false, "message" => "Target not defined!");
		}
		$columns = implode(",",$options['columns']);
		$string = preg_replace('/[^\p{L}\p{N}\s]/u', '', $options['string']);
		#splitting string to word and sort array
		$string = preg_replace('/\s+/', ' ', $string);
		$words = explode(" ",$string);
		$words = $this->sortByLength($words, $dir);
		$word = array_shift($words);
		$like_stmts = array();
		$target_columns = array();
		if(is_array($options['target'])){
			foreach($options['target'] as $target){
				$like_stmts[] = ($exact_match) ? "{$target} RLIKE \"[[:<:]]{$word}[[:>:]]\"" : "{$target} LIKE \"%{$word}%\"";
				$target_columns[] = $target;
			}
		}elseif(!empty($options['target'])){
			$like_stmts[] = ($exact_match) ? "{$options['target']} RLIKE \"[[:<:]]{$word}[[:>:]]\"" : "{$options['target']} LIKE \"%{$word}%\"";
			$target_columns[] = $options['target']; 
		}
		
		$like_query = implode(" OR ",$like_stmts);
		$results = $this->db->query("SELECT {$columns} FROM {$table} WHERE {$like_query} LIMIT {$limit}")->result();
		if(empty($results)) return array();
		$response = ($exact_match) ? $this->exactFilter($results,$words,$target_columns) : $this->filter($results,$words,$target_columns);
		return $response;
	}
	
	private function exactFilter($array, $words, $targets){
		if(empty($words)) return $array;
		$word = strtolower(array_shift($words));
		$matching = array_filter($array, function ($row) use($word,$targets){
			$status = false;
			foreach($targets as $target){
				$col = strtolower($row->$target);
				$str = preg_replace('/[^\p{L}\p{N}\s]/u', '', $col);
				$str = preg_replace('/\s+/', ' ', $str);
				$expression = '/\b(?:' . $word . ')\b/i';
				if (preg_match($expression, $str)) {
					$status = true;
					break;
				}
			}
			
			return $status;
		});
		return $this->filter($matching,$words,$targets);
	}
	
	private function filter($array, $words, $targets){
		if(empty($words)) return $array;
		$word = strtolower(array_shift($words));
		$matching = array_filter($array, function ($row) use($word,$targets){
			$status = false;
			foreach($targets as $target){
				$col = strtolower($row->$target);
				$str = preg_replace('/[^\p{L}\p{N}\s]/u', '', $col);
				$str = preg_replace('/\s+/', ' ', $str);
				$pos = strpos($str, $word);
				if( $pos !== false ){
					$status = true;
					break;
				}
			}
			
			return $status;
		});
		return $this->filter($matching,$words,$targets);
	}
	
	#==========================================
	# Sorting Directions
	private function asc($a,$b){
		return strlen($a) - strlen($b);
	}
	private function desc($a,$b){
		return strlen($b) - strlen($a);
	}
	#------------------------------------------
	
	#==========================================
	#sorting the words based on length
	private function sortByLength($array,$dir="desc"){
		switch($dir){
			case "asc":
				usort($array, array('StringSearch',$dir));
			break;
			case "desc":
				usort($array, array('StringSearch',$dir));
			break;
			default:
		}
		return $array;
	}
	
	public function matchings($data,$options){
		$matching = array_filter($data,function($row) use($options){
			$status = true;
			foreach($options as $key => $val){
				$status = ($row->$key != $val) ? false : $status;
			}
			return $status;
		});
		return $matching;
	}
}
