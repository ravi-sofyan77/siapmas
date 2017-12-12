<?php echo form_open("");?>

<label>id saran</label><br/>
<input type="text" name="id_saran" /><br/>

<label>id fasilitas</label><br/>
<input type="text" name="id_fasilitas" /><br/>

<label>kondisi fasilitas</label><br/>
<input type="text" name="kondisi_fasilitas" /><br/>

<label>kondisi jml</label><br/>
<input type="text" name="kondisi_jml" /><br/>

<label>tanggapan  dengan</label><br/>
<input type="text" name="tanggapan_dengan" /><br/>

<label>tanggapan valid</label><br/>
<input type="text" name="tanggapan_valid" /><br/>

<label>tanggapan bukti</label><br/>
<input type="text" name="tanggapan_bukti" /><br/>

//copy sampe kolom terakhir kecuali id / primary key

<button type="submit">simpan</button>

<?php echo form_close("");?>