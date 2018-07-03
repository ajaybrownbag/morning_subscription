<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view("common/header.php");?>
<div class="section-container" id="checkout-cart">
    <div class="container">
        <div class="checkout">
            <form action="#" method="POST" name="form_checkout">
                <div class="mycart-header bg-blue-theme">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                           Active Subscription
                        </div>
                    </div>
                </div>
                <div class="checkout-body">
                    <div class="well-area well-sm-custom bg-efefef">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-6">
                             <span class="m-l-10"><img src="assets/img/vacation-icon.png"> Are you going on a vacation ?</span>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <button class="btn btn-xs btn-blue pull-right m-t-3 m-r-10" data-toggle="collapse" data-parent="#accordionaccp" href="#collapseOne">SET VACATION</button>
                            </div>
                        </div>
                            <div id="collapseOne" class="panel-collapse collapse m-t-10 mob-m-l-r-10-10">
                                <div class="panel-body bg-white">
                                    <h4>Select Vacation Date Range</h4>
                                    <div class="warning-msg well-sm-custom alert alert-danger fade in alert-dismissible">If you are going on a vacation, you can put all subscription products on hold by giving vacation date.</div>
                                    <div class="w-100">
                                        <h5><i class="fa fa-calendar"></i> Select Vacation Date Range</h5>
                                        <form id="form" name="form" class="form-inline">
                                            <div class="form-group col-xs-6 p-l-0">
                                                <label for="startDate">Start Date</label>
                                                <input id="startDate" name="startDate" type="text" class="form-control" />
                                            </div>
                                            <div class="form-group col-xs-6 p-r-0">
                                                <label for="endDate">End Date</label>
                                                <input id="endDate" name="endDate" type="text" class="form-control" />
                                            </div>
                                        </form>
                                    </div>
                                    <div class="w-100">
                                        <button class="btn btn-xs btn-blue pull-right">SAVE</button>
                                        <button class="btn btn-xs btn-default pull-right m-r-10">CANCEL</button>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="custom-responsive-table">
                        <table class="table table-cart">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>MRP</th>
                                    <th>Quantity</th>
                                    <th class="text-center">Total Delivery</th>
                                    <th class="text-left">Active Date<br><span class="text-success">End Date</span></th>
                                    <th class="text-left">Selected Date</th>
                                    <th class="text-center">Total Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td data-title="Image">
                                        <div class="cart-pd-img">
                                            <img src="https://d2gxays8f387d8.cloudfront.net/prodstore/productimg_thumbs/mother_dairy_cow_milk_500ml_f.jpg" alt="" />
                                        </div>
                                    </td>
                                    <td data-title="Product">
                                       <div class="cart-product-info">
                                            <div class="title">Mother Dairy Toned Milk</div>
                                            <div class="desc"><b>1 liter</b></div>
                                        </div> 
                                    </td>
                                    <td data-title="MRP" class="text-left"><b><i class="fa fa-rupee"></i> 21.00</b></td>
                                    <td data-title="Quantity" class="text-center">2</td>
                                    <td data-title="Total Delivery" class="text-center"> 2</td>
                                    <td data-title="Active/End Date">June 16, 2018<br><span class="text-success">June 31, 2018</span></td>
                                    <td data-title="Selected Date"> 
                                        <div class="cart-info-day">
                                                <ul>
                                                    <li class="active">M</li>
                                                    <li>T</li>
                                                    <li class="active">W</li>
                                                    <li>T</li>
                                                    <li class="active">F</li>
                                                    <li>S</li>
                                                    <li class="active">S</li>
                                                </ul>
                                                <div class="w-100 m-t-10">
                                                    <button class="btn btn-xs btn-xs btn-blue m-l-5"><i class="fa fa-pause"></i> PAUSE</button>
                                                    <button class="btn btn-xs btn-xs btn-blue m-l-5"><i class="fa fa-pencil"></i> MODIFY</button>
                                                </div>
                                        </div>
                                     </td>
                                    <td data-title="Total Price" class="text-center"> <b class="f-s-16"><i class="fa fa-rupee"></i> 42.00</b> </td>
                                </tr>
                                <tr>
                                    <td data-title="Image">
                                        <div class="cart-pd-img">
                                            <img src="https://d2gxays8f387d8.cloudfront.net/prodstore/productimg_thumbs/mother_dairy_cow_milk_500ml_f.jpg" alt="" />
                                        </div>
                                    </td>
                                    <td data-title="Product">
                                       <div class="cart-product-info">
                                            <div class="title">Mother Dairy Toned Milk</div>
                                            <div class="desc"><b>1 liter</b></div>
                                        </div> 
                                    </td>
                                    <td data-title="MRP" class="text-left"><b><i class="fa fa-rupee"></i> 21.00</b></td>
                                    <td data-title="Quantity" class="text-center">2</td>
                                    <td data-title="Total Delivery" class="text-center"> 2</td>
                                    <td data-title="Active/End Date">June 16, 2018<br><span class="text-success">June 31, 2018</span></td>
                                    <td data-title="Selected Date">
                                        <div class="cart-info-day">
                                            <ul>
                                                <li class="active">M</li>
                                                <li>T</li>
                                                <li class="active">W</li>
                                                <li>T</li>
                                                <li class="active">F</li>
                                                <li>S</li>
                                                <li class="active">S</li>
                                            </ul>
                                            <div class="w-100 m-t-10">
                                                   <button class="btn btn-xs btn-xs btn-blue m-l-5"><i class="fa fa-pause"></i> PAUSE</button>
                                                    <button class="btn btn-xs btn-xs btn-blue m-l-5"><i class="fa fa-pencil"></i> MODIFY</button>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-title="Total Price" class="text-center"> <b class="f-s-16"><i class="fa fa-rupee"></i> 42.00</b> </td>
                                </tr>
                                
                            </tbody>
                        </table>
                        <div class="table-responsive">
                            <table class="table table-cart">
                                <tbody>
                                    <tr>
                                        <td class="cart-summary">
                                            <div class="summary-container">
                                            <h5><b>Payment Details</b></h5>
                                            <hr>
                                                <div class="summary-row">
                                                    <div class="field">Active Subscription Amount</div>
                                                    <div class="value"><i class="fa fa-rupee"></i> 10.00</div>
                                                </div>
                                                <div class="summary-row">
                                                    <div class="field">Total Delivery Charges</div>
                                                    <div class="value"><i class="fa fa-rupee"></i> 10.00</div>
                                                </div>
                                                <div class="summary-row">
                                                    <div class="field"><small class="text-success">Total Delivery days are 0.</small></div>
                                                    <div class="value"></div>
                                                </div>
                                                <div class="summary-row">
                                                    <div class="field">WalletCash for Subscription</div>
                                                    <div class="value"><i class="fa fa-rupee"></i> 10.00</div>
                                                </div>
                                                <div class="summary-row total">
                                                    <div class="field">Total</div>
                                                    <div class="value"><i class="fa fa-rupee"></i> 500.00</div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="checkout-footer bg-grey">
                    <a href="#" class="btn btn-white btn-lg pull-left">Continue Subscription</a>
                    <button type="submit" class="btn btn-blue btn-lg p-l-30 p-r-30 m-l-10">Cancel Subscription</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $this->load->view("common/footer.php");?>