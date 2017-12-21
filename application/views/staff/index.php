<div class="row">
	<div class="col-12 col-md-8">
		<h4>
			Papan Penganduan<br/>
			<small>Informasi progress penanganan pengaduan yang telah masuk</small>
		</h4>	
	</div>
	<div class="col-12 col-md-4">
		
	</div>
</div>
<div class="row">
	<div class="col-12 col-md-4">
		<h3>Pending</h3>
		<?php
			if (isset($pending)) {
				if ($pending) {
					foreach ($pending as $key => $value) { ?>
		
		<div class="card" style="margin-bottom: 10px;">
			<?php if(isset($value['lampiran_pengaduan']) && !empty($value['lampiran_pengaduan'])) : ?>
    			<img class="card-img-top" src="<?php echo base_url().$value['lampiran_pengaduan'];?>" alt="Card image cap">
    		<?php endif; ?>
    			<div class="card-body">
      			<h4 class="card-title">Card title</h4>
      			<p class="card-text">
      				<?php
      					echo $value['pesan_pengaduan'];
      				?>
      			</p>
    		</div>
    		<div class="card-footer">
      			<small class="text-muted">
      				<?php echo $value['waktu_pengaduan'];?>
      			</small>
      			<a href="<?php echo site_url('staff/tanggapi_pengaduan/'.$value['id_pengaduan']);?>" class="btn btn-primary">Tanggapi</a>
    		</div>
		</div>

		<?php		}
				}
			}
		?>
  
	</div>
	<div class="col-12 col-md-4">
		<h3>Proses</h3>
		<?php
			if (isset($proses)) {
				if ($proses) {
					foreach ($proses as $key => $value) { ?>
		
		<div class="card" style="margin-bottom: 10px;">
			<?php if(isset($value['lampiran_pengaduan']) && !empty($value['lampiran_pengaduan'])) : ?>
    			<img class="card-img-top" src="<?php echo base_url().$value['lampiran_pengaduan'];?>" alt="Card image cap">
    		<?php endif; ?>
    			<div class="card-body">
      			<h4 class="card-title">Card title</h4>
      			<p class="card-text">
      				<?php
      					echo $value['pesan_pengaduan'];
      				?>
      			</p>
    		</div>
    		<div class="card-footer">
      			<small class="text-muted">
      				<?php echo $value['waktu_pengaduan'];?>
      			</small>
      			<a href="<?php echo site_url('staff/tanggapi_pengaduan/'.$value['id_pengaduan']);?>" class="btn btn-primary">Tanggapi</a>
    		</div>
		</div>

		<?php		}
				}
			}
		?>
	</div>
	<div class="col-12 col-md-4">
		<h3>Selesai</h3>
		<?php
			if (isset($selesai)) {
				if ($selesai) {
					foreach ($selesai as $key => $value) { ?>
		
		<div class="card" style="margin-bottom: 10px;">
			<?php if(isset($value['lampiran_pengaduan']) && !empty($value['lampiran_pengaduan'])) : ?>
    			<img class="card-img-top" src="<?php echo base_url().$value['lampiran_pengaduan'];?>" alt="Card image cap">
    		<?php endif; ?>
    			<div class="card-body">
      			<h4 class="card-title">Card title</h4>
      			<p class="card-text">
      				<?php
      					echo $value['pesan_pengaduan'];
      				?>
      			</p>
    		</div>
    		<div class="card-footer">
      			<small class="text-muted">
      				<?php echo $value['waktu_pengaduan'];?>
      			</small>
      			<a href="<?php echo site_url('staff/tanggapi_pengaduan/'.$value['id_pengaduan']);?>" class="btn btn-primary">Lihat Details</a>
    		</div>
		</div>

		<?php		}
				}
			}
		?>
	</div>
</div>
