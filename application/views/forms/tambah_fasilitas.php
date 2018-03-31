<?php echo form_open("");?>

<label>id staff</label><br/>
<input type="text" name="id_staff" /><br/>

<label>id prasarana</label><br/>
<input type="text" name="id_prasarana" /><br/>

<label>nama fasilitas</label><br/>
<input type="text" name="nama_fasilitas" /><br/>

<label>jml fasilitas</label><br/>
<input type="text" name="jml_fasilitas" /><br/>

<label>kondisi fasilitas</label><br/>
<input type="text" name="kondisi_fasilitas" /><br/>

//copy sampe kolom terakhir kecuali id / primary key

<button type="submit">simpan</button>

<?php echo form_close("");?>