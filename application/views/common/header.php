<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Brownbag Morning Subscription Service</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
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
    <link href="<?=base_url('assets/js/daterangepicker/daterangepicker.css');?>" rel="stylesheet" />
    <link href="<?=base_url('assets/css/owl.carousel.min.css');?>" rel="stylesheet" />
	<!-- ================== END BASE CSS STYLE ================== -->
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?=base_url('assets/plugins/pace/pace.min.js');?>"></script>
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
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <div class="header-logo">
                            <a href="http://localhost/morning_subscription/">
                                <span><img class="brand" src="<?=base_url('assets/img/icons/logo.png');?>" style="border-radius:2px; border:1px solid #fff;padding:5px;height:35px;"></span>
                                <span>Brownbag</span>
                                <small>Morning Subscription Service</small>
                            </a>
                        </div>
                    </div>
                    <div class="header-nav">
                        <div class=" collapse navbar-collapse" id="navbar-collapse">
                            <ul class="nav headnavcolor">
                                <li class="dropdown dropdown-full-width dropdown-hover">
                                    <a href="#" data-toggle="dropdown" class="lineheight1">
                                        Category 
                                        <i class="fa fa-angle-down"></i>
                                        <span class="arrow top"></span>
                                    </a>
                                    <div class="dropdown-menu p-0">
                                        <div class="dropdown-menu-container">
                                            <div class="dropdown-menu-content">
                                                <h4 class="title">Subscribe By Category</h4>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <ul class="dropdown-menu-list">
                                                            <li><a href="product_detail.html"><i class="fa fa-fw fa-angle-right text-muted"></i> Milk</a></li>
                                                            <li><a href="product_detail.html"><i class="fa fa-fw fa-angle-right text-muted"></i> Bread</a></li>
                                                            <li><a href="product_detail.html"><i class="fa fa-fw fa-angle-right text-muted"></i> Bread</a></li>
                                                            <li><a href="product_detail.html"><i class="fa fa-fw fa-angle-right text-muted"></i> Bread</a></li>
                                                            <li><a href="product_detail.html"><i class="fa fa-fw fa-angle-right text-muted"></i> Bread</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <ul class="dropdown-menu-list">
                                                            <li><a href="product_detail.html"><i class="fa fa-fw fa-angle-right text-muted"></i> Milk</a></li>
                                                            <li><a href="product_detail.html"><i class="fa fa-fw fa-angle-right text-muted"></i> Bread</a></li>
                                                            <li><a href="product_detail.html"><i class="fa fa-fw fa-angle-right text-muted"></i> Bread</a></li>
                                                            <li><a href="product_detail.html"><i class="fa fa-fw fa-angle-right text-muted"></i> Bread</a></li>
                                                            <li><a href="product_detail.html"><i class="fa fa-fw fa-angle-right text-muted"></i> Bread</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <ul class="dropdown-menu-list">
                                                            <li><a href="product_detail.html"><i class="fa fa-fw fa-angle-right text-muted"></i> Milk</a></li>
                                                            <li><a href="product_detail.html"><i class="fa fa-fw fa-angle-right text-muted"></i> Bread</a></li>
                                                            <li><a href="product_detail.html"><i class="fa fa-fw fa-angle-right text-muted"></i> Bread</a></li>
                                                            <li><a href="product_detail.html"><i class="fa fa-fw fa-angle-right text-muted"></i> Bread</a></li>
                                                            <li><a href="product_detail.html"><i class="fa fa-fw fa-angle-right text-muted"></i> Bread</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <ul class="dropdown-menu-list">
                                                            <li><a href="product_detail.html"><i class="fa fa-fw fa-angle-right text-muted"></i> Milk</a></li>
                                                            <li><a href="product_detail.html"><i class="fa fa-fw fa-angle-right text-muted"></i> Bread</a></li>
                                                            <li><a href="product_detail.html"><i class="fa fa-fw fa-angle-right text-muted"></i> Bread</a></li>
                                                            <li><a href="product_detail.html"><i class="fa fa-fw fa-angle-right text-muted"></i> Bread</a></li>
                                                            <li><a href="product_detail.html"><i class="fa fa-fw fa-angle-right text-muted"></i> Bread</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown dropdown-hover">
                                    <a href="#" data-toggle="dropdown">
                                        Locations
                                    </a>
                                    <div class="loc-selected">M.K Apartment Dwarka-11 gdfg fdg</div>
                                </li>
                                <li> 
                                    <form action="" method="POST" name="search_form" class="topsearch">
                                        <div class="input-group">
                                            <input type="text" placeholder="Search" class="form-control bg-silver-lighter" />
                                            <span class="input-group-btn">
                                                <button class="btn bg-orange-theme" type="submit"><i class="fa fa-search"></i></button>
                                            </span>
                                        </div>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="header-nav">
                        <ul class="nav pull-right">
                            <li class="dropdown dropdown-hover">
                                <a href="my-cart" class="header-cart" data-toggle="dropdown">
                                    <span class="allicons cart-icon"></span>
                                    <span class="total">2</span>
                                    <span class="cartrs hidden-xs"><i class="fa fa-inr"></i>200.00</span>
                                    <span class="arrow top hidden-xs"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-cart p-0 hidden-xs">
                                    <div class="cart-header">
                                        <h4 class="cart-title">Shopping Bag (1) </h4>
                                    </div>
                                    <div class="cart-body">
                                        <ul class="cart-item">
                                            <li>
                                                <div class="cart-item-image"><img src="https://d2gxays8f387d8.cloudfront.net/prodstore/productimg_thumbs/mother_dairy_toned_milk_1lit_f.jpg" alt="" /></div>
                                                <div class="cart-item-info">
                                                    <h4>Milk</h4>
                                                    <p class="price">Rs 21.00</p>
                                                </div>
                                                <div class="cart-item-close">
                                                    <a href="#" data-toggle="tooltip" data-title="Remove">&times;</a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="cart-item-image"><img src="https://d2gxays8f387d8.cloudfront.net/prodstore/productimg_thumbs/mother_dairy_toned_milk_1lit_f.jpg" alt="" /></div>
                                                <div class="cart-item-info">
                                                     <h4>Milk</h4>
                                                    <p class="price">Rs 21.00</p>
                                                </div>
                                                <div class="cart-item-close">
                                                    <a href="#" data-toggle="tooltip" data-title="Remove">&times;</a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="cart-item-image"><img src="https://d2gxays8f387d8.cloudfront.net/prodstore/productimg_thumbs/mother_dairy_toned_milk_1lit_f.jpg" alt="" /></div>
                                                <div class="cart-item-info">
                                                     <h4>Milk</h4>
                                                    <p class="price">Rs 21.00</p>
                                                </div>
                                                <div class="cart-item-close">
                                                    <a href="#" data-toggle="tooltip" data-title="Remove">&times;</a>
                                                </div>
                                            </li>
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
                                </div>
                            </li>
                            <li class="divider"></li>
                            <!-- before login start -->
                            <li style="display: none;">
                                <a href="javascript:void(0);" data-toggle="modal" data-target="#signin-up">
                                    <img src="assets/img/user-1.jpg" class="user-img" alt="" /> 
                                    <span class="hidden-md hidden-sm hidden-xs">Login / Register</span>
                                </a>
                            </li>
                            <!-- before login end -->
                            <!-- after login start -->
                            <li class="dropdown dropdown-hover afterlog">
                                <a href="javascript:void(0);" onclick="myacc_mob_boxopen()" class="lineheight1">
                                    <span><img src="assets/img/user-1.jpg" class="user-img" alt="" /></span>
                                    <span class="hidden-md hidden-sm hidden-xs">Sanjay kumar</span>
                                    <span class="arrow top"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-cart p-0 loginbox animationacc" id="myacc_mobSidenav">
                                    <div class="w-100 hidden-lg hidden-md hidden-sm">
                                        <i onclick="myacc_mob_boxclose()" class="fa fa-long-arrow-right f-s-20 m-t-10 m-l-15 m-b-5-5"></i>
                                        <p class="text-center m-b-0"><span class="allicons male-icon"></span></p>
                                        <p class="text-center">Sanjay kumar</p>
                                        <button class="btn btn-xs bg-orange-theme btn-block border-radius-0">Info</button>
                                    </div>
                                    <div class="cart-body">
                                        <ul class="cart-item">
                                            <li>
                                                <a href="#" class="logingiconalign">
                                                    <span class="allicons myprofile-icon"></span>
                                                    <span class="m-l-10">My Profile</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="active-subscription" class="logingiconalign">
                                                    <span class="allicons active-sub-icon"> </span>
                                                    <span class="m-l-10">Active Subscription</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="subscription-history"  class="logingiconalign">
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
                        </ul>
                    </div>
                </div>
            </div>
        </div>
<div id="signin-up" class="modal fade" role="dialog">
    <div class="modal-dialog login-upwidth">
        <div class="modal-content">
            <div class="modal-body padding0">
                <button type="button" class="close modaldismis" data-dismiss="modal">&times;</button>
                <div class="w-100">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pad-LR0 hidden-xs">
                        <img src="<?=base_url("assets/img/sign-up-image1.jpg");?>" class="img-responsive m-b-5-5">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 pad-LR0 marginT20">
                        <div class="w-100">
                            <div class="col-xs-6">
                                <p class="text-center signinupact"><a href="#" class="active" id="login-form-link">Login</a></p>
                            </div>
                            <div class="col-xs-6">
                                <p class="text-center signinupact"><a href="#" id="register-form-link" class="text-center">Register</a></p>
                            </div>
                            <hr class="hr">
                        </div>
                        <div class="col-lg-12">
                            <form id="login-form" action="" method="post" role="form" style="display: block;">
                                <div class="card marginT20 cardhide">
                                    <div class="input-container">
                                        <i class="inputicon comon-sprit mobile-icon"></i>
                                        <input type="text" required="required"/>
                                        <label for="Mobile">Mobile</label>
                                        <div class="bar"></div>
                                    </div>
                                    <div class="input-container">
                                        <i class="inputicon comon-sprit pass-icon"></i>
                                        <input type="password" required="required"/>
                                        <label for="Password">Password</label>
                                        <div class="bar"></div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 marginT20">
                                        <button type="button" class="btn btn-blue btn-md text-center btn-block">Login Securely</button>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 marginT20">
                                        <div class="clearfix">
                                            <label class="pull-left checkbox-inline"><input type="checkbox"> Remember me</label>
                                            <a href="#" class="pull-right forgetpass">Forgot Password?</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="card marginT20 cardshow" style="display: none;">
                                    <div class="input-container">
                                        <i class="inputicon comon-sprit mobile-icon"></i>
                                        <input type="text" required="required"/>
                                        <label for="Mobile">Mobile</label>
                                        <div class="bar"></div>
                                    </div>
                                   
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 marginT20">
                                        <button type="button" class="btn btn-blue btn-md text-center btn-block">Forgot Password</button>
                                    </div>
                                    
                                </div>
                                
                            </form>
                            <form id="register-form" action="" method="post" role="form" style="display: none;">
                                <div class="card">
                                    <h5 class="text-center">Create Your Account</h5>
                                    <div class="input-container">
                                        <i class="inputicon comon-sprit mobile-icon"></i>
                                        <input type="text" required="required"/>
                                        <label for="Mobile">Mobile</label>
                                        <div class="bar"></div>
                                    </div>
                                    <div class="input-container">
                                        <i class="inputicon comon-sprit email-icon"></i>
                                        <input type="text" required="required"/>
                                        <label for="email">Email</label>
                                        <div class="bar"></div>
                                    </div>
                                    <div class="input-container">
                                        <i class="inputicon comon-sprit pass-icon"></i>
                                        <input type="password" required="required" class="pwd" />
                                        <i class="fa fa-eye reveal passeyeicon"></i>
                                        <label for="Password">Password</label>
                                        <div class="bar"></div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 marginT20">
                                        <button type="button" class="btn btn-blue btn-md text-center btn-block">Procced</button>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 marginT20">
                                        <div class="clearfix">
                                            <label class="pull-left checkbox-inline"><input type="checkbox"> I agree with terms & conditions</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- next step for register -->
                                <div class="card" style="display: none;">
                                    <h6 class="text-center">Enter One Time Password (OTP) Sent to Your Mobile Number</h6>
                                    <div class="input-container">
                                        <i class="inputicon comon-sprit mobile-icon"></i>
                                        <input type="text" required="required"/>
                                        <label for="Mobile">Mobile</label>
                                        <div class="bar"></div>
                                    </div>
                                    <div class="input-container">
                                        <i class="inputicon comon-sprit mobile-icon"></i>
                                        <input type="text" required="required"/>
                                        <label for="Enter OTP">Enter OTP</label>
                                        <div class="bar"></div>
                                    </div>
                                    <div class="input-container">
                                        <i class="inputicon comon-sprit user-icon"></i>
                                        <input type="text" required="required"/>
                                        <label for="First Name">First Name</label>
                                        <div class="bar"></div>
                                    </div>
                                    <div class="input-container">
                                        <i class="inputicon comon-sprit user-icon"></i>
                                        <input type="text" required="required"/>
                                        <label for="Last Name">Last Name</label>
                                        <div class="bar"></div>
                                    </div>
                                    <div class="w-100">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                            <label class="form-check form-check-inline col-xs-6">
                                            <input class="form-check-input" type="radio" name="gender" value="option1">
                                            <span class="form-check-label"> Male </span>
                                            </label>
                                            <label class="form-check form-check-inline col-xs-6">
                                            <input class="form-check-input" type="radio" name="gender" value="option2">
                                            <span class="form-check-label"> Female</span>
                                            </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-100 marginT10">
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <button type="button" class="btn btn-default btn-xs text-center btn-block">CANCEL</button>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <button type="button" class="btn btn-blue btn-xs text-center btn-block">SUBMIT</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- next step for register end -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                           <h4 class="text-center">You are shopping inn</h4>
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
                                <button type="button" class="btn btn-blue btn-sm text-center btn-block">START SUBSCRIBE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>