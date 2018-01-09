<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Siap mas</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/custom.css" />
</head>

<body>
	 <!-- ini navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<div class="container">
	<a class="navbar-brand" href="index.html">IT Telkom</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
	</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ml-auto">
				  <li class="nav-item active">
				    <a class="nav-link" href="#">Notif[5]</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" href="#">Mahasiswa</a>
				  </li>
				</ul>
		</div>
	</div>
</nav>
<!-- navbar -->

<div class="content-1">
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
</div>
	
<script 
	type="text/javascript" 
	src="<?php echo base_url();?>assets/js/jquery-1.11.3.min.js"></script>
<script 
	type="text/javascript" 
	src="<?php echo base_url();?>assets/js/popper.min.js"></script>
<script 
	type="text/javascript" 
	src="<?php echo base_url();?>assets/js/bootstrap.js"></script>
<script 
	type="text/javascript" 
	src="<?php echo base_url();?>assets/holderjs/holder.js"></script>

</body>
</html>