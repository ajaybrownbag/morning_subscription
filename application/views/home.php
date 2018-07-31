<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view("common/header.php");?>
<div id="promotions" class="section-container morning-background">
	<!-- BEGIN container -->
	<div class="container">
		<!-- BEGIN row -->
		<div class="row row-space-10">
			<!-- BEGIN col-3 -->
			<div class="col-md-3 col-sm-6 col-xs-6 hidden-xs">
				<!-- BEGIN promotion -->
				<div class="promotion bg-theme-orange">
					<div class="promotion-image promotion-image-overflow-bottom promotion-image-overflow-top">
						<img src="<?=base_url("assets/img/offers/product-offers.png");?>" alt="">
					</div>
					<div class="promotion-caption promotion-caption-inverse text-right">
						<h4 class="promotion-title">Apple Watch</h4>
						<div class="promotion-price"><small>from</small> $299.00</div>
						<p class="promotion-desc">You. At a glance.</p>
						<a href="#" class="promotion-btn">View More</a>
					</div>
				</div>
				<!-- END promotion -->
				<!-- BEGIN promotion -->
				<div class="promotion bg-theme-blue">
					<div class="promotion-image text-right">
						<img src="<?=base_url("assets/img/offers/atta.png");?>" alt="">
					</div>
					<div class="promotion-caption promotion-caption-inverse">
						<h4 class="promotion-title">Mac Pro</h4>
						<div class="promotion-price"><small>from</small> $1,299.00</div>
						<p class="promotion-desc">Built for creativity on an epic scale.</p>
						<a href="#" class="promotion-btn">View More</a>
					</div>
				</div>
				<!-- END promotion -->
			</div>
			<!-- END col-3 -->
			<!-- BEGIN col-3 -->
			<div class="col-md-3 col-sm-6 col-xs-6 hidden-xs">
				<!-- BEGIN promotion -->
				<div class="promotion bg-theme-blue">
					<div class="promotion-image text-right">
						<img src="<?=base_url("assets/img/offers/milk.png");?>" alt="">
					</div>
					<div class="promotion-caption promotion-caption-inverse">
						<h4 class="promotion-title">Mac Pro</h4>
						<div class="promotion-price"><small>from</small> $1,299.00</div>
						<p class="promotion-desc">Built for creativity on an epic scale.</p>
						<a href="#" class="promotion-btn">View More</a>
					</div>
				</div>
				<!-- END promotion -->
				<!-- BEGIN promotion -->
				<div class="promotion bg-theme-orange">
					<div class="promotion-image promotion-image-overflow-bottom promotion-image-overflow-top">
						<img src="<?=base_url("assets/img/offers/product-offers.png");?>" alt="">
					</div>
					<div class="promotion-caption promotion-caption-inverse text-right">
						<h4 class="promotion-title">Apple Watch</h4>
						<div class="promotion-price"><small>from</small> $299.00</div>
						<p class="promotion-desc">You. At a glance.</p>
						<a href="#" class="promotion-btn">View More</a>
					</div>
				</div>
				<!-- END promotion -->
			</div>
			<!-- END col-3 -->
			<!-- BEGIN col-3 -->
			<div class="col-md-3 col-sm-6 col-xs-6">
				<!-- BEGIN promotion -->
				<div class="promotion bg-theme-orange">
					<div class="promotion-image promotion-image-overflow-bottom promotion-image-overflow-top">
						<img src="<?=base_url("assets/img/offers/product-offers.png");?>" alt="">
					</div>
					<div class="promotion-caption promotion-caption-inverse text-right">
						<h4 class="promotion-title">Apple Watch</h4>
						<div class="promotion-price"><small>from</small> $299.00</div>
						<p class="promotion-desc">You. At a glance.</p>
						<a href="#" class="promotion-btn">View More</a>
					</div>
				</div>
				<!-- END promotion -->
				<!-- BEGIN promotion -->
				<div class="promotion bg-theme-blue">
					<div class="promotion-image text-right">
						<img src="<?=base_url("assets/img/offers/atta.png");?>" alt="">
					</div>
					<div class="promotion-caption promotion-caption-inverse">
						<h4 class="promotion-title">Mac Pro</h4>
						<div class="promotion-price"><small>from</small> $1,299.00</div>
						<p class="promotion-desc">Built for creativity on an epic scale.</p>
						<a href="#" class="promotion-btn">View More</a>
					</div>
				</div>
				<!-- END promotion -->
			</div>
			<!-- END col-3 -->
			<!-- BEGIN col-3 -->
			<div class="col-md-3 col-sm-6 col-xs-6">
				<!-- BEGIN promotion -->
				<div class="promotion bg-theme-blue">
					<div class="promotion-image text-right">
						<img src="<?=base_url("assets/img/offers/atta.png");?>" alt="">
					</div>
					<div class="promotion-caption promotion-caption-inverse">
						<h4 class="promotion-title">Mac Pro</h4>
						<div class="promotion-price"><small>from</small> $1,299.00</div>
						<p class="promotion-desc">Built for creativity on an epic scale.</p>
						<a href="#" class="promotion-btn">View More</a>
					</div>
				</div>
				<!-- END promotion -->
				<!-- BEGIN promotion -->
				<div class="promotion bg-theme-orange">
					<div class="promotion-image promotion-image-overflow-bottom promotion-image-overflow-top">
						<img src="<?=base_url("assets/img/offers/product-offers.png");?>" alt="">
					</div>
					<div class="promotion-caption promotion-caption-inverse text-right">
						<h4 class="promotion-title">Apple Watch</h4>
						<div class="promotion-price"><small>from</small> $299.00</div>
						<p class="promotion-desc">You. At a glance.</p>
						<a href="#" class="promotion-btn">View More</a>
					</div>
				</div>
				<!-- END promotion -->
			</div>
			<!-- END col-3 -->
		</div>
		<!-- END row -->
	</div>
	<!-- END container -->
</div>
<div id="trending-items" class="section-container bg-info">
	<div class="container">
		<div class="row row-space-10">
			<div class="subcatflickity">
				<div class="carousel" data-flickity='{ "lazyLoad": true, "freeScroll": true, "contain": true,"pageDots": false,"groupCells": true,"prevNextButtons":false}'>
					<?php foreach($categories as $category):?>
					<div class="carousel-cell">
					 <div class="category-box">
						<ul class="dropdown-menu-list">
							<li>
								<a href="<?=base_url("search-results?q=all&type=".$category->category_url);?>" class="topcategory">
									<span class="iconcateg">
										<img src="<?=base_url("assets/img/categoryimg/".$category->image_url);?>">
									</span>
									<br>
									<span class=" topcatename"><?=$category->category_name;?></span>
								</a>
							</li>
						</ul>
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
		<h4 class="section-title clearfix">
		   <a href="javascript:void(0);" class="pull-right m-l-5 button--next" data-category="<?=$category->category_id;?>"><i class="fa fa-angle-right f-s-18"></i></a>
		    <a href="javascript:void(0);" class="pull-right button--previous" data-category="<?=$category->category_id;?>"><i class="fa fa-angle-left f-s-18"></i></a>
		    <span class="text-capitalize"><span class="text-warning"><?=$category->category_name;?></span></span>
		    <small>We have <b><?=$category->product_count;?></b> products in <b><?=$category->category_name;?></b> category</small>
		</h4>
		<div class="row row-space-10">
			<div class="categoryslider">
				<div id="catSlider<?=$category->category_id;?>" class="carousel" data-status="1" data-index="1" data-category="<?=$category->category_id;?>">
					<?php foreach($category->products as $product):?>
					<div class="carousel-cell">
						<div class="item item-thumbnail inner-cell">
							<a href="<?=base_url("product-details/".$product->seourls);?>" class="item-image">
								<img src="https://d2gxays8f387d8.cloudfront.net/prodstore/productimg_thumbs/<?=$product->product_image_url;?>" alt="" />
								<?php if($product->product_price < $product->product_mrp):
									$discount = round((100-$product->product_price*100/$product->product_mrp),2);
								?>
								<div class="discount"><?=$discount;?>% OFF</div>
								<?php endif;?>
							</a>
							<div class="item-info">
								<h4 class="item-title">
									<a href="<?=base_url("product-details/".$product->seourls);?>">
										<?=$product->product_short_name;?>-<?=$product->quantity.$product->unit;?>
									</a>
								</h4>
								<div class="w-100">
									<span class="item-price">₹<?=$product->product_price;?></span>
									<?php if($product->product_price< $product->product_mrp):?>
									<span class="item-discount-price">₹<?=$product->product_mrp;?></span>
									<?php endif;?>	
								</div>
								<?php if($product->is_subscribed):?>
								<div class="item-info-day">
									<?php if($product->date_configs->pattern == 'weekdays'):
										$days = ["mon"=>"M","tue"=>"T","wed"=>"W","thu"=>"T","fri"=>"F","sat"=>"S","sun"=>"S"];
									?>
									<ul>
									<?php foreach($days as $day => $letter):?>
									<?php if($product->date_configs->pattern_value[$day] == 'true'):?>
									<li class="active"><?=$letter;?></li>
									<?php else:?>
									<li><?=$letter;?></li>
									<?php endif;?>
									<?php endforeach;?>
									</ul>
									<?php elseif($product->date_configs->pattern == 'alternate'):?>
										<span class="btn btn-xs btn-warning pull-left">
										<?=$product->date_configs->pattern_value." Day(s) Alternate";?>
										</span>
									<?php else:?>
										<span class="btn btn-xs btn-warning pull-left">
										<?=ucwords($product->date_configs->pattern);?>
										</span>
									<?php endif;?>
								</div>
								<?php elseif($product->in_cart):?>
								<div class="itembox-info-subscribed">
									<button class="btn btn-xs btn-blue pull-left">In Cart</button>
									<a href="<?=base_url("product-details/".$product->seourls);?>" class="btn btn-xs btn-success pull-right">Modify</a>
								</div>
								<?php endif;?>
							</div>
						</div>
					</div>
					<?php endforeach;?>
				</div>
			</div>
		</div>
	</div>
	<?php endforeach;?>
	<div class="clearfix"></div>
</div>
<?php $this->load->view("common/footer.php");?>