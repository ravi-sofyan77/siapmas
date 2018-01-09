<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Siap mas</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/dataTables.bootstrap4.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.css" />
	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/custom.css" />
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col">
				<?php echo (isset($alert))? $alert : '' ;?>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<?php echo (isset($content))? $content : '' ;?>			
			</div>
		</div>
	</div>
	
	
<script type="text/javascript" 
	src="<?php echo base_url();?>assets/js/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script 
	type="text/javascript" 
	src="<?php echo base_url();?>assets/js/popper.min.js"></script>
<!--<script 
	type="text/javascript" 
	src="<?php //echo base_url();?>assets/js/jquery.dataTables.min.js"></script>-->
<script 
	type="text/javascript" 
	src="<?php echo base_url();?>assets/js/dataTables.bootstrap4.min.js"></script>
<script 
	type="text/javascript" 
	src="<?php echo base_url();?>assets/js/bootstrap.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		
		if ($('#basic-datatables').length == 1) {
        	
			$('#basic-datatables').DataTable();
		}
	});
</script>
</body>
</html>