<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Brownbag Morning Subscription Service</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
    <link rel="shortcut icon" href="<?=base_url('assets/img/icons/favicon.png');?>" type="image/x-icon" />
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="<?=base_url('assets/plugins/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet" />
	<link href="<?=base_url('assets/plugins/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet" />
	<link href="<?=base_url('assets/css/pace/pace-theme-center-simple.css');?>" rel="stylesheet" />
	<link href="<?=base_url('assets/css/style.min.css');?>" rel="stylesheet" />
	<link href="<?=base_url('assets/css/style-responsive.min.css');?>" rel="stylesheet" />
	<link href="<?=base_url('assets/css/theme/orange.css');?>" id="theme" rel="stylesheet" />
	<link href="<?=base_url('assets/css/animate.min.css');?>" rel="stylesheet" />
	<link href="<?=base_url('assets/plugins/font-awesome/css/fa-animate.css');?>" rel="stylesheet" />
    <link href="<?=base_url('assets/css/subscription-styles.css');?>" rel="stylesheet" />
    <link href="<?=base_url('assets/css/flickity-slider.css');?>" rel="stylesheet" />
    <link href="<?=base_url('assets/plugins/daterangepicker/daterangepicker.css');?>" rel="stylesheet" />
    <link href="<?=base_url('assets/css/owl.carousel.min.css');?>" rel="stylesheet" />
    <link href="<?=base_url('assets/plugins/ui/jquery-ui.css');?>" rel="stylesheet" />
    <link href="<?=base_url('assets/plugins/autocomplete/autocomplete.min.css');?>" rel="stylesheet" />
    <link href="<?=base_url('assets/plugins/autocomplete/autocomplete.themes.min.css');?>" rel="stylesheet" />
		<link href="<?=base_url('assets/plugins/select2/css/select2.min.css');?>" rel="stylesheet" />
    <link href="<?=base_url('assets/plugins/datatables/css/dataTables.bootstrap.min.css');?>" rel="stylesheet" />
	<!-- ================== END BASE CSS STYLE ================== -->
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?=base_url('assets/plugins/jquery/jquery-1.9.1.min.js');?>"></script>
	<script src="<?=base_url('assets/plugins/jquery/jquery-migrate-1.1.0.min.js');?>"></script>
	<script src="<?=base_url('assets/plugins/bootstrap/js/bootstrap.min.js');?>"></script>
	<script src="<?=base_url('assets/plugins/pace/pace.min.js');?>"></script>
	<script> window.base_url = '<?=base_url();?>';</script>
	<style>
	  #header.affix { top: 0; width: 100%; }
	  .sticky.affix { top: 0; width: 100%; }
	  #header.affix + .affix-seperator {  padding-top: 88px; }
	</style>
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
                            <a href="<?=base_url();?>">
                                <span><img class="brand" src="<?=base_url('assets/img/icons/logo.png');?>" style="border-radius:2px; border:1px solid #666;padding:5px;height:35px;background:#0D5776"></span>
                                <span>BB<span class="text-theme-blue">Subscription</span></span>
                                <small>Morning Delivery Service</small>
                            </a>
                        </div>
                    </div>
                    <div class="header-nav">
                        <div class=" collapse navbar-collapse" id="navbar-collapse">
                            <ul class="nav headnavcolor">
                                <li class="dropdown dropdown-full-width dropdown-hover">
                                    <a href="#" data-toggle="dropdown">
                                        <i class="fa fa-qrcode"></i> Categories
                                        <i class="fa fa-angle-down"></i>
                                        <span class="arrow top"></span>
                                    </a>
                                    <div class="dropdown-menu p-0 topcategorywidth">
                                        <div class="dropdown-menu-container">
                                            <div class="dropdown-menu-content">
                                                <h4 class="title">Subscribe From Categories</h4>
                                                <div class="row overflowscroll">
																									<?php foreach($this->env->categories as $category):?>
																									<div class="col-md-3 col-sm-4 col-xs-4 category-box">
                                                        <ul class="dropdown-menu-list">
                                                            <li>
                                                                <a href="<?=base_url("search-results?q=all&type=".$category->category_url);?>" class="topcategory">
                                                                    <span class="iconcateg">
                                                                        <img src="<?=category_image($category->image_url);?>">
                                                                    </span>
                                                                    <br>
                                                                    <span class=" topcatename"> <?=$category->category_name;?></span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
																									<?php endforeach;?>
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
                                            <div class="col-xs-12">
                                                <a href="<?=base_url("my-cart");?>" class="btn btn-blue btn-block">View Cart <i class="fa fa-long-arrow-right"></i></a>
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
                                                    <span class="fa fa-dashboard"></span>
                                                    <span class="m-l-10">Active Subscription</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?=base_url("subscription-history");?>"  class="logingiconalign">
                                                    <span class="fa fa-clock-o"></span>
                                                    <span class="m-l-10">Subscription History</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?=base_url("logout");?>" class="logingiconalign">
                                                    <span class="fa fa-power-off"></span>
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
		<div class="affix-seperator"></div>
		<!--<div id="locationSelector" class="modal fade" role="dialog">-->
			<div id="locationSelector" class="custom-modal-dialog" style="display:none">
				<div class="custom-modal-content">
					<div class="custom-modal-body padding0">
						<div class="w-100">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 marginT5">
								<div class="w-100">
								   <h4 class="text-center">CHOOSE YOUR LOCATION</h4>
									<hr class="hr">
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="w-100 marginT10">
									  <select class="citySelector form-control no-radius" style="width:100%;"></select>
									</div>
									<div class="w-100 marginT10">
									  <select class="areaSelector form-control no-radius" style="width:100%;"></select>
									</div>
									<div class="w-100 marginT10">
									  <select class="societySelector form-control no-radius" style="width:100%;"></select>
									</div>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 marginT10 m-bottom20">
									<button type="button" id="locationSelectorBtn" class="btn btn-blue btn-sm text-center btn-block">START BROWSING</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<!--</div>-->
		<?php $this->load->view("common/login");?>
