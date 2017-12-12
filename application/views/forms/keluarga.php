<style type="text/css">
.btn.btn-primary{width: 100%;}
.nav-link.active{background-color: #E7E7E7;}
</style>
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
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
		<form id="keluarga" method="post">
			<div class="tab-content">
			
			  	<div role="tabpanel" class="tab-pane fade in active" id="data1">

					  <div class="form-group">
					    <label for="exampleInputEmail1">Nomor KK</label>
					    <input type="text" name="no_kk" class="form-control">
					  </div>

					  <div class="form-group">
					    <label for="exampleInputEmail1">Alamat</label>
					    <textarea name="alamat" class="form-control"></textarea>
					  </div>

					  <div class="col-md-6">
					  	  <div class="form-group">
						    <label for="exampleInputEmail1">RT</label>
						    <input type="text" name="rt" class="form-control">
						  </div>
					  </div>
					  <div class="col-md-6">
					  	  <div class="form-group">
						    <label for="exampleInputEmail1">RW</label>
						    <input type="text" name="rw" class="form-control">
						  </div>
					  </div>

					  <div class="form-group">
					    <label for="exampleInputEmail1">Desa</label>
					    <input type="text" name="desa" class="form-control">
					  </div>

					  <div class="form-group">
					    <label for="exampleInputEmail1">Kelurahan</label>
					    <input type="text" name="kelurahan" class="form-control">
					  </div>

					  	<div class="text-right">
					  		<a class="btn btn-primary next1" href="#data2" role="tab" data-toggle="tab">Next</a>
						</div>
				</div>
			  	<div role="tabpanel" class="tab-pane fade" id="data2">

				  <div class="form-group">
				    <label for="exampleInputEmail1">Kecamatan</label>
				    <input type="text" name="kecamatan" class="form-control">
				  </div>

				  <div class="form-group">
				    <label for="exampleInputEmail1">Kabupaten</label>
				    <input type="text" name="kabupaten" class="form-control">
				  </div>

				  <div class="form-group">
				    <label for="exampleInputEmail1">Kota</label>
				    <input type="text" name="kota" class="form-control">
				  </div>

				  <div class="form-group">
				    <label for="exampleInputEmail1">Kode Pos</label>
				    <input type="text" name="kode_pos" class="form-control">
				  </div>

				  <div class="form-group">
				    <label for="exampleInputEmail1">Provinsi</label>
				    <input type="text" name="provinsi" class="form-control">
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

				<div role="tabpanel" class="tab-pane fade" id="data3" style="border: 1px;">
					<h4>List Anggota Keluarga</h4>

					<div class="list_angkel"></div>

					<hr/>

					<h4>Tambah Anggota Keluarga</h4>
		      		<div class="col-md-6">
			      		<div class="form-group">
						    <label for="exampleInputEmail1">Anggota Keluarga</label>
						    <input type="text" name="angkel" class="form-control">
						    <input type="hidden" name="id_person">
						</div>
						<div class="form-group">
						    <label for="exampleInputEmail1">Pendidikan Terakhir</label>
						    <input type="text" name="pendidikan_terakhir" class="form-control">
						</div>
						<div class="form-group">
						    <label for="exampleInputEmail1">Pekerjaan</label>
						    <input type="text" name="pekerjaan" class="form-control">
						</div>
						<div class="form-group">
						    <label for="exampleInputEmail1">Status Pernikahan</label>
						    <input type="text" name="status_pernikahan" class="form-control">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
						    <label for="exampleInputEmail1">Hubungan dalam Keluarga</label>
						    <input type="text" name="hub_keluarga" class="form-control">
						</div>
						<div class="form-group">
						    <label for="exampleInputEmail1">Kewarganegaraan</label>
						    <input type="text" name="kewarganegaraan" class="form-control">
						</div>
						<div class="form-group">
						    <label for="exampleInputEmail1">Nomor Passport</label>
						    <input type="text" name="passport_nomor" class="form-control">
						</div>
						<div class="form-group">
						    <label for="exampleInputEmail1">Tanggal Terakhir Passport</label>
						    <input type="date" name="passport_tgl_terakhir" class="form-control">
						</div>
					</div>
					<button type="button" class="btn btn-default" id="submitAngkel">Submit</button>

					<div class="row">
				  		<div class="col-md-6">
				  			<div class="text-left">
						  		<a class="btn btn-primary back2" href="#data2" role="tab" data-toggle="tab">Back</a>
							</div>
				  		</div>
				  		
				  		<div class="col-md-6">
							<div class="text-right">
						  		<button id="submitKeluarga" type="submit" class="btn btn-primary">Submit</button>
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



<script type="text/javascript">
  $(document).ready(function(){
    $(".next1").click(function(){
      $(".data1").removeClass("active");
      $(".data2").addClass("active");
      $(".data3").removeClass("active");

      $(".next1").removeClass("active");
    });
    $(".next2").click(function(){
      $(".data1").removeClass("active");
      $(".data2").removeClass("active");
      $(".data3").addClass("active");

      $(".next2").removeClass("active");
    });
    $(".back1").click(function(){
      $(".data1").addClass("active");
      $(".data2").removeClass("active");
      $(".data3").removeClass("active");

      $(".back1").removeClass("active");
    });
  });
</script>

