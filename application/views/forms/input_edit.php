<form action="<?php echo (isset($table_name) && isset($me))? site_url($me.'/simpan/'.$table_name) : '#';?>" method="post" enctype="multipart/form-data">
	<div class="row">
  		<div class="col">
  			<div class="text-right">
  				
  				<button type="submit" class="btn btn-primary">
  					<i class="fa fa-send"></i>
  					Simpan
  				</button>
  			</div>	
  		</div>
  	</div>
	<div class="row">
	<?php 

	if(isset($fields)) :
		$input_key 		='';
		$max 			= 6;
		$amount_fields 	= count($fields); 

		if ($amount_fields <= $max) {
			$max 		= 3;
		}

		if (isset($detail) && is_object($detail)) {
			if (isset($primary_key) && !is_null($detail->$primary_key)) {
				$input_key ="<input type='hidden' name='$primary_key' value='$detail->$primary_key' />";
			}
		}elseif (isset($detail) && is_array($detail)) {
			if (isset($primary_key) && isset($detail[$primary_key])) {
				$input_key ="<input type='hidden' name='$primary_key' value='$detail[$primary_key]' />";
			}
		}

		echo $input_key;
		

		foreach ($fields as $index => $field) : 
			$value 		= '';
			if (isset($detail) && is_object($detail)) {
				$value 	= (!is_null($detail->$field))? $detail->$field : '';

			}elseif (isset($detail) && is_array($detail)) {
				$value 	= (isset($detail[$field]))? $detail[$field] : '';
				
			}

			$input ='<div class="form-group">';
			
			if (function_exists('set_datatables_column')) {
				$input .='<label for="">'.set_datatables_column($field).'</label>';
			}

			if (isset($table_name)) {
				if (function_exists('get_data_type') && function_exists('render_input_html')) {
					$type = get_data_type($table_name,$field);
					$input .= render_input_html($type,$field,$value);
				}
			}

	//$input .='<input type="text" class="form-control" name="'.$field.'" value="'.$value.'">';

			$input .='</div>';

			$grid = '';
			if ($index == 0) {
				$grid .= '<div class="col">'.$input;
			}elseif ($index+1 == $max ) {
				$grid .= $input.'</div><div class="col">';
			}elseif ($index+1 ==  $amount_fields ) {
				$grid .= $input.'</div>';
			}else{
				$grid .= $input;
			}

			echo $grid;


		
		endforeach; 

	endif; ?>
	</div>
	
  	
</form>