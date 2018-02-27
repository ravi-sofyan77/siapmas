<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/grid.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/scooter.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.css" />
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Mukta+Malar" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/custom.css" />
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
	<?php if(isset($css_files) && isset($js_files)) : ?>

	<?php foreach($css_files as $file): ?>
			<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
	<?php endforeach; ?>
	<?php foreach($js_files as $file): ?>
		<script src="<?php echo $file; ?>"></script>
	<?php endforeach; ?>

	<?php endif; ?>
</head>
<body>
	<div class="background-admin-1">
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top admin_navbar">
		<div class="container">
		<img class="img-responsive logo" src="<?php echo base_url();?>assets/images/logoittelkom.png" />
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav mr-auto">
				<?php
					if (isset($menu)) {
						$li ='';
						foreach ($menu as $key => $value) {
							$li .='<li class="nav-item">'.anchor($value['url'], ucwords($value['label']), array('class'=>'nav-link')).'</li>';
						}
						echo $li;
					}
				?>
		    </ul>
		    <ul class="navbar-nav ml-auto">
		      <li class="nav-item">
		    	<?php echo anchor('auth/logout', ucwords('logout'), array('class'=>'nav-link'))?>
		      </li>
		    </ul>
		  </div>
		</div>
		</nav>
		<hr class="u-mar-bottom-m" />
		<div class="row" style="margin-top: 125px;">
			<div class="col-xs-12 col-md-12">
				<?php echo (isset($alert))? $alert : '' ;?>
				
				<?php 
				
				if (isset($content)) {
					echo $content;
				}elseif (isset($output)) {
					echo $output;
				}
				
				?>	
				

			</div>		
	</div>
</div>
<div class="footer">
	<div class="container">
	<div class="row">
		<div class="col-md-3">

		<p style="margin-top: 25px;">Layanan</p><small>info@ittelkom.ac.id</small>
		</div>
		<div class="col-md-3">
		<p style="margin-top: 25px;">Layanan Telephone</p><small>+6285-0920-3902</small>
		</div>
	</div>
	</div>
</div>
</div>
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/rifqi.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/custom/js/sipitt.core.js"></script>
</body>
</html>