<?php
	$persentase = 0;
	if (isset($jumlah_finish) && isset($jumlah_semua)) {
		$persentase = ($jumlah_finish / $jumlah_semua) * 100;
	}
?>
<div class="row">
	<div class="col">
		<div class="row">
			<div class="col">
				<h4>Progress Penanganan<br/>
					<small>Persentase pengaduan yang berhasil ditangani</small>
				</h4>
			</div>
		</div>
		<div class="row">
			<div class="col-12 col-md-2">
			<a 	style="margin-bottom: 5px;" href="javascript:history.back(1);" 
				class="btn btn-default"><i class="fa fa-arrow-left"></i>
				&nbsp;Kembali 
			</a>	
			</div>
			<div class="col-12 col-md-10" style="padding-top: 10px;">
				 <div class="progress">
  		<div class="progress-bar" role="progressbar" 
  			style="width: <?php echo $persentase;?>%;" aria-valuenow="<?php echo $persentase;?>" aria-valuemin="0" aria-valuemax="100">
  			<?php echo $persentase;?>%
  		</div>
		</div>
			</div>
		</div>
	</div>
</div>
<h4>Detail Pengaduan<br/>
			<small>informasi pengaduan dari mahasiswa </small>
		</h4>
<div class="row">
	<div class="col-12 col-md-2">
		<div class="form-group">
			<b>Waktu Pengaduan</b><br/>
			<?php echo (isset($info['waktu_pengaduan']))? $info['waktu_pengaduan']: '';?>
		</div>
	</div>
	<div class="col-12 col-md-2">
		<div class="form-group">
			<b>Lampiran Pengaduan</b><br/>
			<a href="#exampleModal" data-toggle="modal" data-target="">
				Pratinjau Lampiran
			</a>
		</div>
	</div>
	<div class="col-12 col-md-8">
		<div class="form-group">
			<b>Pesan Pengaduan</b><br/>
			<?php echo (isset($info['pesan_pengaduan']))? $info['pesan_pengaduan']: '';?>
		</div>
	</div>
		
</div>
<div class="row">
	<div class="col">
		<form 
			action="<?php echo (isset($info))? site_url('staff/submit_lampiran_tanggapan/'.$info['id_pengaduan']): site_url('staff/submit_lampiran_tanggapan/');?>" 
			method="post" enctype="multipart/form-data">
		<input type="hidden" name="id_pengaduan" value="<?php echo $info['id_pengaduan'];?>">
		<h4>Fasilitas yang harus ditangani<br/>
			<small>Daftar fasilitas yang diperlu ditangani</small>
		</h4>
		<?php
		if (isset($details) && $details) {
				foreach ($details as $key => $value) { 

					if (isset($value['lampiran_tanggapan']) && !is_null($value['lampiran_tanggapan'])) { ?>
						<a href="<?php echo base_url('/').$value['lampiran_tanggapan'];?>" target="_blank">
							<?php echo basename($value['lampiran_tanggapan']);?>
						</a><br/>
						
					<?php 	}else{ ?>

					<input type="hidden" name="id_detail[]" value="<?php echo $value['id_detail'];?>">
					<div class="form-group">
					<b>Unggah hasil penanganan <?php 
						echo anchor(
							'staff/detail_sarana/'.$value['sarana_terkait'],
							strtoupper(get_nama_sarana($value['sarana_terkait']))
						);
						?>
					</b>
					<br/>
				</div>
				<input type="file" name="lampiran_tanggapan[]" />
					<?php 	} 

				}
			}
		?>
		<hr/>
			<button type="submit" class="btn btn-primary btn-sm"> 
				<i class="fa fa-refresh"></i>
				Update Progress
			</button>
			
			
		</form>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Lampiran Pengaduan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<?php  if (isset($info['lampiran_pengaduan'])) { ?>
      			<img src="<?php echo base_url('/').$info['lampiran_pengaduan'];?>" class="col-12" />
      	<?php } ?>
        
      </div>
    </div>
  </div>
</div>