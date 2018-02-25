<?php 
	if (isset($pengaduan['id_pengaduan'])) {
		echo form_open('mahasiswa/submit_review_pengaduan/'.$pengaduan['id_pengaduan']);
	}
?>
	<div class="row">
		<div class="col-xs-12 col-md-6">
			

			<label class="c-label">
				Waktu ditanggapi
				<h3>
					<?php
					if (isset($pengaduan['waktu_ditanggapi'])) {
						if (function_exists('show_date_human_format')) {
							echo show_date_human_format($pengaduan['waktu_ditanggapi'],true);
						}else{
							echo $pengaduan['waktu_ditanggapi'];
						}
					}
					?>
				</h3>
			</label>
			<label class="c-label">
				Ditanggapi oleh <br/>
				<?php
				if (isset($pengaduan['ditanggapi_oleh'])) {
					if (function_exists('get_username')) {
						echo get_username($pengaduan['ditanggapi_oleh']);
					}

				}

				?>
			</label>
			<label class="c-label">
				Lampiran tanggapan <br/>
				<?php
				if (isset($pengaduan['lampiran_tanggapan'])) {
					echo anchor(base_url('uploads/'.$pengaduan['lampiran_tanggapan']),'Pratinjau lampiran',array('target'=>'blank'));
				}	
				?>
			</label>
			<label class="c-label">
				Pesan tanggapan<br/>
				<p>
					<?php
					if (isset($pengaduan['pesan_tanggapan'])) {
						echo $pengaduan['pesan_tanggapan'];
					}
					?>
				</p>
			</label>

		</div>
		<div class="col-xs-12 col-md-6">
			<label class="c-label">
				Nilai Tanggapan <i class="u-font-error">(*wajib dipilih)</i><br/>
				<strong>Sangkat Buruk</strong>
				<input type="radio" name="nilai_tanggapan" value="1">1
				<input type="radio" name="nilai_tanggapan" value="2">2
				<input type="radio" name="nilai_tanggapan" value="3">3
				<input type="radio" name="nilai_tanggapan" value="4">4
				<input type="radio" name="nilai_tanggapan" value="5">5
				<strong>Sangat Baik</strong>
			</label>
			<label class="c-label">
				Tanggapan Diterima? <i class="u-font-error">(*wajib dipilih)</i> <br/>
				<input type="radio" name="tanggapan_diterima" value="tidak">Tidak&nbsp;
				<input type="radio" name="tanggapan_diterima" value="ya">Ya&nbsp;
			</label>
			<div class="clearfix">
				<div class="u-l-fl">
					<?php echo anchor('mahasiswa/index','kembali');?>
				</div>
				<div class="u-l-fr">
					<button class="c-btn c-btn--primary" type="submit">
						<i class="fa fa-send"></i>&nbsp;
						Kirim
					</button>
				</div>
			</div>
		</div>
	</div>

	
</form>