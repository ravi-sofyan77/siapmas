<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Siap Mas</title>
	<link rel="stylesheet" type="text/css" 
		href="<?php echo base_url('assets/css/bootstrap.min.css');?>" />
	<link rel="stylesheet" type="text/css" 
		href="<?php echo base_url('assets/css/dataTables.bootstrap4.min.css');?>" />
	<link rel="stylesheet" type="text/css" 
		href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css');?>" />
	<link rel="stylesheet" type="text/css" 
		href="<?php echo base_url('assets/css/bootstrap-notifications.min.css');?>" />
	<link rel="stylesheet" type="text/css" 
		href="<?php echo base_url('assets/custom/css/sticky-footer-navbar.css');?>" />
	
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

<div class="container" style="margin-top: 15px;">
	
<div class="row">
	<div class="col">
		<?php echo (isset($alert))? $alert : '' ;?>
	</div>
</div>
<div class="row">
	<div class="col">
		<?php
				if (isset($tools) && is_array($tools) && isset($me) && isset($table_name)) {
					$action_toolbar 	= '';
					$color 		= array('primary','default','info','warning','danger');
					$class_btn 	= '';
					$index		= 0;
					foreach ($tools as $key => $value) {
						$class_btn 	= 'btn btn-'.$color[0];
						if (isset($color[$index])) {
							$class_btn 	= 'btn btn-'.$color[$index];
						}
						if (strpos($value, '/') !== false) {
							$explode 	= explode('/', $value);
							$label 		= str_replace('_', ' ', $explode[1]);
							/*if ($explode[1] !== 'registrasi_user') {
								$label .="&nbsp;".$explode[0];
							}*/

							$action_toolbar .= anchor($value,ucfirst($label),array(
									'class'=>'btn btn-default'
								)
							);
						}else{
							
							$url = $me.'/'.$value;
							if (in_array($value, array('tambah','edit','hapus'))) {
								$url .='/'.$table_name; 
							}
							$label 	= str_replace('_',' ', $value);
							$label 	= ucfirst($label);
							$action_toolbar .= anchor($url,$label,array(
								'class'=>$class_btn
								)
							);
						}

						$index++;
					}
					echo $action_toolbar;
				}
		?>
	</div>
</div>
<div class="row">
	 <div class="col">
	 	<div class="table-responsive">
	 		
	 	
	 	<?php if(isset($sources)) : ?>
<table class="table table-bordered" id="gl-table" >
  	<thead class="thead-inverse">
		<tr>
	  		<?php
	  			if (isset($columns)) {
	  				foreach ($columns as $key => $value) {
	  					if (isset($show) && in_array($value, $show)) {
	  						if (function_exists('set_datatables_column')) {
	  							echo '<th>'.set_datatables_column($value).'</th>';
	  						}else{
	  							echo '<th>'.$value.'</th>';
	  						}
	  					}elseif (!isset($show)) {
	  						if (function_exists('set_datatables_column')) {
	  							echo '<th>'.set_datatables_column($value).'</th>';
	  						}else{
	  							echo '<th>'.$value.'</th>';
	  						}
	  					}
	  				}
	  				echo '<th>'.strtoupper('tindakan').'</th>';
	  			}
	  		?>
		</tr>

	</thead>
	<tbody>
		<?php
			if (isset($columns) && $sources && is_array($sources)) {
				foreach ($sources as $key => $value) {
					echo '<tr>';
		 			foreach ($columns as $k => $field) {
		 				
		 				if (isset($show) && in_array($field, $show)) {
		 					echo '<td>';
		 					
		 					$data = ucwords($value[$field]);
		 					$len  = strlen($data);

		 					if (strpos($field,'harga_') !== false && $len > 0) {
		 						$data = show_currency_format($data);
		 					}
		 					echo (isset($data))? $data : '';
		 					echo  '</td>';
		 				}elseif (!isset($show)) {
		 					echo '<td>';
		 					echo (isset($value[$field]))? ucwords($value[$field]) : '';
		 					echo  '</td>';
		 				}
		 			}
		 			echo '<td>';
		 			$_id = 0;
		 			if (isset($primary_key)) {
		 				if (isset($value[$primary_key])) {
		 					$_id = $value[$primary_key];
		 				}
		 			}
		 			if (function_exists('set_datatables_action') && isset($group_id)) {
		 				if (isset($action[$group_id])) {
		 					set_datatables_action($action[$group_id],$_id,$value);
		 				}
		 			}
		 			echo '</td>';
		 			
		 			echo '</tr>';
				}
				
			} 
		?>	
	</tbody>
</table>

<?php endif; ?>
</div>

	 </div>
</div>

</div>

<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-1.11.3.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.dataTables.min.js');?>">
</script>
<script type="text/javascript" src="<?php echo base_url('assets/js/dataTables.bootstrap4.min.js');?>">
</script>
<script type="text/javascript" href="<?php echo base_url('assets/js/bootstrap.min.js');?>"> </script>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.nicescroll.min.js');?>"> </script>
<script type="text/javascript">
	$(document).ready(function(){
		
		if ($('#gl-table').length == 1) {
        	
			$('#gl-table').DataTable();
		}
		//$('input[type="search"]').css('width','');
	});
</script>
</body>
</html>