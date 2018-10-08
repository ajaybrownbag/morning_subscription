<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
# Creating Dumper for the data loging
function dump($data=null){
	ob_start();
	var_dump($data);
	$content = ob_get_clean();
	file_put_contents("./dumper.log", $content.PHP_EOL , FILE_APPEND | LOCK_EX);
}

# Calculating Discount Percentage
function calculateDiscount($mrp,$price){
	$discount = number_format((100-$price*100/$mrp), 2, '.', '');
	return (ceil($discount) == intval($discount)) ? intval($discount) : $discount;
}

# Getting Pagewise Scripts
function getScripts($page = ''){
	# Getting Common Scripts
	$scripts = "
		<script src=".base_url('assets/plugins/jquery-cookie/jquery.cookie.js')."></script>
		<script src=".base_url('assets/js/apps.min.js')."></script>
		<script src=".base_url('assets/js/bootstrapValidator.min.js')."></script>
		<script src=".base_url('assets/plugins/autocomplete/autocomplete.min.js')."></script>
		<script src=".base_url('assets/plugins/ui/jquery-ui.js')."></script>
		<script src=".base_url('assets/js/bootstrap-toggle.min.js')."></script>
		<script src=".base_url('assets/plugins/select2/js/select2.min.js')."></script>
		<script src=".base_url('assets/js/common.js')."></script>
		<script src=".base_url('assets/js/Home.js')."></script>
		<script src=".base_url('assets/js/Utils.js')."></script>
		<script src=".base_url('assets/js/User.js')."></script>
	";
	$scripts .= "
		<script>
		$(document).ready(function() {
			App.init();
			Home.init();
			Utils.initLocationSelector();
			User.init();
		});
	</script>";
	# Getting Specific Scripts
	switch($page){
		case "home":
			$scripts .= "<script src=".base_url('assets/js/flickity-slider.min.js')."></script>";
			$scripts .= "<script>$(document).ready(function(){Utils.initSlider();});</script>";
		break;
		case "searchResult":
			$scripts .= "<script src=".base_url('assets/js/sticky.js')."></script>";
			$scripts .= "<script src=".base_url('assets/js/Search.js')."></script>";
			$scripts .= "<script>$(document).ready(function(){Search.init();});</script>";
		break;
		case "productDetail":
			$scripts .= "<script src=".base_url('assets/js/moment.min.js')."></script>";
			$scripts .= "<script src=".base_url('assets/plugins/daterangepicker/daterangepicker.js')."></script>";
			$scripts .= "<script src=".base_url('assets/js/flickity-slider.min.js')."></script>";
			$scripts .= "<script src=".base_url('assets/js/Product.js')."></script>";
			$scripts .= "<script>$(document).ready(function(){Utils.initSimilarSlider();Product.init();});</script>";
		break;
		case "orderHistory":
			$scripts .= "<script src=".base_url('assets/js/moment.min.js')."></script>";
			$scripts .= "<script src=".base_url('assets/plugins/daterangepicker/daterangepicker.js')."></script>";
			$scripts .= "<script src=".base_url('assets/plugins/datatables/js/jquery.dataTables.js')."></script>";
			$scripts .= "<script src=".base_url('assets/plugins/datatables/js/dataTables.bootstrap.min.js')."></script>";
			$scripts .= "<script src=".base_url('assets/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js')."></script>";

			$scripts .= "<script src=".base_url('assets/js/OrderHistory.js')."></script>";
			$scripts .= "<script>$(document).ready(function(){OrderHistory.init();});</script>";
		break;
		default:
	}
	return $scripts;
}

function category_image($image=""){
	return "https://d2gxays8f387d8.cloudfront.net/prodstore/subscription/web/category/{$image}";
}
