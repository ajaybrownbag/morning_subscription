<?php
defined('BASEPATH') OR exit('No direct script access allowed');

#===============================================
#Ajax request handlers
$route['ajax/search_suggestions'] = "ajax/userAction";
$route['ajax/load_category_products'] = "ajax/userAction";
$route['ajax/doLogin'] = "ajax/myAccount";


$route['product-details/(:any)'] = 'home/productDetails/$1';
$route['my-cart'] = 'home/myCart';
$route['active-subscription'] = 'home/activeSubscription';
$route['subscription-history'] = 'home/subscriptionHistory';
$route['search-results'] = 'search';
$route['logout'] = 'login/logout';
$route['default_controller'] = 'home';

$route['404_override'] = 'home/error';
$route['translate_uri_dashes'] = FALSE;
