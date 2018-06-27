<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view("common/header.php");?>
<div class="section-container" id="checkout-cart">
    <div class="container">
        <div class="checkout">
            <form action="#" method="POST" name="form_checkout">
                <div class="mycart-header bg-blue-theme">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                           My Cart
                        </div>
                    </div>
                </div>
                <div class="checkout-body">
                    <div class="well-area bg-efefef">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-6">
                            <p></p>
                             <i class="fa fa-bell"></i> Ring The Bell
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                				<div class="checkbox pull-right height35 m-b-0 m-t-0">
                				<label class="bellbtn">
                				<input type="checkbox" checked data-toggle="toggle">
                				</label>
                				</div>
                				<span class="pull-right m-r-10 m-t-5">Wake me up.</span>
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
                                    <th class="text-left">Start Date<br><span class="text-success">End Date</span></th>
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
                                    <td data-title="Product Name">
                                       <div class="cart-product-info">
                                            <div class="title">Mother Dairy Toned Milk</div>
                                            <div class="desc"><b>1 liter</b></div>
                                        </div> 
                                    </td>
                                    <td data-title="MRP" class="text-left"><b><i class="fa fa-rupee"></i> 21.00</b></td>
                                    <td data-title="Quantity" class="text-center">2</td>
                                    <td data-title="Total Delivery" class="text-center"> 2</td>
                                    <td data-title="Start/End Date">June 16, 2018<br><span class="text-success">June 31, 2018</span></td>
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
                                                    <button class="btn btn-xs btn-xs btn-grey"><i class="fa fa-trash"></i> REMOVE</button>
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
                                    <td data-title="Product Name">
                                       <div class="cart-product-info">
                                            <div class="title">Mother Dairy Toned Milk</div>
                                            <div class="desc"><b>1 liter</b></div>
                                        </div> 
                                    </td>
                                    <td data-title="MRP" class="text-left"><b><i class="fa fa-rupee"></i> 21.00</b></td>
                                    <td data-title="Quantity" class="text-center">2</td>
                                    <td data-title="Total Delivery" class="text-center"> 2</td>
                                    <td data-title="Start/End Date">June 16, 2018<br><span class="text-success">June 31, 2018</span></td>
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
                                                    <button class="btn btn-xs btn-xs btn-grey"><i class="fa fa-trash"></i> REMOVE</button>
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
                                                <div class="field">Cart Amount</div>
                                                <div class="value"><i class="fa fa-rupee"></i> 10.00</div>
                                            </div>
                                            <div class="summary-row">
                                                <div class="field">Modified Subscription</div>
                                                <div class="value"><i class="fa fa-rupee"></i> 10.00</div>
                                            </div>
                                            <div class="summary-row">
                                                <div class="field">Total Delivery Charges</div>
                                                <div class="value"><i class="fa fa-rupee"></i> 10.00</div>
                                            </div>
                                            <div class="summary-row">
                                                <div class="field">Used WalletCash</div>
                                                <div class="value"><i class="fa fa-rupee"></i> 10.00</div>
                                            </div>
                                            <div class="summary-row text-danger">
                                                <div class="field">Pending Subscription</div>
                                                <div class="value"><i class="fa fa-rupee"></i> 0.00</div>
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
                    <a href="#" class="btn btn-white btn-lg pull-left">Continue Shopping</a>
                    <button type="submit" class="btn btn-blue btn-lg p-l-30 p-r-30 m-l-10">Checkout</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $this->load->view("common/footer.php");?>