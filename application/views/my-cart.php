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
                  <div class="row">
                    <div class="col-sm-6">
                        <div class="message message-outline bg-silver-lighter">
                          <p class="pull-left">
                            <i class="fa f-s-16 fa-map-marker"></i> <b>Address:</b><br>Seema Apartment
                          </p>
                          <span class="pull-right"><button type="button" class="change-location btn btn-sm btn-blue no-radius">Change Location</button></span>
                          <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="message message-outline bg-silver-lighter">
                        <p class="pull-left">
                          <i class="fa f-s-16 fa-bell"></i> <b>Wake me up?</b><br>
                          <span>Ring The Bell</span>
                        </p>
                        <div class="pull-right checkbox" style="margin:0">
                            <label class="bellbtn">
                              <input type="checkbox" checked data-toggle="toggle">
                            </label>
                        </div>
                        <div class="clearfix"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="checkout-footer bg-success">
                    <a href="#" class="btn btn-blue btn-lg pull-left">Continue Shopping</a>
                    <button type="submit" class="btn btn-warning btn-lg p-l-30 p-r-30 m-l-10">Checkout</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $this->load->view("common/footer.php");?>
