<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/grid.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/scooter.css">
	
	<style type="text/css">
	.dpx-badge {
		position:relative;
	}
	.dpx-badge[data-badge]:after {
		content:attr(data-badge);
		position:absolute;
		top:-10px;
		right:-10px;
		font-size:.7em;
		background:green;
		color:white;
		width:18px;height:18px;
		text-align:center;
		line-height:18px;
		border-radius:50%;
		box-shadow:0 0 1px #333;
	}
	</style>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="u-pad-vertical-m">
			<div class="col-xs-12 col-md-8">
				
					<img src="<?php echo base_url();?>assets/images/logoittelkom.png" /> 	
				
			</div>
			<div class="col-xs-12 col-md-4">
				<div class="clearfix">

	<h4 class="f4 u-l-fr u-mar-left-m">
		Iwan Firmawan dajdajsj
		<br/>
		<a href="index.html">Keluar</a>
	</h4>
	<div class=" u-l-fr">
		
		<a href="#">
			
			<figure class="c-avatar c-avatar--l ">
  				<img src="<?php echo base_url();?>assets/images/default-avatar.jpg" alt="Kristen Spilman" />
			</figure>
		</a>	
	</div>
	
	
				</div>
			</div>
			</div>
		</div>
		<hr class="u-mar-bottom-m" />
		<div class="row">
			<div class="col-xs-12">
				<?php echo (isset($alert))? $alert : '' ;?>
				<nav>
  <ul class="c-tab-nav" role="tablist">
    <li role="presentation" class="c-tab-nav__tab is-active">
      <button role="tab" aria-selected="true" tabindex="0">
      	Pending
      </button>
    </li>
    <li role="presentation" class="c-tab-nav__tab">
      <button class="dpx-badge" data-badge="3" role="tab" aria-selected="false" tabindex="-1">Proses</button>
    </li>
    <li role="presentation" class="c-tab-nav__tab">
      <button role="tab" aria-selected="false" tabindex="-1">Selesai</button>
    </li>
    <li role="presentation" class="c-tab-nav__tab">
      <button role="tab" aria-selected="false" tabindex="-1">Terarsip</button>
    </li>
  </ul>
</nav>
<?php echo (isset($content))? $content : '' ;?>	
			</div>
		</div>

	</div>

</body>
</html>