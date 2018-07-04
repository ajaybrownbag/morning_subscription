<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Brownbag Morning Subscription Service</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
    <link rel="shortcut icon" href="assets/img/user_favicon.png" type="image/x-icon" />
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="<?=base_url('assets/plugins/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet" />
	<link href="<?=base_url('assets/plugins/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet" />
	<link href="<?=base_url('assets/css/style.min.css');?>" rel="stylesheet" />
	<link href="<?=base_url('assets/css/style-responsive.min.css');?>" rel="stylesheet" />
	<link href="<?=base_url('assets/css/theme/orange.css');?>" id="theme" rel="stylesheet" />
	<link href="<?=base_url('assets/css/animate.min.css');?>" rel="stylesheet" />
    <link href="<?=base_url('assets/css/subscription-styles.css');?>" rel="stylesheet" />
    <link href="<?=base_url('assets/css/flickity-slider.css');?>" rel="stylesheet" />
    <link href="<?=base_url('assets/css/chosen.min.css');?>" rel="stylesheet" />
    <link href="<?=base_url('assets/plugins/daterangepicker/daterangepicker.css');?>" rel="stylesheet" />
    <link href="<?=base_url('assets/css/owl.carousel.min.css');?>" rel="stylesheet" />
    <link href="<?=base_url('assets/plugins/autocomplete/autocomplete.min.css');?>" rel="stylesheet" />
    <link href="<?=base_url('assets/plugins/autocomplete/autocomplete.themes.min.css');?>" rel="stylesheet" />
	<!-- ================== END BASE CSS STYLE ================== -->
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?=base_url('assets/plugins/pace/pace.min.js');?>"></script>
	<script> window.base_url = '<?=base_url();?>';</script>
	<!-- ================== END BASE JS ================== -->
</head>
<body class="bg-silver">
    <div id="page-container" class="fade">
        <div id="top-nav" class="top-nav">
            <div class="container">
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="#"><i class="fa fa-phone"></i> +91-7042391949</a></li>
                        <li><a href="#"><i class="fa fa-envelope"></i> help@brownbag.in</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"><b><i class="fa fa-map-marker"></i> You are shopping in :</b> Seema Apartment</a></li>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">How it works</a></li>
                        <li><a href="#">Offers</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="header" class="header">
            <div class="container">
                <div class="header-container">
                    <div class="navbar-header">
                        <button type="button" class="iconbarwidth navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <div class="header-logo">
                            <a href="http://localhost/morning_subscription/">
                                <span><img class="brand" src="<?=base_url('assets/img/icons/logo.png');?>" style="border-radius:2px; border:1px solid #666;padding:5px;height:35px;background:#0D5776"></span>
                                <span>BB<span class="text-success">Subscription</span></span>
                                <small>Morning Delivery Service</small>
                            </a>
                        </div>
                    </div>
                    <div class="header-nav">
                        <div class=" collapse navbar-collapse" id="navbar-collapse">
                            <ul class="nav headnavcolor">
                                <li class="dropdown dropdown-full-width dropdown-hover">
                                    <a href="#" data-toggle="dropdown">
                                        <i class="fa fa-bars"></i> Categories
                                        <i class="fa fa-angle-down"></i>
                                        <span class="arrow top"></span>
                                    </a>
                                    <div class="dropdown-menu p-0">
                                        <div class="dropdown-menu-container">
                                            <div class="dropdown-menu-content">
                                                <h4 class="title">Subscribe From Categories</h4>
                                                <div class="row">
                                                    <div class="col-md-2 col-sm-2 col-xs-3">
                                                        <ul class="dropdown-menu-list">
                                                            <li>
                                                                <a href="#" class="topcategory">
                                                                    <span class="iconcateg">
                                                                        <img src="assets/img/categoryimg/ghee-cooking.svg">
                                                                    </span>
                                                                    <br>
                                                                    <span class="m-t-5"> Milk</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-2 col-sm-2 col-xs-3">
                                                        <ul class="dropdown-menu-list">
                                                            <li>
                                                                <a href="#" class="topcategory">
                                                                   <span class="iconcateg">
                                                                        <img src="assets/img/categoryimg/ghee-cooking.svg">
                                                                    </span>
                                                                    <br>
                                                                    <span class="m-t-5"> Bread</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-2 col-sm-2 col-xs-3">
                                                        <ul class="dropdown-menu-list">
                                                            <li>
                                                                <a href="#" class="topcategory">
                                                                    <span class="iconcateg">
                                                                        <img src="assets/img/categoryimg/milk-and-milk.svg">
                                                                    </span>
                                                                    <br>
                                                                    <span class="m-t-5"> Egg</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-2 col-sm-2 col-xs-3">
                                                        <ul class="dropdown-menu-list">
                                                            <li>
                                                                <a href="#" class="topcategory">
                                                                   <span class="iconcateg">
                                                                        <img src="assets/img/categoryimg/ghee-cooking.svg">
                                                                    </span>
                                                                    <br>
                                                                    <span class="m-t-5"> Yogurt</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                   <div class="col-md-2 col-sm-2 col-xs-3">
                                                        <ul class="dropdown-menu-list">
                                                            <li>
                                                                <a href="#" class="topcategory">
                                                                    <span class="iconcateg">
                                                                        <img src="assets/img/categoryimg/milk-and-milk.svg">
                                                                    </span>
                                                                    <br>
                                                                    <span class="m-t-5"> Butter</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-2 col-sm-2 col-xs-3">
                                                        <ul class="dropdown-menu-list">
                                                            <li>
                                                                <a href="#" class="topcategory">
                                                                    <span class="iconcateg">
                                                                        <img src="assets/img/categoryimg/ghee-cooking.svg">
                                                                    </span>
                                                                    <br>
                                                                    <span class="m-t-5"> Cheese</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-2 col-sm-2 col-xs-3">
                                                        <ul class="dropdown-menu-list">
                                                            <li>
                                                                <a href="#" class="topcategory">
                                                                    <span class="iconcateg">
                                                                        <img src="assets/img/categoryimg/milk-and-milk.svg">
                                                                    </span>
                                                                    <br>
                                                                    <span class="m-t-5"> Panner</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="hidden-xs">
									<form action="<?=base_url("search-results");?>" method="GET" name="search_form" id="searchForm" class="topsearch">
										<input id="search_query" type="text" placeholder="Search Product" name="q" class="form-control bg-silver-lighter" />
									</form>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="header-nav">
                        <ul class="nav pull-right iconshopbag">
                            <li class="dropdown dropdown-hover">
                                <a href="#" class="header-cart" data-toggle="dropdown">
                                    <i class="fa fa-shopping-bag"></i>
                                    <span class="total"><?=count($this->env->cartItems);?></span>
                                    <span class="arrow top"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-cart p-0">
									<?php if(empty($this->env->cartItems)):?>
									<div class="cart-header">
                                        <h4 class="cart-title text-center text-warning">YOUR SUBSCRIPTION BAG IS EMPTY</h4>
                                    </div>
									<?php else:?>
									<div class="cart-header">
                                        <h4 class="cart-title">SUBSCRIPTION BAG (<?=count($this->env->cartItems);?>) </h4>
                                    </div>
                                    <div class="cart-body">
                                        <ul class="cart-item">
											<?php foreach($this->env->cartItems as $cartItem):?>
											<li>
                                                <div class="cart-item-image"><a href="<?=base_url("product-details/".$cartItem->seourls);?>"><img src="https://d2gxays8f387d8.cloudfront.net/prodstore/productimg_thumbs/<?=$cartItem->product_image_url;?>" alt="" /></a></div>
                                                <div class="cart-item-info">
                                                    <h4><a href="<?=base_url("product-details/".$cartItem->seourls);?>"><?=$cartItem->product_name;?> - <?=$cartItem->unit;?></a></h4>
                                                    <b>
														<span class="price">Price: ₹<?=$cartItem->product_price;?></span>
														<span class="quantity pull-right text-primary">Qty: <?=$cartItem->quantity;?></span>
													</b>
                                                </div>
                                                <div class="cart-item-close">
                                                    <a href="#" data-toggle="tooltip" data-title="Remove">&times;</a>
                                                </div>
                                            </li>
											<?php endforeach;?>
                                        </ul>
                                    </div>
                                    <div class="cart-footer">
                                        <div class="row row-space-10">
                                            <div class="col-xs-6">
                                                <a href="my-cart" class="btn btn-default btn-block">View Cart</a>
                                            </div>
                                            <div class="col-xs-6">
                                                <a href="checkout_cart.html" class="btn btn-blue btn-block">Checkout</a>
                                            </div>
                                        </div>
                                    </div>
									<?php endif;?>
                                </div>
                            </li>
                            <li class="divider"></li>
                            <!-- before login start -->
							<?php if(empty($this->env->user_id)):?>
							<li class="mobilescrollhide">
                                <a href="javascript:void(0);" data-toggle="modal" data-target="#signin-up">
                                    <img src="<?=base_url("assets/img/user-1.jpg");?>" class="user-img" alt="" /> 
                                    <span class="hidden-md hidden-sm hidden-xs">Login / Register</span>
                                </a>
                            </li>
							<!-- before login end -->
							<?php else:?>
							<!-- after login start -->
                            <li class="dropdown dropdown-hover afterlog mobilescrollhide">
                                <a href="javascript:void(0);" onclick="myacc_mob_boxopen()">
                                    <img src="<?=base_url("assets/img/user-1.jpg");?>" class="user-img" alt="" />
                                    <span class="hidden-md hidden-sm hidden-xs">
										<?=$this->env->userProfile->first_name;?> <?=$this->env->userProfile->last_name;?>
									</span>
                                    <span class="arrow top"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-cart p-0 loginbox animationacc" id="myacc_mobSidenav">
                                    <div class="w-100 hidden-lg hidden-md hidden-sm">
                                        <i onclick="myacc_mob_boxclose()" class="fa fa-long-arrow-right f-s-20 m-t-10 m-l-15 m-b-5-5"></i>
                                        <p class="text-center m-b-0"><span class="allicons male-icon"></span></p>
                                        <p class="text-center"><?=$this->env->userProfile->first_name;?> <?=$this->env->userProfile->last_name;?></p>
                                        <button class="btn btn-xs bg-orange-theme btn-block border-radius-0">Info</button>
                                    </div>
                                    <div class="cart-body">
                                        <ul class="cart-item">
                                            <li>
                                                <a href="<?=base_url("active-subscription");?>" class="logingiconalign">
                                                    <span class="allicons active-sub-icon"> </span>
                                                    <span class="m-l-10">Active Subscription</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?=base_url("subscription-history");?>"  class="logingiconalign">
                                                    <span class="allicons active-sub-icon"> </span>
                                                    <span class="m-l-10">Subscription History</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#"  class="logingiconalign">
                                                    <span class="allicons mywallet-icon"> </span>
                                                    <span class="m-l-10">My Wallet</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="" class="logingiconalign">
                                                    <span class="allicons logout-icon"></span>
                                                    <span class="m-l-10">Logout</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <!-- after login end -->
							<?php endif;?>
                        </ul>
                    </div>
                </div>
                <!-- mobile search -->
                <div class="header-container hidden-lg hidden-md hidden-sm">
                    <form action="<?=base_url("search-results");?>" method="GET" name="search_form">
                        <input type="text" placeholder="Search Product" name="q" class="form-control bg-silver-lighter searchwidth" autocomplete="off" id="mobile_search">
                    </form>
                    <div class="w-100 m-t-10 mobilescrollhide">
                        <p class="text-left"><b><i class="fa fa-map-marker"></i> You are shopping in:</b> Seema Apartment </p>
                    </div>
                </div>
                <!-- mobile search -->
            </div>
        </div>
		<div id="selectlocation" class="modal fade" role="dialog">
			<div class="modal-dialog locationmodalwidth">
				<div class="modal-content">
					<div class="modal-body padding0">
						<button type="button" class="close modaldismis" data-dismiss="modal">&times;</button>
						<div class="w-100">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 marginT5">
								<div class="w-100">
								   <h4 class="text-center">You are shopping in</h4>
									<hr class="hr">
								</div>
								<form action="" method="post">
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="w-100 marginT10">
										  <select class="selectcity form-control">
										  <option>Please Select City</option>
										  <option>Delhi</option>
										  </select>
										</div>
										<div class="w-100 marginT10">
										  <select class="selectarea form-control">
										  <option>Please Select Area</option>
										  <option>Dwarka Sec - 1</option>
										  <option>Dwarka Sec - 2</option>
										  </select>
										</div>
										<div class="w-100 marginT10">
										  <select class="selectsociety form-control">
										  <option>Please Select Society</option>
										  <option>MK Residencial</option>
										  <option>Seema Apartment</option>
										  </select>
										</div>
									</div>
									<div class="col-md-12 col-sm-12 col-xs-12 marginT10 m-bottom20">
										<button type="button" class="btn btn-blue btn-sm text-center btn-block">BROWSE</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php $this->load->view("common/login");?>