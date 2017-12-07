<?php 
	if (isset($action)) {
		echo form_open($action);
	}
?>
	<div class="row">
  		<div class="col">
  			<div class="text-right">
  				<button type="submit" class="btn btn-primary">
  					<i class="fa fa-send"></i>
  					Submit
  				</button>
  			</div>	
  		</div>
  	</div>
	<div class="row">
	<div class="col-lg-8 col-md-offset-2" >
	<?php 

	if(isset($fields)) :
		$max 			= 10;
		$amount_fields 	= count($fields); 

		foreach ($fields as $key => $value) : 
			
			$max            = 7;
        	$amount_fields  = count($value); 
			if (is_array($value)) {

				foreach ($value as $index => $data) {
					
					$input 		=' <div class="form-group">';
					if (function_exists('set_datatables_column')) {
						if (strpos($data,'id_') === false) {
							$input .='<label for="">'.set_datatables_column($data).'</label>';
						}
					}
					$type = get_data_type($key,$data);
					$input .= render_input_html($type,$data);
					$input .='</div>';	

					$grid = '';
            		if ($index == 0) {
                		if ($amount_fields > $max) {
                			$grid .= '<div class="col-xs-12 col-md-6">'.$input;
                		}else{
                			$grid .= '<div class="col-xs-12">'.$input;
                		}
            		}elseif ($index+1 == $max && $amount_fields > $max) {
                		$grid .= $input.'</div><div class="col-xs-12 col-md-6">';
            		}elseif ($index+1 ==  $amount_fields ) {
                		$grid .= $input.'</div>';
            		}else{
                		$grid .= $input;
            		}

					echo $grid;
				}

				
			}
		
		endforeach; 

	endif; ?>
	</div>
</div>

<?php echo form_close();?> 
	
  	
