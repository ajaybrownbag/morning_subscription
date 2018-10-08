<?php
defined('BASEPATH') OR exit('No direct script access allowed');

#==================================================================
#Ajax request handlers
$route['ajax/my_orders'] =			"ajax/getOrderHistory";
$route['ajax/order_items'] =			"ajax/getOrderItems";
$route['ajax/search_suggestions'] =			"ajax/userAction";
$route['ajax/load_category_products'] =		"ajax/userAction";
$route['ajax/load_more_search_results'] =	"ajax/userAction";
$route['ajax/filter_category_search'] =		"ajax/userAction";
$route['ajax/check_location'] =				"ajax/userAction";
$route['ajax/set_location'] =				"ajax/userAction";
$route['ajax/product_details'] =			"ajax/productActions";
$route['ajax/doLogin'] =					"ajax/myAccount";
$route['ajax/isLogin'] =					"ajax/myAccount";
#==================================================================
$route['product-details/(:any)'] = 			"home/productDetails/$1";
$route['my-cart'] = 						"home/myCart";
$route['active-subscription'] =				"home/activeSubscription";
$route['subscription-history'] = 			"home/subscriptionHistory";
$route['search-results'] = 					"search";
$route['logout'] = 							"login/logout";
$route['default_controller'] = 				"home";
#==================================================================
$route['404_override'] = 					"home/notFound";
$route['translate_uri_dashes'] = 			FALSE;
