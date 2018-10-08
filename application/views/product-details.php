<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view("common/header");?>
<div id="page-header" class="section-container page-header-container bg-black">
	<div class="page-header-cover">
		<img src="<?=base_url("assets/img/milk-banner.jpg");?>" alt="" class="img-100">
	</div>
	<div class="container">
		<h1 class="page-header">रोजाना सुबह 7 से पहले डिलीवरी पाएं |  Call or Whatsapp 7042391949</h1>
	</div>
</div>
<div id="product" class="section-container p-t-20" data-id="<?=$details->product_id;?>">
    <div class="container product-detail-container">
        <div class="product">
            <div class="product-detail">
                <div class="product-image">
                    <div class="product-main-image m-l-0" data-id="main-image">
                        <img src="https://d2gxays8f387d8.cloudfront.net/prodstore/productimg_thumbs/<?=$details->product_image_url;?>" alt="" />
												<div class="clearfix"></div>
                    </div>
										<div class="clearfix"></div>
										<?php if(!empty($details->product_description)):?>
										<hr class="hr"><br>
										<div class="col-sm-12 hidden-sm hidden-xs">
											<p class="text-left message message-default"><?=$details->product_description;?></p>
										</div>
										<?php endif;?>
                </div>
                <div class="product-info">
									<div class="row">
										<div class="col-sm-12">
											<h1 class="text-left product-title"><?=$details->product_name;?></h1>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6 col-sm-6 col-xs-6">
											<p class="text-muted text-left"><b>Brand: </b><?=$details->product_brand;?></p>
										</div>
										<div class="col-md-6 col-sm-6 col-xs-6">
											<p><span class="pull-right"><b class="text-muted">Unit:</b>  <?=$details->unit;?></span></p>
										</div>
									</div>
									<hr class="hr"><br>
									<div class="product-warranty">
										<div class="row">
											<div class="col-sm-12">
												<div class="product-price pull-left">
													<span class="price text-stroke"><i class="fa fa-inr"></i><?=$details->product_price;?></span>
													<?php if($details->product_price < $details->product_mrp):?>
													<span class="product-discount">
														<span class="discount"><i class="fa fa-inr"></i><?=number_format($details->product_mrp,2);?></span>
													</span>
													<?php endif;?>
												</div>
												<?php if($details->product_price < $details->product_mrp):?>
												<span class="btn btn-warning no-radius btn-xs text-muted m-t-15 m-l-10"><?=calculateDiscount($details->product_mrp,$details->product_price);?>% OFF</span>
												<?php endif;?>
												<div class="pull-right">
													<ul class="product-category link" data-toggle="tooltip" data-placement="top" title="Add/Modify subscription before cutoff time for continuous service. If cutoff time exceeds, changes will apply day after tomorrow.">
														<li>Cutoff Time <i class="fa fa-info-circle"></i></li>
														<li>-</li>
														<li><b><?=date("h:iA",strtotime($details->cutoff_time));?></b></li>
													</ul>
												</div>
											</div>
										</div>
				          </div>
									<hr class="hr"><br>
									<div class="product-warranty">
										<div class="row">
											<div class="form-group col-sm-3 col-xs-12">
												<div class="input-group">
													<span class="input-group-addon no-radius">Quantity</span>
													<select name="quantity" class="form-control no-radius" id="product-quantity">
														<?php for($i=1;$i<=$details->purchase_limit;$i++):?>
														<option value="<?=$i;?>"><?=$i;?></option>
														<?php endfor;?>
													</select>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12">
											<h3>Schedule Subscription</h3>
										</div>
									</div>
									<div class="clearfix"></div>
									<div class="row">
										<div class="col-md-12 col-sm-12 col-xs-12 m-t-20 " id="config-panel">
											<ul class="nav nav-tabs nav-inner-tabs text-center">
												<li class="active">
													<a class="everyday m-0 no-radius" data-toggle="tab" href="#everyday" data-pattern="everyday">Everyday</a>
												</li>
												<li>
													<a class="alternate m-0 no-radius" data-toggle="tab" href="#alternate" data-pattern="alternate">Alternate Days</a>
												</li>
												<li>
													<a class="weekdays m-0 no-radius" data-toggle="tab" href="#weekdays" data-pattern="weekdays">Weekdays</a>
												</li>
												<li>
													<a class="once m-0 no-radius" data-toggle="tab" href="#once" data-pattern="once">Once</a>
												</li>
											</ul>
											<div class="tab-content bg-warning" style="border: 1px solid #e7e3e3;border-top: 0;">
											  <div id="everyday" class="tab-pane fade in active">
													<div class="p-t-15">
														<div class="form-group p-t-15 col-sm-12">
															<div class="input-group">
																<span class="input-group-addon no-radius"><i class="fa fa-calendar"></i></span>
																<input type="text" class="form-control no-radius date-range" placeholder="Select Date Range">
															</div>
														</div>
													</div>
											  </div>
											  <div id="alternate" class="tab-pane fade">
													<div class="p-t-15">
														<div class="form-group p-t-15 col-sm-7">
															<div class="input-group">
																<span class="input-group-addon no-radius"><i class="fa fa-calendar"></i></span>
																<input type="text" class="form-control no-radius date-range" placeholder="Select Date Range">
															</div>
														</div>
													</div>
													<div class="form-group p-t-15 col-sm-5">
														<div class="input-group">
															<span class="input-group-addon no-radius"><i class="fa fa-random"></i></span>
															<select name="alternate" class="form-control no-radius" id="alternateDay">
																<option value="1" >1 Day Alternate</option>
																<option value="2" >2 Day Alternate</option>
																<option value="3" >3 Day Alternate</option>
																<option value="5" >5 Day Alternate</option>
																<option value="7" >7 Day Alternate</option>
																<option value="15" >15 Day Alternate</option>
															</select>
														</div>
													</div>
											  </div>
											   <div id="weekdays" class="tab-pane fade">
													<div class="col-sm-12 p-t-15">
														<div class="form-inline">
															<div class="form-group">
																<ul class="list-inline weekdaytab">
																	<li>
																		<span class="button-checkbox">
																			<button type="button" class="btn btn-sm no-radius mon" data-color="blue1" data-day="mon">MON</button>
																			<input type="checkbox" class="hidden" id="mon"/>
																		</span>
																	</li>
																	<li>
																		<span class="button-checkbox">
																			<button type="button" class="btn btn-sm no-radius tue" data-color="blue1" data-day="tue">TUE</button>
																			<input type="checkbox" class="hidden" id="tue"/>
																		</span>
																	</li>
																	<li>
																		<span class="button-checkbox">
																			<button type="button" class="btn btn-sm no-radius wed" data-color="blue1" data-day="wed">WED</button>
																			<input type="checkbox" class="hidden" id="wed" />
																		</span>
																	</li>
																	<li>
																		<span class="button-checkbox">
																			<button type="button" class="btn btn-sm no-radius thu" data-color="blue1" data-day="thu">THU</button>
																			<input type="checkbox" class="hidden" id="thu"/>
																		</span>
																	</li>
																	<li>
																		<span class="button-checkbox">
																			<button type="button" class="btn btn-sm no-radius fri" data-color="blue1" data-day="fri">FRI</button>
																			<input type="checkbox" class="hidden" id="fri"/>
																		</span>
																	</li>
																	<li>
																		<span class="button-checkbox">
																			<button type="button" class="btn btn-sm no-radius sat" data-color="blue1" data-day="sat">SAT</button>
																			<input type="checkbox" class="hidden" id="sat"/>
																		</span>
																	</li>
																	<li>
																		<span class="button-checkbox">
																			<button type="button" class="btn btn-sm no-radius sun" data-color="blue1" data-day="sun">SUN</button>
																			<input type="checkbox" class="hidden" id="sun"/>
																		</span>
																	</li>
																</ul>
															</div>
														</div>
													</div>
													<div class="clearfix"></div>
													<div class="form-group p-t-15 col-sm-12">
														<div class="input-group">
															<span class="input-group-addon no-radius"><i class="fa fa-calendar"></i></span>
															<input type="text" class="form-control no-radius date-range" placeholder="Select Date Range">
														</div>
													</div>
											  </div>
											  <div id="once" class="tab-pane fade">
													<div class="p-t-15">
														<div class="form-group p-t-15 col-sm-7">
															<div class="input-group">
																<span class="input-group-addon no-radius"><i class="fa fa-calendar"></i></span>
																<input type="text" class="form-control no-radius date" placeholder="Select Date">
															</div>
														</div>
													</div>
											  </div>
											  <div class="w-100">
												  <div class="col-md-12 col-sm-12 col-xs-12 m-b-20 m-t-20">
														<button class="btn btn-sm btn-blue no-radius pull-right" id="addToCart"><i class="fa fa-cart-plus"></i> Add To Cart</button>
												  </div>
											  </div>
											</div>
										</div>
									</div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view("common/similar_widget",["similarProducts" => $similarProducts]);?>
<?php $this->load->view("common/footer",["pageName" => "productDetail"]);?>
