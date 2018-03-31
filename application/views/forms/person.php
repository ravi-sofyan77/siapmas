<style type="text/css">
.btn.btn-primary{width: 100%;}
.nav-link.active{background-color: #E7E7E7;}
</style>

<div class="row">
	<div class="col-md-12">
		<div style="width: 35%; margin:auto;">

<ul class="nav nav-pills nav-fill" role="tablist" style="margin-bottom: 50px;">
  <li class="nav-item">
    <a class="nav-link active data1" href="#data1" role="tab" data-toggle="tab">Biodata 1</a>
  </li>
  <li class="nav-item">
    <a class="nav-link data2" href="#data2" role="tab" data-toggle="tab">Biodata 2</a>
  </li>
  <li class="nav-item">
    <a class="nav-link data3" href="#data3" role="tab" data-toggle="tab">Biodata 3</a>
  </li>
</ul>

		<!-- tabs -->
		<form action="<?php echo site_url('welcome/simpan_person'); ?>" method="post">
			<div class="tab-content">
			
			  	<div role="tabpanel" class="tab-pane fade in active" id="data1">
					  <div class="form-group">
					    <label for="exampleInputEmail1">NIK</label>
					    <input type="number" name="nik" class="form-control" placeholder="NIK">
					  </div>

					  <div class="form-group">
					    <label for="exampleInputEmail1">Nama Lengkap</label>
					    <input type="text" name="namalengkap" class="form-control" placeholder="Nama Lengkap">
					  </div>

					  <div class="form-group">
					    <label for="exampleInputEmail1">Jenis Kelamin</label>
					    <select name="jeniskelamin" class="form-control" id="exampleFormControlSelect1">
					      <option value="L">Laki-Laki</option>
					      <option value="P">Perempuan</option>
					    </select>
					  </div>

					  <div class="form-group">
					    <label for="exampleInputEmail1">Tempat Lahir</label>
					    <input type="text" name="tempatlahir" class="form-control" placeholder="Tempat Lahir">
					  </div>

					  <div class="form-group">
					    <label for="exampleInputEmail1">Tanggal Lahir</label>
					    <input type="date" name="tanggallahir" class="form-control" value="2000-01-01">
					  </div>

				  	<div class="text-right">
				  		<a class="btn btn-primary next1" href="#data2" role="tab" data-toggle="tab">Next</a>
					</div>
				</div>

			  	<div role="tabpanel" class="tab-pane fade" id="data2">
					<div class="form-group">
					    <label for="exampleInputEmail1">Agama</label>
					    <input type="text" name="agama" class="form-control">
					</div>
					<div class="form-group">
					    <label for="exampleInputEmail1">Golongan Darah</label>
					    <select class="form-control" name="golongandarah" id="exampleFormControlSelect1">
					      <option value="A">A</option>
					      <option value="B">B</option>
					      <option value="AB">AB</option>
					      <option name="O">O</option>
					    </select>
					</div>
					<div class="form-group">
					    <label for="exampleInputEmail1">Alamat</label>
					    <textarea name="alamat" class="form-control"></textarea>
					</div>
					<div class="form-group">
					    <label for="exampleInputEmail1">Kewarganegaraan</label>
					    <input type="text" name="kewarganegaraan" class="form-control">
					</div>
				  	
				  	<div class="row">
				  		<div class="col-md-6">
				  			<div class="text-left">
						  		<a class="btn btn-primary back1" href="#data1" role="tab" data-toggle="tab">Back</a>
							</div>
				  		</div>
				  		<div class="col-md-6">
							<div class="text-right">
						  		<a class="btn btn-primary next2"  href="#data3" role="tab" data-toggle="tab">Next</a>
							</div>
				  		</div>
			  		</div>
				</div>

			  	<div role="tabpanel" class="tab-pane fade" id="data3">
					
					<div class="form-group">
					    <label for="exampleInputEmail1">Nama Ayah</label>
					    <input type="text" name="ayah" class="form-control">
					</div>
					<div class="form-group">
					    <label for="exampleInputEmail1">Nama Ibu</label>
					    <input type="text" name="ibu" class="form-control">
					</div>
					<div class="form-group">
					    <label for="exampleInputEmail1">No. Akte Lahir</label>
					    <input type="number" name="noaktelahir" class="form-control">
					</div>
				  
					<div class="row">
						<div class="col-md-6">
				  			<div class="text-left">
						  		<a class="btn btn-primary back2" href="#data2" role="tab" data-toggle="tab">Back</a>
							</div>
				  		</div>
				  		<div class="col-md-6">
							<div class="text-right">
						  		<button type="submit" class="btn btn-primary">Submit</button>
							</div>
				  		</div>
				  	</div>
				</div>

			</div>
		</form>
		<!-- tabs -->
		</div>
	</div>
</div>



