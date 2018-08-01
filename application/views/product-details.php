<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view("common/header.php");?>
<div id="page-header" class="section-container page-header-container bg-black">
	<div class="page-header-cover">
		<img src="<?=base_url("assets/img/milk-banner.jpg");?>" alt="" class="img-100">
	</div>
	<div class="container">
		<h1 class="page-header">रोजाना सुबह 7 से पहले डिलीवरी पाएं |  Call or Whatsapp 7042391949</h1>
	</div>
</div>
<div id="product" class="section-container p-t-20">
    <div class="container">
        <div class="product">
            <div class="product-detail">
                <div class="product-image">
                    <div class="product-main-image m-l-0" data-id="main-image">
                        <img src="<?=base_url("assets/img/offers/atta.png");?>" alt="" />
						<div class="clearfix"></div>
						<hr class="hr"><br>
						<h1 class="text-left product-title"><?=$details->product_name;?></h1>

						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-6">
								<p class="text-muted text-left"><b>Brand: </b><?=$details->product_brand;?></p>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-6">
								<p><span class="pull-right"><b class="text-muted">Quantity:</b>  <?=$details->unit;?></span></p>
							</div>

						</div>
						<div class="hidden-sm hidden-xs">
							<hr class="hr"><br>
							<p class="text-left"><?=$details->product_description;?></p>
						</div>
                    </div>
                </div>
                <div class="product-info">
					<div class="product-warranty">
						<div class="product-price pull-left">
                            <span class="price text-stroke"><i class="fa fa-inr"></i>20.00</span> 
							<span class="product-discount">
								<span class="discount"><i class="fa fa-inr"></i>21.00</span>
							</span>
                        </div>
						<span class="btn btn-warning no-radius btn-xs text-muted m-t-15 m-l-10">2% OFF</span>
                        <div class="pull-right">
							<ul class="product-category">
								<li><span data-toggle="tooltip" data-placement="top" title="Default tooltip dfgfdggdfgfdg gfdgfd dfgdf dfg">Cut off Time</span></li>
								<li>-</li>
								<li><b><?=date("h:iA",strtotime($details->cutoff_time));?></b></li>
							</ul>
						</div>
                    </div>
					<div class="product-warranty">
						<div class="row">
							<div class="form-group">
								<label class="control-label col-md-2 col-sm-2 col-xs-12"><span class="p-t-5 inline-block"><b>Quantity</b></span> <span class="text-danger">*</span></label>
								<div class="col-md-10 col-sm-10 col-xs-12">
									<div class="form-inline">
										<div class="form-group">
											<select name="dd" class="form-control">
												<option value="">Select</option>
												<option value="1" >1 </option>
												<option value="2" >2 </option>
												<option value="3" >3 </option>
												<option value="4" >4 </option>
												<option value="5" >5 </option>
												<option value="6" >6 </option>
											</select>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12 product-config-container">
							<ul class="nav nav-tabs">
							  <li class="active" style="width:50%;text-align:center"><a class="m-0 no-radius" data-toggle="tab" href="#pattern-container">PATTERN</a></li>
							  <li style="width:50%;text-align:center"><a class="m-0 no-radius" data-toggle="tab" href="#once-container">ONCE</a></li>
							</ul>
							<div class="tab-content">
							  <div id="pattern-container" class="tab-pane fade in active bg-f5f5f5">
								<div class="w-100 p-t-10 p-b-10">
									<div class="form-group m-t-15">
										<label class="control-label col-md-3 col-sm-3 col-xs-12"><span class="p-t-5 inline-block"><i class="fa fa-calendar"></i> Date Range</span></label>
										<div class="col-md-9 col-sm-9 col-xs-12">
											<div class="form-inline">
												<div class="form-group w-100">
													<input type="text" class="form-control w-100" name="contactnum" placeholder="Enter your Primary contact no." value="">
												</div>
											</div>
										</div>
									</div>
									<div class="clearfix"></div>
									<div class="col-md-12 col-sm-12 col-xs-12 m-t-20">
									<ul class="nav nav-tabs nav-inner-tabs">
										<li class="active" style="text-align:center"><a class="m-0 no-radius" data-toggle="tab" href="#everydays">Every Days</a></li>
										<li style="text-align:center"><a class="m-0 no-radius" data-toggle="tab" href="#alternatedays">Alternate Days</a></li>
										<li style="text-align:center"><a class="m-0 no-radius" data-toggle="tab" href="#weekdays">Week Days</a></li>
									</ul>
									<div class="tab-content bg-white">
									  <div id="everydays" class="tab-pane fade in active bg-white" style="display: none;"></div>
									  <div id="alternatedays" class="tab-pane fade bg-white">
											<div class="form-group w-100 m-t-20">
												<label class="control-label col-md-4 col-sm-4 col-xs-12"><span class="p-t-5 inline-block"><b>Select Alternate Day</b></span></label>
												<div class="col-md-8 col-sm-8 col-xs-12">
													<div class="form-inline">
														<div class="form-group">
															<select name="dd" class="form-control">
																<option value="">Select</option>
																<option value="1" >1 </option>
																<option value="2" >2 </option>
																<option value="3" >3 </option>
																<option value="4" >4 </option>
																<option value="5" >5 </option>
																<option value="6" >6 </option>
															</select>
														</div>
													</div>
												</div>
											</div>
									  </div>
									   <div id="weekdays" class="tab-pane fade bg-white">
									   		<div class="form-group w-100 m-t-20">
												<label class="control-label col-md-3 col-sm-3 col-xs-12"><span class="inline-block"><b>Weekdays</b></span></label>
												<div class="col-md-9 col-sm-9 col-xs-12">
													<div class="form-inline">
														<div class="form-group">
															<ul class="list-inline weekdaytab">
															    <li>
																	<span class="button-checkbox">
																	<button type="button" class="btn btn-xs" data-color="blue1">MON</button>
																	<input type="checkbox" class="hidden" />
																	</span>
															    </li>
															    <li>
																	<span class="button-checkbox">
																	<button type="button" class="btn btn-xs" data-color="blue1">TUE</button>
																	<input type="checkbox" class="hidden" checked />
																	</span>
															    </li>
															    <li>
																	<span class="button-checkbox">
																	<button type="button" class="btn btn-xs" data-color="blue1">WED</button>
																	<input type="checkbox" class="hidden"  />
																	</span>
															    </li>
															    <li>
																	<span class="button-checkbox">
																	<button type="button" class="btn btn-xs" data-color="blue1">THU</button>
																	<input type="checkbox" class="hidden" checked />
																	</span>
															    </li>
															    <li>
																	<span class="button-checkbox">
																	<button type="button" class="btn btn-xs" data-color="blue1">FRI</button>
																	<input type="checkbox" class="hidden"  />
																	</span>
															    </li>
															    <li>
																	<span class="button-checkbox">
																	<button type="button" class="btn btn-xs" data-color="blue1">SAT</button>
																	<input type="checkbox" class="hidden" checked />
																	</span>
															    </li>
															    <li>
																	<span class="button-checkbox">
																	<button type="button" class="btn btn-xs" data-color="blue1">SUN</button>
																	<input type="checkbox" class="hidden" checked />
																	</span>
															    </li>
															  </ul>
														</div>
													</div>
												</div>
											</div>
									  </div>
									  <div class="w-100">
										  <div class="col-md-12 col-sm-12 col-xs-12">
												<div class="alert alert-success alert-dismissible p-t-5 p-b-5 m-t-20">
												<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
												<strong>Success!</strong> This alert box could indicate a successful or positive action.
												</div>
										  </div>
										  <div class="col-md-12 col-sm-12 col-xs-12 m-b-20 m-t-20">
												<button class="btn btn-sm btn-blue pull-right">Add to Cart</button>
										  </div>
									  </div>
									</div>
								</div>
								</div>
							</div>
							  <div id="once-container" class="tab-pane fade bg-f5f5f5">
							  	<div class="w-100 p-t-10 p-b-10">
									<div class="form-group m-t-15">
										<label class="control-label col-md-3 col-sm-3 col-xs-12"><span class="p-t-5 inline-block"><i class="fa fa-calendar"></i> Once</span></label>
										<div class="col-md-9 col-sm-9 col-xs-12">
											<div class="form-inline">
												<div class="form-group w-100">
													<input type="text" class="form-control w-100" name="contactnum" placeholder="Enter your Primary contact no." value="">
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
            </div>
        </div>
    </div>
</div>
<?php $this->load->view("common/footer.php");?>