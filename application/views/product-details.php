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
						<h1 class="text-left product-title"><?=$details->product_name;?>  <span class="pull-right"><?=$details->unit;?></span></h1>
						<p class="text-muted text-left"><b>Brand: </b><?=$details->product_brand;?></p>						
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
						<span class="btn btn-warning no-radius btn-xs text-muted">2% OFF</span>
                        <div class="pull-right">
							<ul class="product-category">
								<li>Cut off Time</li>
								<li>-</li>
								<li><b><?=date("h:iA",strtotime($details->cutoff_time));?></b></li>
							</ul>
						</div>
						<div class="clearfix"></div>
                    </div>
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-sm-12 product-config-container">
							<ul class="nav nav-tabs">
							  <li class="active" style="width:50%;text-align:center"><a data-toggle="tab" href="#pattern-container">PATTERN</a></li>
							  <li style="width:50%;text-align:center"><a data-toggle="tab" href="#once-container">ONCE</a></li>
							</ul>
							<div class="tab-content">
							  <div id="pattern-container" class="tab-pane fade in active">
								Hello Testing
							  </div>
							  <div id="once-container" class="tab-pane fade">
								<p>Some content in menu 1.</p>
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