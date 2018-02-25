<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/grid.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/scooter.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.min.css">
	
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
	<?php if(isset($css_files) && isset($js_files)) : ?>

	<?php foreach($css_files as $file): ?>
			<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
	<?php endforeach; ?>
	<?php foreach($js_files as $file): ?>
		<script src="<?php echo $file; ?>"></script>
	<?php endforeach; ?>

	<?php endif; ?>
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
	.c-launcher{
		margin-bottom: 8px; 
	}
	.c-launcher h3{
		border: 2px solid #007eee;
		padding: 25px;
		border-radius: 0.5em;
	}
	.c-launcher a{
		text-decoration: none;
	}
	
	/*i[class^="fa "]{
		font-size: 48px;
	}
	.c-btn:not(button):not([type=submit]) {
    	outline: 0px solid #fff !important;
	}*/
	</style>
</head>
<body>
	
	<div class="container">
		<div class="row">
			<div class="u-pad-vertical-m">
			<div class="col-xs-12 col-md-4">
				<?php
					if (isset($me)) {
						echo "<a href='".site_url($me)."'>";
					}else{
						echo "<a href='#'>";
					}
				?>
					<img src="<?php echo base_url();?>assets/images/logoittelkom.png" /> 	
				</a>
			</div>
			<div class="col-xs-12 col-md-4">
				<div class="u-font-right">
					
				</div>
			</div>
			<div class="col-xs-12 col-md-4">
				<div class="u-font-right">
					<?php
						if (isset($my['username'])) {
							echo ucwords($my['username']);
						}
					?>
					<br/>
					<?php
						echo anchor('auth/logout','Keluar');
					?>
				</div>
			</div>
			</div>

		</div>
		<hr class="u-mar-bottom-m" />
		<!--
		<div class="row">
			<div class="col-xs-12">
				<ul class="c-tab-nav" role="tablist" style="margin-bottom: 15px;">
<?php
	/*
	if (isset($tabs) && isset($tab_active)) { 
		if ($tabs) {
			foreach ($tabs as $key => $value) {
				if (
					$tab_active == $value ||
					(empty($tab_active) && $value == 'pending')
					) {
					echo '<li role="presentation" class="c-tab-nav__tab is-active">';
				}else{
					echo '<li role="presentation" class="c-tab-nav__tab">';
				}
				if (isset($method) && isset($me)) {
					$site_url = $me.'/'.$method.'/'.$value;
					echo anchor($site_url,ucwords($value));
				}else{
					echo anchor('/',ucwords($value));	
				}
				
				echo '</li>';
			}
		}
	}*/
?>
</ul>
			</div>
		</div>-->
		<div class="row">
			<div class="col-xs-12 col-md-10">
				<?php echo (isset($alert))? $alert : '' ;?>
				
				<?php 
				
				if (isset($content)) {
					echo $content;
				}elseif (isset($output)) {
					echo $output;
				}
				
				?>	
				

			</div>
			<div class="col-xs-12 col-md-2">
				<!-- The `dividers` modifier adds dividers between the items -->
<ul class="o-list-ui o-list-ui--dividers">
	<li><?php echo anchor($me.'/index', ucwords('beranda'))?></li>
	<?php
		if (isset($menu)) {
			$li ='';
			foreach ($menu as $key => $value) {
				$label = str_replace('_', ' ', $value['label']);
				$li .='<li>'.anchor($value['url'], ucwords($label)).'</li>';
			}
			echo $li;
		}
	?>
	<li><?php echo anchor('auth/logout', ucwords('logout'))?></li>
</ul>

			</div>		
	</div>

</body>
</html>