<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Siap mas</title>
<link rel="stylesheet" 
		type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.css" />
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
	<div class="col-12 col-md-4">
		
	</div>
	<div class="col-12 col-md-8">
		<div class="text-right">
		<!--
			anchor sama dengan html <a href="#" >
			untuk membuat tautan. 
		-->
		<?php echo anchor('auth/index', ucwords('beranda'))?> | 	
		<?php echo anchor('auth/create_user', lang('index_create_user_link'))?> | 
		<?php echo anchor('auth/create_group', lang('index_create_group_link'))?> |
		<?php echo anchor('admin/daftar_prasarana', ucwords('prasarana'))?> |
		<?php echo anchor('admin/daftar_sarana', ucwords('sarana'))?> |
		<?php echo anchor('auth/logout', 'logout')?>

		</div>
	</div>
</div>
		<div class="row">
			<div class="col">
				<?php echo (isset($alert))? $alert : '' ;?>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<?php echo (isset($content))? $content : '' ;?>
				<?php echo (isset($output))? $output : '' ;?>
			</div>
		</div>
	</div>
	
	
</body>
</html>