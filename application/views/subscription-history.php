<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view("common/header.php");?>
<div class="section-container" id="checkout-cart">
    <div class="container">
        <div class="checkout">
            <form action="#" method="POST" name="form_checkout">
                <div class="mycart-header bg-blue-theme">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                           Subscription History
                        </div>
                    </div>
                </div>
                <div class="checkout-body">
                    <div class="panel-group" id="accordionaccp">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    <div class="row">
                                        <div class="col-md-1 col-sm-1 col-xs-3 expand-brn">
                                            <a class="accordion-toggle m-l-5" data-toggle="collapse" data-parent="#accordionaccp" href="#collapseOne">
                                                <i class="indicator glyphicon glyphicon-minus"></i>
                                            </a>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-5"><i class="fa fa-calendar"></i> June/16/2018</div>
                                        <div class="col-md-2 col-sm-2 col-xs-4">Items (<b>2</b>)</div>
                                       <div class="col-md-3 col-sm-3 col-xs-6 mob-m-t-10 mob-txt-r">Total Amount<br class="hidden-lg hidden-md hidden-sm"> <b><i class="fa fa-rupee"></i>100.00</b></div>
                                        <div class="col-md-3 col-sm-3 col-xs-6 mob-m-t-10 mob-txt-r">Delivery Charges<br class="hidden-lg hidden-md hidden-sm"> <b><i class="fa fa-rupee"></i>20.00</b></div>
                                    </div>
                                </div>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <div class="panel-body p-l-0 p-r-0 p-t-0">
                                    <div class="custom-responsive-table history-products-list">
                                        <table class="table table-cart">
                                            <thead>
                                                <tr>
                                                    <th>Image</th>
                                                    <th>Product Name</th>
                                                    <th>MRP</th>
                                                    <th>Price</th>
                                                    <th class="text-center">Quantity</th>
                                                    <th class="text-center">Total</th>
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
                                                    <td data-title="MRP" class="text-left">
                                                        <b><i class="fa fa-rupee"></i> 21.00</b>
                                                    </td>
                                                    <td data-title="Price" class="text-left">
                                                        <b><i class="fa fa-rupee"></i> 20.00</b>
                                                    </td>
                                                    <td data-title="Quantity" class="text-center"> 2</td>
                                                    <td data-title="Total" class="text-center">
                                                        <b class="f-s-16"><i class="fa fa-rupee"></i> 42.00</b> 
                                                    </td>
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
                                                    <td data-title="MRP" class="text-left">
                                                        <b><i class="fa fa-rupee"></i> 21.00</b>
                                                    </td>
                                                    <td data-title="Price" class="text-left">
                                                        <b><i class="fa fa-rupee"></i> 20.00</b>
                                                    </td>
                                                    <td data-title="Quantity" class="text-center"> 2</td>
                                                    <td data-title="Total" class="text-center"> 
                                                        <b class="f-s-16"><i class="fa fa-rupee"></i> 42.00</b> 
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="w-100">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-6 col-xs-offset-0">
                                                <h5 class="text-right"><b>Payment Details</b></h5>
                                                <hr>
                                                <p class="text-right">Sub Total (<b><i class="fa fa-rupee"></i>40</b>) + Delivery Charge (<b><i class="fa fa-rupee"></i>2</b>) = Total <i class="fa fa-rupee"></i><b>42.00</b>  </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    <div class="row">
                                        <div class="col-md-1 col-sm-1 col-xs-3 expand-brn">
                                            <a class="accordion-toggle m-l-5" data-toggle="collapse" data-parent="#accordionaccp" href="#collapseTwo">
                                            <i class="indicator glyphicon glyphicon-plus"></i>
                                            </a>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-5"><i class="fa fa-calendar"></i> June/16/2018</div>
                                        <div class="col-md-2 col-sm-2 col-xs-4">Items (<b>2</b>)</div>
                                        <div class="col-md-3 col-sm-3 col-xs-6 mob-m-t-10 mob-txt-r">Total Amount<br class="hidden-lg hidden-md hidden-sm"> <b><i class="fa fa-rupee"></i>100.00</b></div>
                                        <div class="col-md-3 col-sm-3 col-xs-6 mob-m-t-10 mob-txt-r">Delivery Charges<br class="hidden-lg hidden-md hidden-sm"> <b><i class="fa fa-rupee"></i>20.00</b></div>
                                    </div>
                                </div>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse">
                                <div class="panel-body p-l-0 p-r-0 p-t-0">
                                    <div class="custom-responsive-table history-products-list">
                                        <table class="table table-cart">
                                            <thead>
                                                <tr>
                                                    <th>Image</th>
                                                    <th>Product Name</th>
                                                    <th>MRP</th>
                                                    <th>Price</th>
                                                    <th class="text-center">Quantity</th>
                                                    <th class="text-center">Total</th>
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
                                                    <td data-title="MRP" class="text-left">
                                                        <b><i class="fa fa-rupee"></i> 21.00</b>
                                                    </td>
                                                    <td data-title="Price" class="text-left">
                                                        <b><i class="fa fa-rupee"></i> 20.00</b>
                                                    </td>
                                                    <td data-title="Quantity" class="text-center"> 2</td>
                                                    <td data-title="Total" class="text-center">
                                                        <b class="f-s-16"><i class="fa fa-rupee"></i> 42.00</b> 
                                                    </td>
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
                                                    <td data-title="MRP" class="text-left">
                                                        <b><i class="fa fa-rupee"></i> 21.00</b>
                                                    </td>
                                                    <td data-title="Price" class="text-left">
                                                        <b><i class="fa fa-rupee"></i> 20.00</b>
                                                    </td>
                                                    <td data-title="Quantity" class="text-center"> 2</td>
                                                    <td data-title="Total" class="text-center"> 
                                                        <b class="f-s-16"><i class="fa fa-rupee"></i> 42.00</b> 
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="w-100">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-6 col-xs-offset-0">
                                                <h5 class="text-right"><b>Payment Details</b></h5>
                                                <hr>
                                                <p class="text-right">Sub Total (<b><i class="fa fa-rupee"></i>40</b>) + Delivery Charge (<b><i class="fa fa-rupee"></i>2</b>) = Total <i class="fa fa-rupee"></i><b>42.00</b>  </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="checkout-footer bg-grey">
                    <div class="text-center">
                        <ul class="pagination m-t-0">
                            <li class="disabled"><a href="javascript:;">Previous</a></li>
                            <li class="active hidden-xs"><a href="javascript:;">1</a></li>
                            <li class="hidden-xs"><a href="javascript:;">2</a></li>
                            <li class="hidden-xs"><a href="javascript:;">3</a></li>
                            <li class="hidden-xs"><a href="javascript:;">4</a></li>
                            <li class="hidden-xs"><a href="javascript:;">5</a></li>
                            <li><a href="javascript:;">Next</a></li>
                        </ul>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $this->load->view("common/footer.php");?>