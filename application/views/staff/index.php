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