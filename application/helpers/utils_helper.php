<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
function dump($data=null){
	ob_start();
	var_dump($data);
	$content = ob_get_clean();
	file_put_contents("./dumper.log", $content.PHP_EOL , FILE_APPEND | LOCK_EX);
}

function calculateDiscount($mrp,$price){
	$discount = number_format((100-$price*100/$mrp), 2, '.', '');
	return (ceil($discount) == intval($discount)) ? intval($discount) : $discount;
}