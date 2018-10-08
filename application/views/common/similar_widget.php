
	<div class="container m-t-30 product-detail-container">
		<h4 class="section-title clearfix">
		   <a href="javascript:void(0);" class="pull-right m-l-5 button--next" data-reference="similarProductsSlider"><i class="fa fa-angle-right f-s-18"></i></a>
		    <a href="javascript:void(0);" class="pull-right button--previous" data-reference="similarProductsSlider"><i class="fa fa-angle-left f-s-18"></i></a>
		    <span class="text-uppercase"><span class="text-warning">Similar Products</span></span>
		</h4>
		<div class="">
			<div class="categoryslider">
				<div id="similarProductsSlider" class="carousel" data-status="1" data-index="1">
					<?php foreach($similarProducts as $product):?>
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
