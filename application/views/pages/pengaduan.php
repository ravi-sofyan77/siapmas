<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<body>

<!-- ini navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<div class="container">
	<a class="navbar-brand" href="index.html">IT Telkom</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
	</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ml-auto">
				  <li class="nav-item active">
				    <a class="nav-link" href="#">Notif[5]</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" href="#">Mahasiswa</a>
				  </li>
				</ul>
		</div>
	</div>
</nav>
<!-- navbar -->

<div class="container" style="margin-top: 25px;">
<!-- mahasiswa 1 -->
<div class="mahasiswa">
	<div class="row" style="border-bottom: 1px solid #D0CAC9;">
		<div class="col-lg-6 text-left">
			<p>Pilih Jenis Pengajuan</p>
		</div>
		<div class="col-lg-6 text-right">
			<p>Senin, 17 Agustus 2018</p>
			<p>00:00:00 PM</p>
		</div>
	</div>
	<h5 style="margin-top:25px;">Pilih Permasalahan</h5>
	<div class="row"  style="margin-top:15px;">
		<div class="col-lg-6">
		  <div class="form-group">
		    <label for="exampleInputEmail1">Pilih Sarana</label>
		    <select class="form-control" id="exampleFormControlSelect1">
		      <option>1</option>
		      <option>2</option>
		      <option>3</option>
		      <option>4</option>
		      <option>5</option>
		    </select>
		  </div>	
		  <div class="form-group">
		    <label for="exampleInputEmail1">Pilih Pra Sarana</label>
		    <select class="form-control" id="exampleFormControlSelect1">
		      <option>1</option>
		      <option>2</option>
		      <option>3</option>
		      <option>4</option>
		      <option>5</option>
		    </select>
		  </div>
		  <div class="form-group">
		    <label for="exampleInputEmail1">Pilih Ruangan</label>
		    <select class="form-control" id="exampleFormControlSelect1">
		      <option>1</option>
		      <option>2</option>
		      <option>3</option>
		      <option>4</option>
		      <option>5</option>
		    </select>
		  </div>		
		</div>
		<div class="col-lg-6">
			<div class="form-group">
			    <label for="exampleFormControlFile1">Upload Gambar</label>
			    <input type="file" class="form-control-file" id="exampleFormControlFile1">
			  </div>
		</div>
		<div class="col-lg-12">
			<div class="form-group">
			    <label for="exampleFormControlInput1">Subjek Pengaduan</label>
			    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
			  </div>
			<div class="form-group">
			    <label for="exampleFormControlInput1">Kirim Pesan</label>
			    <textarea class="form-control">text area</textarea>
			  </div>
			  <div class="text-right">
			  <a class="btn btn-primary" href="inbox.html">Kirim</a>
			</div>
		</div>
	</div>
</div>
<!-- mahasiswa 1 -->
</div>

	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>

</body>

</html>