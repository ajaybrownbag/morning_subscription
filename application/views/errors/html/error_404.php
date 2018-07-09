<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view("common/header.php");?>
<div class="section-container bg-info">
	<div class="container">
		<!--<div class="col-lg-4 col-md-4 col-sm-12 text-right">
			<img src="<?=base_url("assets/img/404.png")?>">
		</div>-->
		<div class="col-lg-12 col-md-12 col-sm-12 text-center">
			<h1 class="fa-2x text-warning">404 ERROR! Page Not Found...</h1>
			<p class="text-muted" style="font-size:14px;">The page you are looking for might have been removed, had its name changed or is temporary unavailable.</p>
			<a href="<?=base_url();?>" class="btn btn-theme-blue">GO TO HOMEPAGE</a>
			<h1>&nbsp;</h1>
		</div>
	</div>
</div>
<?php $this->load->view("common/footer.php");?>