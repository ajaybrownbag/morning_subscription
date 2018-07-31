<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view("common/header.php");?>
<div id="page-header" class="section-container page-header-container bg-black">
	<div class="page-header-cover">
		<img src="assets/img/milk-banner.jpg" alt="" class="img-100" />
	</div>
	<div class="container">
		<h1 class="page-header">Search Results for "<b><?=$response->filters->term;?></b>"</h1>
	</div>
</div>
<div id="search-results" class="section-container bg-info">
	<div class="container">
		<div class="search-container">
			<div class="search-content">
				<div class="search-toolbar">
					<div class="row">
						<div class="col-md-10 col-sm-10 col-xs-9">
							<h4>We found <?=$response->hits;?> Items for "<?=$response->filters->term;?>"</h4>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-3 text-right hidden-lg hidden-md hidden-sm">
                            <span><a href="javascript:void(0);" onclick="filter_mob_boxopen()"><i class="fa fa-filter text-primary"></i> filter</a></span>
                         </div>
					</div>
				</div>
				<div class="search-item-container">
					<?php if(!$response->hits):?>
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<h4 class="text-center text-warning">No search results found!</h4>
						</div>
					</div>
					<?php endif;?>
					<div id="product-container" class="item-row" data-term="<?=$response->filters->term;?>" data-index="1" data-type="<?=$response->filters->type;?>">
						<?php foreach($response->products as $product):?>
						<div class="item item-thumbnail product-cell"  title="<?=$product->product_name." - ".$product->unit;?>">
							<div class="subscribhob-btn"><p align="center"><a href="<?=base_url("product-details/".$product->seourls);?>" class="btn btn-sm btn-green"><?=($product->is_subscribed ? "MODIFY" : "SUBSCRIBE");?></a></p></div>
							<a href="<?=base_url("product-details/".$product->seourls);?>" class="item-image">
								<img src="https://d2gxays8f387d8.cloudfront.net/prodstore/productimg_thumbs/<?=$product->product_image_url;?>" alt="" />
								<?php if($product->product_mrp > $product->product_price):?>
								<div class="discount">
									<?=calculateDiscount($product->product_mrp,$product->product_price);?>% OFF
								</div>
								<?php endif;?>
							</a>
							<div class="item-info">
								<h4 class="item-title">
									<a href="<?=base_url("product-details/".$product->seourls);?>">
									<?=$product->product_short_name." - ".$product->unit;?>
									</a>
								</h4>
								<div class="w-100">
									<span class="item-price">₹<?=$product->product_price;?></span>
									<?php if($product->product_mrp > $product->product_price):?>
									<span class="item-discount-price">
										₹<?=number_format($product->product_mrp, 2, '.', '');?>
									</span>
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
								<span class="fa fa-shopping-cart btn btn-xs btn-default pull-left"></span>
								<?php endif;?>
							</div>
						</div>
						<?php endforeach;?>
					</div>
				</div>
			</div>
		<div class="search-sidebar sidebar-search-filter animationacc sticky hidden-sm" id="filter_mobSidenav">
			<div class="w-100">
				<h4 class="title m-b-0">Categories <i onclick="filter_mob_boxclose()" class="fa fa-long-arrow-left f-s-20 pull-right hidden-lg hidden-md hidden-sm"></i></h4>
				<ul class="search-category-list">
				<?php if(!empty($response->aggregations)):?>
				<?php $selected = empty($response->filters->type) ? "active" : "";?>
					<li class="<?=$selected;?>"><a class="category-item" href="javascript:;" data-type="">
						<img class="allicons1 img-responsive img-circle img-thumbnail" src="<?=base_url("assets/img/categoryimg/all-category.png");?>" style="height:30px">
						<span>All</span> <span class="pull-right m-t-5">(<?=$response->hits;?>)</span></a>
					</li>
					<?php foreach($response->aggregations as $aggregation):?>
					<?php $selected = ($response->filters->type == $aggregation->category_url) ? "active" : "";?>
					<li class="<?=$selected;?>">
						<a class="category-item" href="javascript:;" data-type="<?=$aggregation->category_url;?>">
						<img class="allicons1 img-responsive img-circle img-thumbnail" src="<?=base_url("assets/img/categoryimg/".$aggregation->image_url);?>" style="height:30px">
						<span> <?=$aggregation->category_name;?></span> <span class="pull-right m-t-5">(<?=$aggregation->hits;?>)</span></a>
					</li>
					<?php endforeach;?>
				<?php else:?>
					<li><a href="#"><span class="allicons1 milk-icon"></span><span class="caticon"> No search results found!</span> </a></li>
				<?php endif;?>
				</ul>
			</div>
		</div>
		<div class="search-sidebar-helper"></div>
		</div>
	</div>
</div>
<?php $this->load->view("common/footer.php");?>