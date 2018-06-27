<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view("common/header.php");?>
<div id="promotions" class="bg-silver">
	<div class="w-100">
          <div class="owl-carousel owl-theme">
            <div class="item">
              	<img src="https://d2gxays8f387d8.cloudfront.net/prodstore/banner/sugar-buy-online-brownbag.jpg" class="img-responsive">
            </div>
            <div class="item">
              	<img src="https://d2gxays8f387d8.cloudfront.net/prodstore/banner/hariom-atta-chakki-brownbag.jpg" class="img-responsive">
            </div>
          </div>
	</div>
</div>

<div id="trending-items" class="section-container bg-info">
	<div class="container">
		<div class="row row-space-10">
			<div class="subcatflickity">
				<div class="carousel" data-flickity='{ "lazyLoad": true, "freeScroll": true, "contain": true,"pageDots": false,"groupCells": true,"prevNextButtons":false}'>
					<?php foreach($categories as $category):?>
					<div class="carousel-cell">
					  <div class="subcatslidbox">
						<a href="#">
						  <div class="subcatslidbox-img">
							<img src="https://s3.ap-south-1.amazonaws.com/brownbagassets/prodstore/mobile/categoryimg/line-icons/ghee-cooking-oils-and-vinegars-04062018.svg" class="flickity-lazyloaded">
						  </div>
						  <div class="subcatslidbox-content text-capitalize"><p><?=$category->category;?></p></div>
						</a>
					  </div>
					</div>
					<?php endforeach;?>
				</div>	
			</div>	
		</div>
	</div>
	<?php foreach($categories as $category):?>
	<div class="clearfix"></div>
	<div class="container m-t-30">
		<hr>
		<h4 class="section-title clearfix">
		   <a href="javascript:void(0);" class="pull-right m-l-5 button--next"><i class="fa fa-angle-right f-s-18"></i></a>
		    <a href="javascript:void(0);" class="pull-right button--previous"><i class="fa fa-angle-left f-s-18"></i></a>
		    <span class="text-capitalize"><?=$category->category;?></span>
		    <small>This category contains <?=$category->product_count;?> products</small>
		</h4>
		<div class="row row-space-10">
			<div class="categoryslider">
				<div class="carousel">
					<?php foreach($category->products as $product):?>
					<div class="carousel-cell">
						<div class="item item-thumbnail inner-cell">
							<div class="subscribhob-btn"><p align="center"><a href="product_details" class="btn btn-sm btn-green">SUBSCRIBE</a></p></div>
							<a href="product_details" class="item-image">
								<img src="https://d2gxays8f387d8.cloudfront.net/prodstore/productimg_thumbs/mother_dairy_toned_milk_1lit_f.jpg" alt=""  />
								<div class="discount">32% OFF</div>
							</a>
							<div class="item-info">
								<h4 class="item-title">
									<a href="product_details">PATANJALI Pachak Hing Peda</a>
								</h4>
								<p class="item-desc"><span class="cutofftime">Cut Off Time - <span class="cutofftime-tm">08:00PM</span></span></p>
								<div class="w-100">
									<span class="item-price">₹20.00</span>
									<span class="item-discount-price">₹21.00</span>
								</div>
								<div class="itembox-info-subscribed">
									<button class="btn btn-xs bg-orange-theme pull-left"><span class="badge"><i class="glyphicon glyphicon-ok"></i></span> Subscribed</button>
									<button type="button" class="btn btn-xs btn-success pull-right">Modify</button>
								</div>
								<div class="item-info-day">
									<ul>
										<li class="active">M</li>
										<li>T</li>
										<li class="active">W</li>
										<li>T</li>
										<li class="active">F</li>
										<li>S</li>
										<li class="active">S</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<?php endforeach;?>
					<!--
					<div class="carousel-cell">
						<div class="item item-thumbnail inner-cell">
							<a href="product_details" class="item-image">
								<img src="https://d2gxays8f387d8.cloudfront.net/prodstore/productimg_thumbs/mother_dairy_toned_milk_1lit_f.jpg" alt=""  />
								<div class="discount">32% OFF</div>
							</a>
							<div class="item-info">
								<h4 class="item-title">
									<a href="product_details">PATANJALI Pachak Hing Peda</a>
								</h4>
								<p class="item-desc"><span class="cutofftime">Cut Off Time - <span class="cutofftime-tm">08:00PM</span></span></p>
								<div class="w-100">
									<span class="item-price">₹20.00</span>
									<span class="item-discount-price">₹21.00</span>
								</div>
								<div class="itembox-info-subscribed">
									<button class="btn btn-xs btn-blue pull-left">In Cart</button>
									<button type="button" class="btn btn-xs btn-success pull-right">Modify</button>
								</div>
								<div class="item-info-day">
									<ul>
										<li class="active">M</li>
										<li>T</li>
										<li class="active">W</li>
										<li>T</li>
										<li class="active">F</li>
										<li>S</li>
										<li class="active">S</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="carousel-cell">
						<div class="item item-thumbnail inner-cell">
							<a href="product_details" class="item-image">
								<img src="https://d2gxays8f387d8.cloudfront.net/prodstore/productimg_thumbs/mother_dairy_toned_milk_1lit_f.jpg" alt=""  />
								<div class="discount">32% OFF</div>
							</a>
							<div class="item-info">
								<h4 class="item-title">
									<a href="product.html">PATANJALI Pachak Hing Peda</a>
								</h4>
								<p class="item-desc"><span class="cutofftime">Cut Off Time - <span class="cutofftime-tm">08:00PM</span></span></p>
								<div class="w-100">
									<span class="item-price">₹20.00</span>
									<span class="item-discount-price">₹21.00</span>
								</div>
							</div>
						</div>
					</div>
					<div class="carousel-cell">
						<div class="item item-thumbnail inner-cell">
							<a href="product_details" class="item-image">
								<img src="https://d2gxays8f387d8.cloudfront.net/prodstore/productimg_thumbs/mother_dairy_toned_milk_1lit_f.jpg" alt=""  />
								<div class="discount">32% OFF</div>
							</a>
							<div class="item-info">
								<h4 class="item-title">
									<a href="product.html">PATANJALI Pachak Hing Peda</a>
								</h4>
								<p class="item-desc"><span class="cutofftime">Cut Off Time - <span class="cutofftime-tm">08:00PM</span></span></p>
								<div class="w-100">
									<span class="item-price">₹20.00</span>
									<span class="item-discount-price">₹21.00</span>
								</div>
							</div>
						</div>
					</div>
					<div class="carousel-cell">
						<div class="item item-thumbnail inner-cell">
							<a href="product_details" class="item-image">
								<img src="https://d2gxays8f387d8.cloudfront.net/prodstore/productimg_thumbs/mother_dairy_toned_milk_1lit_f.jpg" alt=""  />
								<div class="discount">32% OFF</div>
							</a>
							<div class="item-info">
								<h4 class="item-title">
									<a href="product_details">PATANJALI Pachak Hing Peda</a>
								</h4>
								<p class="item-desc"><span class="cutofftime">Cut Off Time - <span class="cutofftime-tm">08:00PM</span></span></p>
								<div class="w-100">
									<span class="item-price">₹20.00</span>
									<span class="item-discount-price">₹21.00</span>
								</div>
							</div>
						</div>
					</div>
					<div class="carousel-cell">
						<div class="item item-thumbnail inner-cell">
							<a href="product_details" class="item-image">
								<img src="https://d2gxays8f387d8.cloudfront.net/prodstore/productimg_thumbs/mother_dairy_toned_milk_1lit_f.jpg" alt=""  />
								<div class="discount">32% OFF</div>
							</a>
							<div class="item-info">
								<h4 class="item-title">
									<a href="product_details">PATANJALI Pachak Hing Peda</a>
								</h4>
								<p class="item-desc"><span class="cutofftime">Cut Off Time - <span class="cutofftime-tm">08:00PM</span></span></p>
								<div class="w-100">
									<span class="item-price">₹20.00</span>
									<span class="item-discount-price">₹21.00</span>
								</div>
							</div>
						</div>
					</div>
					<div class="carousel-cell">
						<div class="item item-thumbnail inner-cell">
							<a href="product_details" class="item-image">
								<img src="https://d2gxays8f387d8.cloudfront.net/prodstore/productimg_thumbs/mother_dairy_toned_milk_1lit_f.jpg" alt=""  />
								<div class="discount">32% OFF</div>
							</a>
							<div class="item-info">
								<h4 class="item-title">
									<a href="product_details">PATANJALI Pachak Hing Peda</a>
								</h4>
								<p class="item-desc"><span class="cutofftime">Cut Off Time - <span class="cutofftime-tm">08:00PM</span></span></p>
								<div class="w-100">
									<span class="item-price">₹20.00</span>
									<span class="item-discount-price">₹21.00</span>
								</div>
							</div>
						</div>
					</div>-->
				</div>
			</div>
		</div>
	</div>
	<?php endforeach;?>
	<div class="clearfix"></div>
	<div class="container m-t-30">
		<h4 class="section-title clearfix">
		   <a href="javascript:void(0);" class="pull-right m-l-5 button--next"><i class="fa fa-angle-right f-s-18"></i></a>
		    <a href="javascript:void(0);" class="pull-right button--previous"><i class="fa fa-angle-left f-s-18"></i></a>
		    Popular Category
		    <small>Shop and get your favourite items at amazing prices!</small>
		</h4>
		<div class="row row-space-10">
			<div class="categoryslider">
				<div class="carousel">
					<div class="carousel-cell">
						<div class="item item-thumbnail inner-cell">
							<div class="subscribhob-btn"><p align="center"><a href="product_details" class="btn btn-sm btn-green">SUBSCRIBE</a></p></div>
							<a href="product_details" class="item-image">
								<img src="https://d2gxays8f387d8.cloudfront.net/prodstore/productimg_thumbs/mother_dairy_toned_milk_1lit_f.jpg" alt=""  />
								<div class="discount">32% OFF</div>
							</a>
							<div class="item-info">
								<h4 class="item-title">
									<a href="product_details">PATANJALI Pachak Hing Peda</a>
								</h4>
								<p class="item-desc"><span class="cutofftime">Cut Off Time - <span class="cutofftime-tm">08:00PM</span></span></p>
								<div class="w-100">
									<span class="item-price">₹20.00</span>
									<span class="item-discount-price">₹21.00</span>
								</div>
								<div class="itembox-info-subscribed">
									<button class="btn btn-xs bg-orange-theme pull-left"><span class="badge"><i class="glyphicon glyphicon-ok"></i></span> Subscribed</button>
									<button type="button" class="btn btn-xs btn-success pull-right">Modify</button>
								</div>
								<div class="item-info-day">
									<ul>
										<li class="active">M</li>
										<li>T</li>
										<li class="active">W</li>
										<li>T</li>
										<li class="active">F</li>
										<li>S</li>
										<li class="active">S</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="carousel-cell">
						<div class="item item-thumbnail inner-cell">
							<div class="subscribhob-btn"><p align="center"><a href="product_details" class="btn btn-sm btn-green">SUBSCRIBE</a></p></div>
							<a href="product_details" class="item-image">
								<img src="https://d2gxays8f387d8.cloudfront.net/prodstore/productimg_thumbs/mother_dairy_toned_milk_1lit_f.jpg" alt=""  />
								<div class="discount">32% OFF</div>
							</a>
							<div class="item-info">
								<h4 class="item-title">
									<a href="product_details">PATANJALI Pachak Hing Peda</a>
								</h4>
								<p class="item-desc"><span class="cutofftime">Cut Off Time - <span class="cutofftime-tm">08:00PM</span></span></p>
								<div class="w-100">
									<span class="item-price">₹20.00</span>
									<span class="item-discount-price">₹21.00</span>
								</div>
								<div class="itembox-info-subscribed">
									<button class="btn btn-xs btn-blue pull-left">In Cart</button>
									<button type="button" class="btn btn-xs btn-success pull-right">Modify</button>
								</div>
								<div class="item-info-day">
									<ul>
										<li class="active">M</li>
										<li>T</li>
										<li class="active">W</li>
										<li>T</li>
										<li class="active">F</li>
										<li>S</li>
										<li class="active">S</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="carousel-cell">
						<div class="item item-thumbnail inner-cell">
							<div class="subscribhob-btn"><p align="center"><a href="product_details" class="btn btn-sm btn-green">SUBSCRIBE</a></p></div>
							<a href="product_details" class="item-image">
								<img src="https://d2gxays8f387d8.cloudfront.net/prodstore/productimg_thumbs/mother_dairy_toned_milk_1lit_f.jpg" alt=""  />
								<div class="discount">32% OFF</div>
							</a>
							<div class="item-info">
								<h4 class="item-title">
									<a href="product.html">PATANJALI Pachak Hing Peda</a>
								</h4>
								<p class="item-desc"><span class="cutofftime">Cut Off Time - <span class="cutofftime-tm">08:00PM</span></span></p>
								<div class="w-100">
									<span class="item-price">₹20.00</span>
									<span class="item-discount-price">₹21.00</span>
								</div>
							</div>
						</div>
					</div>
					<div class="carousel-cell">
						<div class="item item-thumbnail inner-cell">
							<div class="subscribhob-btn"><p align="center"><a href="product_details" class="btn btn-sm btn-green">SUBSCRIBE</a></p></div>
							<a href="product_details" class="item-image">
								<img src="https://d2gxays8f387d8.cloudfront.net/prodstore/productimg_thumbs/mother_dairy_toned_milk_1lit_f.jpg" alt=""  />
								<div class="discount">32% OFF</div>
							</a>
							<div class="item-info">
								<h4 class="item-title">
									<a href="product.html">PATANJALI Pachak Hing Peda</a>
								</h4>
								<p class="item-desc"><span class="cutofftime">Cut Off Time - <span class="cutofftime-tm">08:00PM</span></span></p>
								<div class="w-100">
									<span class="item-price">₹20.00</span>
									<span class="item-discount-price">₹21.00</span>
								</div>
							</div>
						</div>
					</div>
					<div class="carousel-cell">
						<div class="item item-thumbnail inner-cell">
							<div class="subscribhob-btn"><p align="center"><a href="product_details" class="btn btn-sm btn-green">SUBSCRIBE</a></p></div>
							<a href="product_details" class="item-image">
								<img src="https://d2gxays8f387d8.cloudfront.net/prodstore/productimg_thumbs/mother_dairy_toned_milk_1lit_f.jpg" alt=""  />
								<div class="discount">32% OFF</div>
							</a>
							<div class="item-info">
								<h4 class="item-title">
									<a href="product_details">PATANJALI Pachak Hing Peda</a>
								</h4>
								<p class="item-desc"><span class="cutofftime">Cut Off Time - <span class="cutofftime-tm">08:00PM</span></span></p>
								<div class="w-100">
									<span class="item-price">₹20.00</span>
									<span class="item-discount-price">₹21.00</span>
								</div>
							</div>
						</div>
					</div>
					<div class="carousel-cell">
						<div class="item item-thumbnail inner-cell">
							<div class="subscribhob-btn"><p align="center"><a href="product_details" class="btn btn-sm btn-green">SUBSCRIBE</a></p></div>
							<a href="product_details" class="item-image">
								<img src="https://d2gxays8f387d8.cloudfront.net/prodstore/productimg_thumbs/mother_dairy_toned_milk_1lit_f.jpg" alt=""  />
								<div class="discount">32% OFF</div>
							</a>
							<div class="item-info">
								<h4 class="item-title">
									<a href="product_details">PATANJALI Pachak Hing Peda</a>
								</h4>
								<p class="item-desc"><span class="cutofftime">Cut Off Time - <span class="cutofftime-tm">08:00PM</span></span></p>
								<div class="w-100">
									<span class="item-price">₹20.00</span>
									<span class="item-discount-price">₹21.00</span>
								</div>
							</div>
						</div>
					</div>
					<div class="carousel-cell">
						<div class="item item-thumbnail inner-cell">
							<div class="subscribhob-btn"><p align="center"><a href="product_details" class="btn btn-sm btn-green">SUBSCRIBE</a></p></div>
							<a href="product_details" class="item-image">
								<img src="https://d2gxays8f387d8.cloudfront.net/prodstore/productimg_thumbs/mother_dairy_toned_milk_1lit_f.jpg" alt=""  />
								<div class="discount">32% OFF</div>
							</a>
							<div class="item-info">
								<h4 class="item-title">
									<a href="product_details">PATANJALI Pachak Hing Peda</a>
								</h4>
								<p class="item-desc"><span class="cutofftime">Cut Off Time - <span class="cutofftime-tm">08:00PM</span></span></p>
								<div class="w-100">
									<span class="item-price">₹20.00</span>
									<span class="item-discount-price">₹21.00</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<h4 class="section-title clearfix">
		   <a href="javascript:void(0);" class="pull-right m-l-5 button--next"><i class="fa fa-angle-right f-s-18"></i></a>
		    <a href="javascript:void(0);" class="pull-right button--previous"><i class="fa fa-angle-left f-s-18"></i></a>
		    Milk Category
		    <small>Shop and get your favourite items at amazing prices!</small>
		</h4>
		<div class="row row-space-10">
			<div class="categoryslider">
				<div class="carousel">
					<div class="carousel-cell">
						<div class="item item-thumbnail inner-cell">
							<div class="subscribhob-btn"><p align="center"><a href="product_details" class="btn btn-sm btn-green">SUBSCRIBE</a></p></div>
							<a href="product_details" class="item-image">
								<img src="https://d2gxays8f387d8.cloudfront.net/prodstore/productimg_thumbs/mother_dairy_toned_milk_1lit_f.jpg" alt=""  />
								<div class="discount">32% OFF</div>
							</a>
							<div class="item-info">
								<h4 class="item-title">
									<a href="product_details">PATANJALI Pachak Hing Peda</a>
								</h4>
								<p class="item-desc"><span class="cutofftime">Cut Off Time - <span class="cutofftime-tm">08:00PM</span></span></p>
								<div class="w-100">
									<span class="item-price">₹20.00</span>
									<span class="item-discount-price">₹21.00</span>
								</div>
								<div class="itembox-info-subscribed">
									<button class="btn btn-xs bg-orange-theme pull-left"><span class="badge"><i class="glyphicon glyphicon-ok"></i></span> Subscribed</button>
									<button type="button" class="btn btn-xs btn-success pull-right">Modify</button>
								</div>
								<div class="item-info-day">
									<ul>
										<li class="active">M</li>
										<li>T</li>
										<li class="active">W</li>
										<li>T</li>
										<li class="active">F</li>
										<li>S</li>
										<li class="active">S</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="carousel-cell">
						<div class="item item-thumbnail inner-cell">
							<div class="subscribhob-btn"><p align="center"><a href="product_details" class="btn btn-sm btn-green">SUBSCRIBE</a></p></div>
							<a href="product_details" class="item-image">
								<img src="https://d2gxays8f387d8.cloudfront.net/prodstore/productimg_thumbs/mother_dairy_toned_milk_1lit_f.jpg" alt=""  />
								<div class="discount">32% OFF</div>
							</a>
							<div class="item-info">
								<h4 class="item-title">
									<a href="product_details">PATANJALI Pachak Hing Peda</a>
								</h4>
								<p class="item-desc"><span class="cutofftime">Cut Off Time - <span class="cutofftime-tm">08:00PM</span></span></p>
								<div class="w-100">
									<span class="item-price">₹20.00</span>
									<span class="item-discount-price">₹21.00</span>
								</div>
								<div class="itembox-info-subscribed">
									<button class="btn btn-xs btn-blue pull-left">In Cart</button>
									<button type="button" class="btn btn-xs btn-success pull-right">Modify</button>
								</div>
								<div class="item-info-day">
									<ul>
										<li class="active">M</li>
										<li>T</li>
										<li class="active">W</li>
										<li>T</li>
										<li class="active">F</li>
										<li>S</li>
										<li class="active">S</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="carousel-cell">
						<div class="item item-thumbnail inner-cell">
							<div class="subscribhob-btn"><p align="center"><a href="product_details" class="btn btn-sm btn-green">SUBSCRIBE</a></p></div>
							<a href="product_details" class="item-image">
								<img src="https://d2gxays8f387d8.cloudfront.net/prodstore/productimg_thumbs/mother_dairy_toned_milk_1lit_f.jpg" alt=""  />
								<div class="discount">32% OFF</div>
							</a>
							<div class="item-info">
								<h4 class="item-title">
									<a href="product.html">PATANJALI Pachak Hing Peda</a>
								</h4>
								<p class="item-desc"><span class="cutofftime">Cut Off Time - <span class="cutofftime-tm">08:00PM</span></span></p>
								<div class="w-100">
									<span class="item-price">₹20.00</span>
									<span class="item-discount-price">₹21.00</span>
								</div>
							</div>
						</div>
					</div>
					<div class="carousel-cell">
						<div class="item item-thumbnail inner-cell">
							<div class="subscribhob-btn"><p align="center"><a href="product_details" class="btn btn-sm btn-green">SUBSCRIBE</a></p></div>
							<a href="product_details" class="item-image">
								<img src="https://d2gxays8f387d8.cloudfront.net/prodstore/productimg_thumbs/mother_dairy_toned_milk_1lit_f.jpg" alt=""  />
								<div class="discount">32% OFF</div>
							</a>
							<div class="item-info">
								<h4 class="item-title">
									<a href="product.html">PATANJALI Pachak Hing Peda</a>
								</h4>
								<p class="item-desc"><span class="cutofftime">Cut Off Time - <span class="cutofftime-tm">08:00PM</span></span></p>
								<div class="w-100">
									<span class="item-price">₹20.00</span>
									<span class="item-discount-price">₹21.00</span>
								</div>
							</div>
						</div>
					</div>
					<div class="carousel-cell">
						<div class="item item-thumbnail inner-cell">
							<div class="subscribhob-btn"><p align="center"><a href="product_details" class="btn btn-sm btn-green">SUBSCRIBE</a></p></div>
							<a href="product_details" class="item-image">
								<img src="https://d2gxays8f387d8.cloudfront.net/prodstore/productimg_thumbs/mother_dairy_toned_milk_1lit_f.jpg" alt=""  />
								<div class="discount">32% OFF</div>
							</a>
							<div class="item-info">
								<h4 class="item-title">
									<a href="product_details">PATANJALI Pachak Hing Peda</a>
								</h4>
								<p class="item-desc"><span class="cutofftime">Cut Off Time - <span class="cutofftime-tm">08:00PM</span></span></p>
								<div class="w-100">
									<span class="item-price">₹20.00</span>
									<span class="item-discount-price">₹21.00</span>
								</div>
							</div>
						</div>
					</div>
					<div class="carousel-cell">
						<div class="item item-thumbnail inner-cell">
							<div class="subscribhob-btn"><p align="center"><a href="product_details" class="btn btn-sm btn-green">SUBSCRIBE</a></p></div>
							<a href="product_details" class="item-image">
								<img src="https://d2gxays8f387d8.cloudfront.net/prodstore/productimg_thumbs/mother_dairy_toned_milk_1lit_f.jpg" alt=""  />
								<div class="discount">32% OFF</div>
							</a>
							<div class="item-info">
								<h4 class="item-title">
									<a href="product_details">PATANJALI Pachak Hing Peda</a>
								</h4>
								<p class="item-desc"><span class="cutofftime">Cut Off Time - <span class="cutofftime-tm">08:00PM</span></span></p>
								<div class="w-100">
									<span class="item-price">₹20.00</span>
									<span class="item-discount-price">₹21.00</span>
								</div>
							</div>
						</div>
					</div>
					<div class="carousel-cell">
						<div class="item item-thumbnail inner-cell">
							<div class="subscribhob-btn"><p align="center"><a href="product_details" class="btn btn-sm btn-green">SUBSCRIBE</a></p></div>
							<a href="product_details" class="item-image">
								<img src="https://d2gxays8f387d8.cloudfront.net/prodstore/productimg_thumbs/mother_dairy_toned_milk_1lit_f.jpg" alt=""  />
								<div class="discount">32% OFF</div>
							</a>
							<div class="item-info">
								<h4 class="item-title">
									<a href="product_details">PATANJALI Pachak Hing Peda</a>
								</h4>
								<p class="item-desc"><span class="cutofftime">Cut Off Time - <span class="cutofftime-tm">08:00PM</span></span></p>
								<div class="w-100">
									<span class="item-price">₹20.00</span>
									<span class="item-discount-price">₹21.00</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view("common/footer.php");?>