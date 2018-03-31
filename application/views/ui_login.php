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
		<div class="col-md-12">
			<div class="login">
				<?php echo (isset($alert))? $alert : '' ;?>
				<?php echo (isset($content))? $content : '' ;?>	
			</div>
		</div>
	</div>
</div>

	<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/rifqi.js"></script>
	<!--<script type="text/javascript" src="<?php //echo base_url();?>assets/custom/js/sipitt.core.js"></script>-->
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