<a href="#" style="margin-bottom: 10px;" class="c-btn">
	Tambah pengaduan
</a>
<table class="c-table ">
	<thead>
		<tr>
			<?php
				
				if (isset($thead) && isset($column_exclude)) {
					foreach ($thead as $key => $value) {
						
						if (!in_array($value, $column_exclude)) {
							$value = str_replace('_',' ', $value);
							echo '<th>'.strtoupper($value).'</th>';
						}
					}
				}
			?>
		</tr>
	</thead>
	<tbody>
		<?php 

			if (isset($source) && isset($column_exclude)) {
				
				foreach ($source as $key => $value) { ?>
					<tr>
						<?php
							foreach ($value as $field => $data) {

								if (!in_array($field, $column_exclude)) {
									echo '<td>'.ucwords($data).'</td>';
								}
							}
						?>
					</tr>
			<?php	}
			}
		?>
	</tbody>
</table>