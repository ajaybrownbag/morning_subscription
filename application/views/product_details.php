<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view("common/header.php");?>
<div id="product" class="section-container p-t-20">
    <div class="container">
        <ul class="breadcrumb m-b-10 f-s-12">
            <li><a href="#">Home</a></li>
            <li class="active">Milk</li>
        </ul>
        <div class="product">
            <div class="product-detail">
                <div class="product-image">
                    <div class="product-main-image m-l-0" data-id="main-image">
                        <img src="https://d2gxays8f387d8.cloudfront.net/prodstore/productimg_thumbs/mother_dairy_cow_milk_500ml_f.jpg" alt="" />
                    </div>
                </div>
                <div class="product-info">
                    <div class="product-info-header">
                        <h1 class="product-title">Mother Dairy Toned Milk </h1>
                        <p><b>1</b> Liter</p>
                    </div>
                    <div class="product-warranty">
                        <ul class="product-category">
                            <li>Cut off Time</li>
                            <li>-</li>
                            <li><b>08:00PM</b></li>
                        </ul>
                    </div>
                    <div class="product-warranty">
    				    <div class="input-group col-md-3 col-sm-3 col-xs-6">
    				          <span class="input-group-btn">
    				              <button type="button" class="btn btn-green btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
    				                  <span class="glyphicon glyphicon-minus"></span>
    				              </button>
    				          </span>
    				          <input type="text" name="quant[1]" class="form-control input-number text-center" value="1" min="1" max="10">
    				          <span class="input-group-btn">
    				              <button type="button" class="btn btn-green btn-number" data-type="plus" data-field="quant[1]">
    				                  <span class="glyphicon glyphicon-plus"></span>
    				              </button>
    				          </span>
    				    </div>
    				    <div class="w-100 m-t-20">
    					    <p>Total Deliveries: <b>1</b></p>
    					    <p>Total Price: <b><i class="fa fa-inr"></i> 21.00</b></p>
    				    </div>
                    </div>
                    <div class="product-info-list">
                        <h5><i class="fa fa-calendar"></i> Select Repeat Days</h5>
                        	<ul class="product-category">
                        		<li> <div class="btn btn-xs btn-blue btn-active">MON</div> </li>
                        		<li> <div class="btn btn-xs btn-grey">TUE</div> </li>
                        		<li> <div class="btn btn-xs btn-blue btn-active">WED</div> </li>
                        		<li> <div class="btn btn-xs btn-grey">THU</div> </li>
                        		<li> <div class="btn btn-xs btn-blue btn-active">FRI</div> </li>
                        		<li> <div class="btn btn-xs btn-grey">SAT</div> </li>
                        		<li> <div class="btn btn-xs btn-blue btn-active">SUN</div> </li>
                        	</ul>
                        	<div class="w-100 m-t-20">
                        		<h5><i class="fa fa-calendar"></i> Select Date Range</h5>
    							<form id="form" name="form" class="form-inline">
    							<div class="form-group">
    							<label for="startDate">Start Date</label>
    							<input id="startDate" name="startDate" type="text" class="form-control" />
    							&nbsp;
    							<label for="endDate">End Date</label>
    							<input id="endDate" name="endDate" type="text" class="form-control" />
    							</div>
    							</form>
                        	</div>
                    </div>
                    <div class="product-purchase-container">
                        <div class="product-discount">
                            <span class="discount"><i class="fa fa-inr"></i> 21.00</span>
                        </div>
                        <div class="product-price">
                            <div class="price"><i class="fa fa-inr"></i> 20.00</div>
                        </div>
                        <button class="btn btn-inverse btn-blue" type="submit" onclick="location.href='my-cart'">ADD TO CART</button>
                    </div>

                     <div class="clearfix m-t-30"></div>
                    <pre>In Cart Start</pre>
                    
                    <div class="product-info-header">
                        <h1 class="product-title">Mother Dairy Toned Milk </h1>
                        <p><b>1</b> Liter  <span class="m-l-30"><b>1</b> QTY</span></p>
                    </div>
                    <div class="product-warranty">
                        <ul class="product-category">
                            <li>Cut off Time</li>
                            <li>-</li>
                            <li><b>08:00PM</b></li>
                        </ul>
                        <div class="w-100 m-t-10">
                            <p>Total Deliveries: <b>1</b></p>
                            <p>Total Price: <b><i class="fa fa-inr"></i> 20.00</b></p>
                            <p>Start Date: <b> May 16, 2018</b></p>
                            <p>End Date: <b> May 31, 2018</b></p>
                        </div>
                        <div class="w-100">
                        	<span class="btn btn-xs label btn-active"><span class="badge"><i class="glyphicon glyphicon-ok"></i></span> Subscribed</span>
                        	<div class="clearfix"></div>
                            <div class="cart-info-day m-t-10">
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
                    <div class="product-warranty">
    				    <div class="input-group col-md-3 col-sm-3 col-xs-6">
    				          <span class="input-group-btn">
    				              <button type="button" class="btn btn-green btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
    				                  <span class="glyphicon glyphicon-minus"></span>
    				              </button>
    				          </span>
    				          <input type="text" name="quant[1]" class="form-control input-number text-center" value="1" min="1" max="10">
    				          <span class="input-group-btn">
    				              <button type="button" class="btn btn-green btn-number" data-type="plus" data-field="quant[1]">
    				                  <span class="glyphicon glyphicon-plus"></span>
    				              </button>
    				          </span>
    				    </div>
    				    <div class="w-100 m-t-20">
    				    	<h5>Subscription Cart Detail</h5>
    					    <p>Total Deliveries: <b>1</b></p>
    					    <p>Total Price: <b><i class="fa fa-inr"></i> 21.00</b></p>
    				    </div>
                    </div>
                    <div class="product-info-list">
                        <h5><i class="fa fa-calendar"></i> Select Repeat Days</h5>
                        	<ul class="product-category">
                        		<li> <div class="btn btn-xs btn-blue btn-active">MON</div> </li>
                        		<li> <div class="btn btn-xs btn-grey">TUE</div> </li>
                        		<li> <div class="btn btn-xs btn-blue btn-active">WED</div> </li>
                        		<li> <div class="btn btn-xs btn-grey">THU</div> </li>
                        		<li> <div class="btn btn-xs btn-blue btn-active">FRI</div> </li>
                        		<li> <div class="btn btn-xs btn-grey">SAT</div> </li>
                        		<li> <div class="btn btn-xs btn-blue btn-active">SUN</div> </li>
                        	</ul>
                        	<div class="w-100 m-t-20">
                        		<h5><i class="fa fa-calendar"></i> Select Date Range</h5>
    							<form id="form" name="form" class="form-inline">
    							<div class="form-group">
    							<label for="startDate">Start Date</label>
    							<input id="startDate" name="startDate" type="text" class="form-control" />
    							&nbsp;
    							<label for="endDate">End Date</label>
    							<input id="endDate" name="endDate" type="text" class="form-control" />
    							</div>
    							</form>
                        	</div>
                    </div>
                    <div class="product-purchase-container">
                        <div class="product-discount">
                            <span class="discount"><i class="fa fa-inr"></i> 21.00</span>
                        </div>
                        <div class="product-price">
                            <div class="price"><i class="fa fa-inr"></i> 20.00</div>
                        </div>
                        <button class="btn" type="submit">Cancel Subscription</button>
                        <button class="btn btn-inverse btn-blue m-l-30" type="submit">GO TO CART</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view("common/footer.php");?>