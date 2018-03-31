	<div 
		class="c-banner c-banner--<?php echo (isset($status))? $status : '';?> alert-dismissible" role="alert">
		<a href="#" class="c-banner--dimiss">
			<i class="fa fa-remove" style="font-size: 12px;"></i>
		</a>
		<?php echo (isset($alert))? $alert : '';?>
	</div>