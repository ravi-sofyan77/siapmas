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

<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top checknavbar">
<div class="container">
<img class="img-responsive logo" src="<?php echo base_url();?>assets/images/logoittelkom.png" />
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</div>
</nav>

<div class="pengaduan">
	<div class="container">
	<div class="row">
		<div class="col-xs-12 text-center">
		<h1 style="margin-top: 125px;" class="judul-2">
			Sistem Pengaduan Kampus
			</h1>
		<h2 class="judul-3" style="margin-bottom: 75px; ">
			Institut Teknologi Telkom Purwokerto
		</h2>
		</div>
		<div class="background-putih">

			<h1 class="judul-1 text-center">3 Langkah Mudah Melakukan Pengaduan</h1>

		<div class="col-xs-12 col-md-4">
			<img src="<?php echo base_url();?>assets/images/illos.gif" class="img-responsive" style="width: 100%;" />
			<p class="text-center" style="margin-top: 25px; margin-bottom: 10px;">
				<b style="font-size: 1.2em; color: #000;">1. Melakukan Register</b> <br/>
			</p>
			<p class="text-center">
				Silahkan melakukan register terlebih dahulu.
			</p>
	
		</div>
		<div class="col-xs-12 col-md-4">
			<img src="<?php echo base_url();?>assets/images/fastrak_dribbble.gif" class="img-responsive" style="width: 100%;" />
			<p class="text-center" style="margin-top: 25px; margin-bottom: 10px;">
				<b style="font-size: 1.2em; color: #000;">2. Melakukan Login</b> <br/>
			</p>
			<p class="text-center">
				Kemudian melakukan login.
			</p>
				
		</div>
		<div class="col-xs-12 col-md-4">
			<img src="<?php echo base_url();?>assets/images/never-lose-a-file-again.gif" class="img-responsive" style="width: 100%;" />
			<p class="text-center" style="margin-top: 25px; margin-bottom: 10px;">
				<b style="font-size: 1.2em; color: #000;">3. Melakukan Pengaduan</b> <br/>
			</p>
			<p class="text-center">
				Lakukan pengaduan sesuai permasalahan.
			</p>
	
		</div>
		<div class="col-md-12 text-center" style="margin-top: 150px; margin-bottom: 75px;">
			<a href="<?=base_url('auth/register')?>" class="btn btn-primary custom-register">Register</a>
			<a href="<?=base_url('auth/login')?>" class="btn btn-primary custom-login">Login Sekarang</a>
		</div>

<!-- 				<div class="col-xs-12" style="margin-bottom: 100px;">
					<div class="text-center">
						<h1 class="judul-h1" style="margin-bottom: 60px; padding-top: 50px;" class="text-center">
							<strong>Sistem Pengaduan Kampus<br/> IT Telkom Purwokerto</strong>
						</h1>
						<p class="u-font-justify" style="margin-left: 100px; margin-right: 100px;">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
						</p>
					</div>

				</div> -->
<!-- 			<div class="col-xs-12 col-md-4">
				
				<?php echo (isset($alert))? $alert : '' ;?>
				
				<?php echo (isset($content))? $content : '' ;?>			
				
			</div>	 -->	
		</div>

	</div>
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
<?php echo (isset($alert))? $alert : '' ;?>
				<?php echo (isset($content))? $content : '' ;?>	
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/rifqi.js"></script>
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