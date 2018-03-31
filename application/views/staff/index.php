<div class="staff">
<?php
	//var_dump($pending);
?>
<div class="row">
	<div class="col-xs-12 col-md-4">
		<h3 class="f3">Pending</h3>
		<?php

		if (isset($pending)) {
			if ($pending) {
				foreach ($pending as $key => $value) { ?>
				<div class="c-card c-card--arrow c-card--arrow-nw">
					<h3>
						<small>
							<?php
								if (function_exists('get_username')) {
									//echo 'pengaduan dari : <strong>';
									echo get_username($value['pengaduan_dari']);
									//echo '<br/>mengadu prasarana ';
								}
							?>
						</small><br/>
						<?php
							if (function_exists('get_nama_sarana')) {
								if ($value['id_sarana'] > 0) {

									echo get_nama_sarana($value['id_sarana']);
								}
								
							}
							if (function_exists('get_nama_prasarana')) {
								if ($value['id_prasarana'] > 0) {
									echo '<small>';
									echo "<br/> dari prasarana :";
									echo get_nama_prasarana($value['id_prasarana']);
									echo '</small>';
								}
							}
						?>
						
						
					</h3>
					<p class="u-mar-bottom-s">

						<?php
							
							echo substr($value['pesan_pengaduan'], 0,255);
						?>
					</p><br/>

					<?php
						echo anchor('staff/daftar_tanggapan/edit/'.$value['id_pengaduan'],'tanggapi',array(
							'class'=>"c-btn c-btn--primary"));
						echo anchor(base_url('uploads/'.$value['lampiran_pengaduan']),'lihat lampiran',array(
							'class'=>"c-btn c-btn--default"));
					?>
				</div>
				<?php		}
			}
		}
		?>
		
	</div>
	<div class="col-xs-12 col-md-4">
		<h3 class="f3">Proses</h3>
		<?php

		if (isset($proses)) {
			if ($proses) {
				foreach ($proses as $key => $value) { ?>
				<div class="c-card c-card--arrow c-card--arrow-nw">
					<p class="u-mar-bottom-s">
						<?php
							echo substr($value['pesan_pengaduan'], 0,255);
						?>
					</p><br/>

					<?php
						echo anchor('staff/daftar_tanggapan/'.$value['id_pengaduan'],'tanggapi',array(
							'class'=>"c-btn c-btn--primary"));
						echo anchor(base_url('uploads/'.$value['lampiran_pengaduan']),'lihat lampiran',array(
							'class'=>"c-btn c-btn--default"));
					?>
				</div>
				<?php		}
			}
		}
		?>
		
	</div>
	<div class="col-xs-12 col-md-4">
		<h3 class="f3">Selesai</h3>
		
		<?php

		if (isset($selesai)) {
			if ($selesai) {
				foreach ($selesai as $key => $value) { ?>
				<div class="c-card c-card--arrow c-card--arrow-nw">
					<p class="u-mar-bottom-s">
						<?php
							echo substr($value['pesan_pengaduan'], 0,255);
						?>
					</p><br/>

					<?php
						echo anchor('staff/daftar_tanggapan/'.$value['id_pengaduan'],'tanggapi',array(
							'class'=>"c-btn c-btn--primary"));
						echo anchor(base_url('uploads/'.$value['lampiran_pengaduan']),'lihat lampiran',array(
							'class'=>"c-btn c-btn--default"));
					?>
				</div>
				<?php		}
			}
		}
		?>
	</div>
</div>
</div>