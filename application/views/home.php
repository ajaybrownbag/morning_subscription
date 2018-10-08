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
						<h4 class="promotion-title">Vinsar Farm</h4>
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
						<h4 class="promotion-title">Ashirvaad</h4>
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
						<h4 class="promotion-title">Mother Dairy</h4>
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
						<h4 class="promotion-title">Vinsar Farm</h4>
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
						<h4 class="promotion-title">Vinsar Farm</h4>
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
						<h4 class="promotion-title">Ashirvaad</h4>
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
						<h4 class="promotion-title">Ashirvaad</h4>
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
						<h4 class="promotion-title">Vinsar Farm</h4>
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
					<?php foreach($this->env->categories as $category):?>
					<div class="carousel-cell">
					 <div class="category-box">
						<ul class="dropdown-menu-list">
							<li>
								<a href="<?=base_url("search-results?q=all&type=".$category->category_url);?>" class="topcategory">
									<span class="iconcateg">
										<img src="<?=category_image($category->image_url);?>">
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
	<div class="clearfix"></div>
	<div class="container m-t-30">
		<h4 class="section-title clearfix">
		   <a href="javascript:void(0);" class="pull-right m-l-5 button--next" data-reference="offerProducts"><i class="fa fa-angle-right f-s-18"></i></a>
		    <a href="javascript:void(0);" class="pull-right button--previous" data-reference="offerProducts"><i class="fa fa-angle-left f-s-18"></i></a>
		    <span class="text-uppercase"><span class="text-warning">Today's Offers Zone</span></span>
		</h4>
		<div class="row row-space-10">
			<div class="categoryslider">
				<div id="offerProducts" class="carousel" data-status="1" data-index="1">
					<?php foreach($offerProducts as $product):?>
					<div class="carousel-cell">
						<div class="item item-thumbnail inner-cell">
							<a href="<?=base_url("product-details/".$product->seourls);?>" class="item-image">
								<img src="https://d2gxays8f387d8.cloudfront.net/prodstore/productimg_thumbs/<?=$product->product_image_url;?>" alt=""/>
								<?php if($product->product_price < $product->product_mrp):
									$discount = round((100-$product->product_price*100/$product->product_mrp),2);
								?>
								<div class="discount"><?=$discount;?>% OFF</div>
								<?php endif;?>
							</a>
							<div class="item-info">
								<h4 class="item-title text-center">
									<a href="<?=base_url("product-details/".$product->seourls);?>">
										<?=$product->product_short_name;?>-<?=$product->unit;?>
									</a>
								</h4>
								<div class="w-100 text-center">
									<span class="item-price">₹<?=$product->product_price;?></span>
									<?php if($product->product_price< $product->product_mrp):?>
									<span class="item-discount-price">₹<?=$product->product_mrp;?></span>
									<?php endif;?>
								</div>
								<?php if($product->is_subscribed):?>
									<?php if($product->date_configs->pattern == 'weekdays'):?>
										<p class="tag">Weekdays</p>
									<?php elseif($product->date_configs->pattern == 'alternate'):?>
										<p class="tag"><?=$product->date_configs->pattern_value." Days Alternate";?></p>
									<?php else:?>
										<p class="tag"><?=$product->date_configs->pattern;?></p>
									<?php endif;?>
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
									<?php endif;?>
								</div>
								<?php elseif($product->in_cart):?>
								<p class="tag-cart">In Cart</p>
								<?php endif;?>
							</div>
						</div>
					</div>
					<?php endforeach;?>
				</div>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="container m-t-30">
		<h4 class="section-title clearfix">
		   <a href="javascript:void(0);" class="pull-right m-l-5 button--next" data-reference="topSellingProductsSlider"><i class="fa fa-angle-right f-s-18"></i></a>
		    <a href="javascript:void(0);" class="pull-right button--previous" data-reference="topSellingProductsSlider"><i class="fa fa-angle-left f-s-18"></i></a>
		    <span class="text-uppercase"><span class="text-warning">Top Selling Products</span></span>
		</h4>
		<div class="row row-space-10">
			<div class="categoryslider">
				<div id="topSellingProductsSlider" class="carousel" data-status="1" data-index="1">
					<?php foreach($topSellingProducts as $product):?>
					<div class="carousel-cell">
						<div class="item item-thumbnail inner-cell">
							<a href="<?=base_url("product-details/".$product->seourls);?>" class="item-image">
								<img src="https://d2gxays8f387d8.cloudfront.net/prodstore/productimg_thumbs/<?=$product->product_image_url;?>" alt=""/>
								<?php if($product->product_price < $product->product_mrp):
									$discount = round((100-$product->product_price*100/$product->product_mrp),2);
								?>
								<div class="discount"><?=$discount;?>% OFF</div>
								<?php endif;?>
							</a>
							<div class="item-info">
								<h4 class="item-title text-center">
									<a href="<?=base_url("product-details/".$product->seourls);?>">
										<?=$product->product_short_name;?>-<?=$product->unit;?>
									</a>
								</h4>
								<div class="w-100 text-center">
									<span class="item-price">₹<?=$product->product_price;?></span>
									<?php if($product->product_price< $product->product_mrp):?>
									<span class="item-discount-price">₹<?=$product->product_mrp;?></span>
									<?php endif;?>
								</div>
								<?php if($product->is_subscribed):?>
									<?php if($product->date_configs->pattern == 'weekdays'):?>
										<p class="tag">Weekdays</p>
									<?php elseif($product->date_configs->pattern == 'alternate'):?>
										<p class="tag"><?=$product->date_configs->pattern_value." Days Alternate";?></p>
									<?php else:?>
										<p class="tag"><?=$product->date_configs->pattern;?></p>
									<?php endif;?>
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
									<?php endif;?>
								</div>
								<?php elseif($product->in_cart):?>
								<p class="tag-cart">In Cart</p>
								<?php endif;?>
							</div>
						</div>
					</div>
					<?php endforeach;?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view("common/footer.php",["pageName" => "home"]);?>
