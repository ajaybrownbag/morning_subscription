<?php
defined('BASEPATH') OR exit('No direct script access allowed');

#===============================================
#Ajax request handlers
$route['ajax/search_suggestions'] = "ajax/userAction";


$route['product-details/(:any)'] = 'home/productDetails/$1';
$route['my-cart'] = 'login/myCart';
$route['active-subscription'] = 'login/activeSubscription';
$route['subscription-history'] = 'login/subscriptionHistory';
$route['search-results'] = 'login/searchResults';
$route['default_controller'] = 'home';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
