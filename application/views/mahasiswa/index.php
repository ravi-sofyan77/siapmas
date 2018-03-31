<div class="background-admin">
<div class="row">
	<?php
		if (isset($bidang_pengaduan)) {
			
			foreach ($bidang_pengaduan as $key => $value) { ?>
	
	<div class="col-xs-12 col-md-3 c-launcher">
		<?php
			if (isset($me)) { ?>
			<a href="<?php echo site_url($me.'/daftar_pengaduan/'.$value['id']);?>">
		<?php }else{ ?>
			<a href="<?php echo site_url('mahasiswa/daftar_pengaduan/'.$value['id']);?>">
		<?php } ?>
		
		<h3 class="u-font-center">
			<i class="<?php echo (isset($value['icon']))? 'fa '.$value['icon'] : '';?>"></i><br/>
			<?php echo (isset($value['name']))? $value['name'] : '';?>
		</h3>
		</a>
	</div>

	<?php	}
		}
	?>
	
	</div>
</div>