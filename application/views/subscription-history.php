<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view("common/header.php");?>
<style>
@media screen and (min-device-width: 300px) and (max-device-width: 767px)  {
.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {padding: 4px 0px;}
#subscription-history-table > thead{ display: none; }
#subscription-history-table {display: block; }
#subscription-history-table > tbody{width: 100% !important;display: inline-block;}
#subscription-history-table > tbody > tr{ border: 1px solid #eee; display: inline-block; width: 100%; }
#subscription-history-table > tbody > tr > td{display: block; position: relative !important; padding-left: 50% !important; width: 50% !important; }
#subscription-history-table > tbody > tr > td:before {position: absolute; top: 6px; left: 6px; width: 50%; white-space: nowrap;font-weight: bold;}
#subscription-history-table > tbody > tr > td img{height: 50% !important;}
#subscription-history-table > tbody > tr > td:nth-of-type(1){height: 20px;}
#subscription-history-table > tbody > tr > td:nth-of-type(1):before { content: "View Products"; }
#subscription-history-table > tbody > tr > td:nth-of-type(2):before { content: "TXN#"; }
#subscription-history-table > tbody > tr > td:nth-of-type(3):before { content: "Total Items"; }
#subscription-history-table > tbody > tr > td:nth-of-type(4):before { content: "Delivery Charges"; }
#subscription-history-table > tbody > tr > td:nth-of-type(5):before { content: "Total Amount"; }
#subscription-history-table > tbody > tr > td:nth-of-type(6):before { content: "Delivery Date"; }
.table > tbody > tr > td > div > table{width: 100% !important;}
.table > tbody > tr > td > div > table > tbody > tr:nth-of-type(1){display: none;}
.table > tbody > tr > td > div > table > tbody > tr{display: block; background:#fbf5ef; width: 100%; position: relative;}
.table > tbody > tr > td > div > table:after, .table > tbody > tr > td > div > table:before {bottom: 100%; left: 53%; border: solid transparent; content: " "; height: 0; width: 0; position: absolute; pointer-events: none; }
.table > tbody > tr > td > div > table:before {border-color: rgba(236, 118, 237, 0); border-bottom-color: #ecbc89; border-width: 10px; margin-left: -20px; }
.table > tbody > tr > td > div > table > tbody > tr > td{display: block; position: relative !important; padding-left: 47% !important; width: 50% !important; margin-bottom: 5px; }
.table > tbody > tr > td > div > table > tbody > tr > td:before {position: absolute; top: 6px; left: 6px; width: 50%; white-space: nowrap;font-weight: bold;}
.table > tbody > tr > td > div > table > tbody > tr > td:nth-of-type(1):before { content: "Image"; }
.table > tbody > tr > td > div > table > tbody > tr > td:nth-of-type(2):before { content: "Product"; }
.table > tbody > tr > td > div > table > tbody > tr > td:nth-of-type(3):before { content: "Unit"; }
.table > tbody > tr > td > div > table > tbody > tr > td:nth-of-type(4):before { content: "MRP"; }
.table > tbody > tr > td > div > table > tbody > tr > td:nth-of-type(5):before { content: "Price"; }
.table > tbody > tr > td > div > table > tbody > tr > td:nth-of-type(6):before { content: "Quantity"; }
.table > tbody > tr > td > div > table > tbody > tr > td:nth-of-type(7):before { content: "Total"; }
}
</style>
<div class="section-container" id="checkout-cart">
    <div class="container">
        <div class="checkout">
            <div class="mycart-header bg-blue-theme">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                       Subscription Orders History
                    </div>
                </div>
            </div>
            <div class="checkout-body">
              <div class="text-muted">
      					<table class="table table-striped display" id="subscription-history-table">
      					  <thead>
      						<tr>
      						<th class="text-center"><i class="fa fa-plus-circle"></i></th>
      						<th>TRANSACTION</th>
      						<th>TOTAL ITEMS</th>
      						<th>DELIVERY CHARGE</th>
                  <th>TOTAL AMOUNT</th>
                  <th>DELIVERY DATE</th>
      						</tr>
      					  </thead>
      					  <tbody></tbody>
      					</table>
    				  </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view("common/footer.php",["pageName"=>"orderHistory"]);?>
