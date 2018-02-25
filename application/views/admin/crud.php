<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
</head>
<body>
	<div>
		<a href='<?php echo site_url('auth/index')?>'>
			<?php echo ucwords('pengguna');?>
		</a> |
		<a href='<?php echo site_url('admin/daftar_prasarana')?>'>
			<?php echo ucwords('prasarana');?>
		</a> |
		<a href='<?php echo site_url('admin/daftar_sarana')?>'>
			<?php echo ucwords('sarana');?>
		</a> |
				
	</div>
	<div style='height:20px;'></div>  
    <div>
		<?php echo $output; ?>
    </div>
</body>
</html>
