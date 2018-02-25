<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/grid.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/scooter.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.css" />
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
	<style type="text/css">
		input.c-validation-email:valid {
  			color: green;
		}
		input.c-validation-email:invalid {
  			color: red;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="u-pad-vertical-m">
			<div class="col-xs-12 col-md-4">
				
					<img src="<?php echo base_url();?>assets/images/logoittelkom.png" /> 	
				
			</div>
			<div class="col-xs-12 col-md-4">
				<div class="u-font-right">
					<code class="u-font-meta">Layanan Telephone</code>
					<h2 class="f2">+6285-0920-3902</h2>
				</div>
			</div>
			<div class="col-xs-12 col-md-4">
				<div class="u-font-right">
					<code class="u-font-meta">Layanan Email</code>
					<a href="mailto:info@ittelkom.ac.id">
						<h2 class="f2">info@ittelkom.ac.id</h2>
					</a>	
				</div>
			</div>
			</div>

		</div>
		<hr class="u-mar-bottom-m" />
		<div class="row">
			<div class="col-xs-12 col-md-8">
				<div class="row">
					<div class="col-xs-12">
<h2 class="f2">
	<strong>Siap IT Telkom</strong><br/>
	<small>Sistem Pengaduan Kampus IT Telkom Purwokerto</small>
</h2>
<p class="u-font-justify" >
	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
</p>

<h2 class="f3">
	<strong>3 Langkah Mudah Melakukan Pengaduan</strong><br/>
	</h2>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-md-4">
						<img src="<?php echo base_url();?>assets/images/illos.gif" class="col-xs-12" />
						<p class="u-pad-m">
							This is a card with a Northwest arrow. 
							<br/>You can nest components, you know.
							<br/><a href="#">Pelajari selengkapnya</a>
						</p>
				
					</div>
					<div class="col-xs-12 col-md-4">
						<img src="<?php echo base_url();?>assets/images/fastrak_dribbble.gif" class="col-xs-12" />
						<p class="u-pad-m">
							This is a card with a Northwest arrow. 
							<br/>You can nest components, you know.
							<br/><a href="#">Pelajari selengkapnya</a>
						</p>
							
					</div>
					<div class="col-xs-12 col-md-4">
						<img src="<?php echo base_url();?>assets/images/never-lose-a-file-again.gif" class="col-xs-12" />
						<p class="u-pad-m">
							This is a card with a Northwest arrow. 
							<br/>You can nest components, you know.
							<br/><a href="#">Pelajari selengkapnya</a>
						</p>
				
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-4">
				
				<?php echo (isset($alert))? $alert : '' ;?>
				
				<?php echo (isset($content))? $content : '' ;?>			
				
			</div>		
	</div>
	<script type="text/javascript" src="<?php echo base_url();?>assets/custom/js/sipitt.core.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			if ($('.close').length > 0 || $('.c-banner').length > 0) {
				
				$(document).on('click','.close',function(){
					$('.c-banner').css('display','none');
				});
			}
		});
	</script>
</body>
</html>