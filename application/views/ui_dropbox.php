<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/grid.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/scooter.css">
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
				$li .='<li>'.anchor($value['url'], ucwords($value['label'])).'</li>';
			}
			echo $li;
		}
	?>
	<li><?php echo anchor('auth/logout', ucwords('logout'))?></li>
</ul>
				<?php

					

				?>

			</div>		
	</div>

</body>
</html>