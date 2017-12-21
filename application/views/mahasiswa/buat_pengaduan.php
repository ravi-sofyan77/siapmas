<form action="<?php echo site_url('mahasiswa/simpan_pengaduan/');?>" 
	method="post" enctype="multipart/form-data">
<div class="row">
	<div class="col">
		<div class="text-center">
			<h2><?php echo ucwords('form pengaduan');?></h2>
		</div>
		<hr/>
	</div>
</div>
<div class="row">
	<div class="col">
		<div class="form-group">
			<label>Pilih Bidang</label>
			<?php
			if (isset($groups)) {
				
				$list ='<ul class="nav nav-pills">';
				foreach ($groups as $key => $value) {
					$status ='';
					if (isset($id_group) && $id_group == $value['id']) {
						$status ='active';
						echo '<input type="hidden" name="pengaduan_kepada" value="'.$id_group.'"/>';
					}
					$list .='<li class="nav-item">'.anchor(
								'mahasiswa/buat_pengaduan/'.$value['id'].'/',
								$value['name'],
								array('class'=>'nav-link '.$status)
							).'</li>';
				}
				$list .='</ul>';
				echo $list;
			}  ?>
		</div>
		<div class="form-group">
			<label>Pilih Fasilitas</label>
			<?php if (isset($prasarana)) {
					if (!$prasarana) { ?>
						<i class="text-lowercase"><?php echo ucwords('bidang yang dipilih belum memiliki fasilitas');?></i>
					<?php	} ?>
				<ul class="nav nav-pills">
				<?php foreach ($prasarana as $key => $value) {
					$status ='';
					if (isset($id_prasarana) && $id_prasarana == $value['id_prasarana']) {
						$status ='active';
					} ?>.
					<li class="nav-item">
						<a href="<?php echo $value['id_prasarana'];?>" class="nav-link <?php  echo $status;?>">
							<?php echo ucwords($value['nama_prasarana']);?>
						</a>
					</li>
				<?php } ?>
				</ul>
		<?php }else{ ?>
		<i class="text-lowercase"><?php echo ucwords('Fasilitas akan tampil setelah memilih bidang');?></i>
		<?php } ?>
		</div>	
		<div class="form-group">
			<label>Pilih sarana</label><br/>
		<?php if(isset($sarana)): ?>
			<?php if (!$sarana) { ?>
						<i class="text-lowercase"><?php echo ucwords('fasilitas yang dipilih belum memiliki sarana');?></i>
					<?php	} ?>
			<?php  foreach ($sarana as $key => $value) : ?>
				<input type="checkbox" name="sarana_terkait[]" value="<?php echo $value['id_sarana'];?>">
				&nbsp;
				<?php echo ucwords($value['nama_sarana']);?>
			<?php	endforeach; ?>
		<?php else: ?>
			<i class="text-lowercase"><?php echo ucwords('sarana akan tampil setelah memilih prasarana');?></i>
			
		<?php endif; ?>

		</div>
		<div class="form-group">
			<label>Pesan Pengaduan</label>
			<textarea name="pesan_pengaduan" class="form-control"></textarea>
		</div>
	</div>
</div>
<div class="row">
	<div class="col">
		<label>Lampirkan berkas sebagai bukti</label>
		<input type="file" name="lampiran_pengaduan" value="" />
	</div>
	<div class="col">
		<div class="text-right">
			<button class="btn btn-primary">
				<i class="fa fa-send"></i>&nbsp;
				<?php echo ucwords('kirim');?>
			</button>
		</div>
	</div>
</div>

<?php echo form_close(); ?>