<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view("common/header.php");?>
<div class="section-container" id="checkout-cart">
    <div class="container">
      <div class="checkout">
        <div class="mycart-header bg-blue-theme">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                   Active Subscription
                </div>
            </div>
        </div>
        <div class="checkout-body">
          <div class="row">
    				<div class="col-sm-8">
    					<div class="message message-outline bg-silver-lighter table-responsive">
    						<table class="table table-cart">
    							<tbody>
    								<tr>
    									<td class="cart-summary" style="border:0;">
    										<div class="summary-container">
    										<h5><b>Payment Details</b></h5>
    										<hr style="border-top:1px solid #666">
    											<div class="summary-row">
    												<div class="field">Active Subscription Amount</div>
    												<div class="value"><i class="fa fa-rupee"></i> 10.00</div>
    											</div>
    											<div class="summary-row">
    												<div class="field">Total Delivery Charges</div>
    												<div class="value"><i class="fa fa-rupee"></i> 10.00</div>
    											</div>
    											<div class="summary-row">
    												<div class="field"><small class="text-success">Total Delivery days are 8.</small></div>
    												<div class="value"></div>
    											</div>
    											<div class="summary-row">
    												<div class="field">WalletCash for Subscription</div>
    												<div class="value"><i class="fa fa-rupee"></i> 10.00</div>
    											</div>
    											<div class="summary-row total">
    												<div class="field">Payable Amount</div>
    												<div class="value"><i class="fa fa-rupee"></i> 500.00</div>
    											</div>
    										</div>
    									</td>
    								</tr>
    							</tbody>
    						</table>
    					</div>
    				</div>
    				<div class="col-sm-4">
    					<div class="message message-outline bg-warning table-responsive">
    						<table class="table table-cart">
    							<tbody>
    								<tr>
    									<td class="cart-summary" style="border:0;">
    										<div class="summary-container">
    											<h5><i class="text-warning fa fa-exclamation-triangle"></i> <b>Warning</b></h5>
    											<hr style="border-top:1px solid #666">
    											<p>You have insufficient balance in your account. Please add more money in your account to get uninterrupted subscribed deliveries.</p>
    											<div class="summary-row total">
                            <br>
    												<div class="pull-left">Payable Amount</div>
    												<div class="pull-right">
    													<i class="fa fa-rupee"></i> 500.00
    													<button class="btn btn-warning btn-sm">PAY NOW</button>
    												</div>
    											</div>
    										</div>
    									</td>
    								</tr>
    							</tbody>
    						</table>
    					</div>
    				</div>
    			</div>
    			<div class="clearfix"></div>
    			<br>
    			<div class="row">
    				<div class="col-sm-12">
    					<div class="message message-outline bg-info">
    							<img src="<?=base_url('assets/img/vacation-icon.png');?>"> Are you going on a vacation ?
    							<button class="btn btn-sm btn-blue pull-right">SET VACATION</button>
                  <div class="clearfix"></div>
    					</div>
    				</div>
    			</div>
    			<div class="clearfix"></div>
    			<br>
    			<div class="row">
    				<div class="col-lg-4 col-sm-6 col-xs-12">
    					<div class="message message-outline bg-silver-lighter checkout-product-card">
    						<div class="media">
    						  <div class="media-left">
    							<img src="https://d2gxays8f387d8.cloudfront.net/prodstore/productimg_thumbs/mother_dairy_tadka_chach_400ml_f.jpg" class="media-object img-thumbnail" style="width:80px">
    						  </div>
    						  <div class="media-body">
    							<h4 class="media-heading text-muted"><span>Mother Dairy Toned Milk And Full Cream</span> <span class="pull-right">1 lt</span></h4>
    							<p class="text-muted">
    								<span>Price: <i class="fa fa-inr"></i> 34</span>
    								<span class="pull-right">Qty: 1</span>
    							</p>
    						  </div>
    						</div>
    						<table class="table table-cart message" style="margin-bottom:0px">
    							<tbody>
    								<tr>
    									<td class="cart-summary" style="border:0;">
    										<div class="summary-container">
    											<div class="summary-row">
    												<div class="field">Total Deliveries</div>
    												<div class="value">16</div>
    											</div>
    											<div class="summary-row">
    												<div class="field">Total Price</div>
    												<div class="value"><i class="fa fa-rupee"></i> 105.00</div>
    											</div>
    											<div class="summary-row">
    												<div class="pull-left">Active From</div>
    												<div class="pull-right">Aug 17, 2018 To Aug 23, 2018</div>
    											</div>
                          <p class="active-tag">Weekdays</p>
    											<div class="item-info-day pull-right" style="width:auto;background:none;">
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
    									</td>
    								</tr>
    							</tbody>
    						</table>
    						<div class="pull-right">
    							<span class="btn-sm btn btn-warning"><i class="fa fa-pause"></i> Pause</span>
    							<span class="btn-sm btn btn-blue"><i class="fa fa-pencil"></i> Modify</span>
    						</div>
                <div class="clearfix"></div>
    					</div>
    				</div>
    				<div class="col-lg-4 col-sm-6 col-xs-12">
    					<div class="message message-outline bg-silver-lighter checkout-product-card">
    						<div class="media">
    						  <div class="media-left">
    							<img src="https://d2gxays8f387d8.cloudfront.net/prodstore/productimg_thumbs/mother_dairy_tadka_chach_400ml_f.jpg" class="media-object img-thumbnail" style="width:80px">
    						  </div>
    						  <div class="media-body">
    							<h4 class="media-heading text-muted"><span>Mother Dairy Toned Milk</span> <span class="pull-right">1 lt</span></h4>
    							<p class="text-muted">
    								<span>Price: <i class="fa fa-inr"></i>34</span>
    								<span class="pull-right">Qty: 1</span>
    							</p>
    						  </div>
    						</div>
    						<table class="table table-cart message" style="margin-bottom:0px">
    							<tbody>
    								<tr>
    									<td class="cart-summary" style="border:0;">
    										<div class="summary-container">
    											<div class="summary-row">
    												<div class="pull-left">Total Deliveries</div>
    												<div class="pull-right">16</div>
    											</div>
    											<div class="summary-row">
    												<div class="pull-left">Total Price</div>
    												<div class="pull-right"><i class="fa fa-rupee"></i> 105.00</div>
    											</div>
    											<div class="summary-row">
    												<div class="pull-left">Active From</div>
    												<div class="pull-right">Aug 17, 2018 To Aug 23, 2018</div>
    											</div>
                          <p class="active-tag">3 Days Alternate</p>
    											<div class="item-info-day pull-right" style="width:auto;background:none;"></div>
    										</div>
    									</td>
    								</tr>
    							</tbody>
    						</table>
    						<div class="pull-right">
    							<span class="btn-sm btn btn-warning"><i class="fa fa-pause"></i> Pause</span>
    							<span class="btn-sm btn btn-blue"><i class="fa fa-pencil"></i> Modify</span>
    						</div>
                <div class="clearfix"></div>
    					</div>
    				</div>
            <div class="col-lg-4 col-sm-6 col-xs-12">
              <div class="message message-outline bg-silver checkout-product-card">
                <div class="media">
                  <div class="media-left">
                  <img src="https://d2gxays8f387d8.cloudfront.net/prodstore/productimg_thumbs/mother_dairy_tadka_chach_400ml_f.jpg" class="media-object img-thumbnail" style="width:80px">
                  </div>
                  <div class="media-body">
                  <h4 class="media-heading text-muted"><span>Mother Dairy Toned Milk</span> <span class="pull-right">1 lt</span></h4>
                  <p class="text-muted">
                    <span>Price: <i class="fa fa-inr"></i> 34</span>
                    <span class="pull-right">Qty: 1</span>
                  </p>
                  </div>
                </div>
                <table class="table table-cart message" style="margin-bottom:0px">
                  <tbody>
                    <tr>
                      <td class="cart-summary" style="border:0;">
                        <div class="summary-container">
                          <div class="summary-row">
                            <div class="field">Total Deliveries</div>
                            <div class="value">16</div>
                          </div>
                          <div class="summary-row">
                            <div class="field">Total Price</div>
                            <div class="value"><i class="fa fa-rupee"></i> 105.00</div>
                          </div>
                          <div class="summary-row">
                            <div class="pull-left">Active From</div>
                            <div class="pull-right">Aug 17, 2018 To Aug 23, 2018</div>
                          </div>
                          <p class="active-tag">Weekdays</p>
                          <div class="item-info-day pull-right" style="width:auto;background:none;">
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
                      </td>
                    </tr>
                  </tbody>
                </table>
                <div class="pull-right">
                  <span class="btn-sm btn btn-warning"><i class="fa fa-pause"></i> Pause</span>
                  <span class="btn-sm btn btn-blue"><i class="fa fa-pencil"></i> Modify</span>
                </div>
                <div class="clearfix"></div>
              </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-xs-12">
              <div class="message message-outline bg-silver checkout-product-card">
                <div class="media">
                  <div class="media-left">
                  <img src="https://d2gxays8f387d8.cloudfront.net/prodstore/productimg_thumbs/mother_dairy_tadka_chach_400ml_f.jpg" class="media-object img-thumbnail" style="width:80px">
                  </div>
                  <div class="media-body">
                  <h4 class="media-heading text-muted"><span>Mother Dairy Toned Milk</span> <span class="pull-right">1 lt</span></h4>
                  <p class="text-muted">
                    <span>Price: <i class="fa fa-inr"></i>34</span>
                    <span class="pull-right">Qty: 1</span>
                  </p>
                  </div>
                </div>
                <table class="table table-cart message" style="margin-bottom:0px">
                  <tbody>
                    <tr>
                      <td class="cart-summary" style="border:0;">
                        <div class="summary-container">
                          <div class="summary-row">
                            <div class="pull-left">Total Deliveries</div>
                            <div class="pull-right">16</div>
                          </div>
                          <div class="summary-row">
                            <div class="pull-left">Total Price</div>
                            <div class="pull-right"><i class="fa fa-rupee"></i> 105.00</div>
                          </div>
                          <div class="summary-row">
                            <div class="pull-left">Active From</div>
                            <div class="pull-right">Aug 17, 2018 To Aug 23, 2018</div>
                          </div>
                          <p class="active-tag">3 Days Alternate</p>
                          <div class="item-info-day pull-right" style="width:auto;background:none;"></div>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
                <div class="pull-right">
                  <span class="btn-sm btn btn-warning"><i class="fa fa-pause"></i> Pause</span>
                  <span class="btn-sm btn btn-blue"><i class="fa fa-pencil"></i> Modify</span>
                </div>
                <div class="clearfix"></div>
              </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-xs-12">
    					<div class="message message-outline bg-silver checkout-product-card">
    						<div class="media">
    						  <div class="media-left">
    							<img src="https://d2gxays8f387d8.cloudfront.net/prodstore/productimg_thumbs/mother_dairy_tadka_chach_400ml_f.jpg" class="media-object img-thumbnail" style="width:80px">
    						  </div>
    						  <div class="media-body">
    							<h4 class="media-heading text-muted"><span>Mother Dairy Toned Milk</span> <span class="pull-right">1 lt</span></h4>
    							<p class="text-muted">
    								<span>Price: <i class="fa fa-inr"></i> 34</span>
    								<span class="pull-right">Qty: 1</span>
    							</p>
    						  </div>
    						</div>
    						<table class="table table-cart message" style="margin-bottom:0px">
    							<tbody>
    								<tr>
    									<td class="cart-summary" style="border:0;">
    										<div class="summary-container">
    											<div class="summary-row">
    												<div class="field">Total Deliveries</div>
    												<div class="value">16</div>
    											</div>
    											<div class="summary-row">
    												<div class="field">Total Price</div>
    												<div class="value"><i class="fa fa-rupee"></i> 105.00</div>
    											</div>
    											<div class="summary-row">
    												<div class="pull-left">Active From</div>
    												<div class="pull-right">Aug 17, 2018 To Aug 23, 2018</div>
    											</div>
                          <p class="active-tag">Weekdays</p>
    											<div class="item-info-day pull-right" style="width:auto;background:none;">
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
    									</td>
    								</tr>
    							</tbody>
    						</table>
    						<div class="pull-right">
    							<span class="btn-sm btn btn-warning"><i class="fa fa-pause"></i> Pause</span>
    							<span class="btn-sm btn btn-blue"><i class="fa fa-pencil"></i> Modify</span>
    						</div>
                <div class="clearfix"></div>
    					</div>
    				</div>
    				<div class="col-lg-4 col-sm-6 col-xs-12">
    					<div class="message message-outline bg-silver checkout-product-card">
    						<div class="media">
    						  <div class="media-left">
    							<img src="https://d2gxays8f387d8.cloudfront.net/prodstore/productimg_thumbs/mother_dairy_tadka_chach_400ml_f.jpg" class="media-object img-thumbnail" style="width:80px">
    						  </div>
    						  <div class="media-body">
    							<h4 class="media-heading text-muted"><span>Mother Dairy Toned Milk</span> <span class="pull-right">1 lt</span></h4>
    							<p class="text-muted">
    								<span>Price: <i class="fa fa-inr"></i>34</span>
    								<span class="pull-right">Qty: 1</span>
    							</p>
    						  </div>
    						</div>
    						<table class="table table-cart message" style="margin-bottom:0px">
    							<tbody>
    								<tr>
    									<td class="cart-summary" style="border:0;">
    										<div class="summary-container">
    											<div class="summary-row">
    												<div class="pull-left">Total Deliveries</div>
    												<div class="pull-right">16</div>
    											</div>
    											<div class="summary-row">
    												<div class="pull-left">Total Price</div>
    												<div class="pull-right"><i class="fa fa-rupee"></i> 105.00</div>
    											</div>
    											<div class="summary-row">
    												<div class="pull-left">Active From</div>
    												<div class="pull-right">Aug 17, 2018 To Aug 23, 2018</div>
    											</div>
                          <p class="active-tag">3 Days Alternate</p>
    											<div class="item-info-day pull-right" style="width:auto;background:none;"></div>
    										</div>
    									</td>
    								</tr>
    							</tbody>
    						</table>
    						<div class="pull-right">
    							<span class="btn-sm btn btn-warning"><i class="fa fa-pause"></i> Pause</span>
    							<span class="btn-sm btn btn-blue"><i class="fa fa-pencil"></i> Modify</span>
    						</div>
                <div class="clearfix"></div>
    					</div>
    				</div>
    			</div>
        </div>
      </div>
    </div>
</div>
<?php $this->load->view("common/footer.php");?>
