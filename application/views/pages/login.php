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
	<a class="navbar-brand" href="#">Navbar</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
	<ul class="navbar-nav mr-auto">
	  <li class="nav-item active">
	    <a class="nav-link" href="#">Home</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" href="#">About</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" href="#">Pricing</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" href="#">Blog</a>
	  </li>
	</ul>
	  <a class="btn btn-outline-success my-2 my-sm-0" href="login.html">Login</a>
	</div>
</nav>
<!-- navbar -->
<div class="container">
	<!-- login -->
	<div class="row">
		<div class="col-lg-12">
			<div class="login">
				<form>
				  <div class="form-group">
				    <label for="exampleInputEmail1">Email address</label>
				    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
				    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
				  </div>
				  <div class="form-group">
				    <label for="exampleInputPassword1">Password</label>
				    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
				  </div>
				  <div class="row">
				  	<div class="col-lg-6">
					  <div class="form-check">
					    <label class="form-check-label">
					      <input type="checkbox" class="form-check-input">
					      Remember me
					    </label>
					  </div>
					  </div>
					  <div class="col-lg-6 text-right">
					  <div class="form-check">
					    <label class="form-check-label">
					      <a href="">Lupa Password</a>
					    </label>
					  </div>
					</div>
				  </div>
				  <a class="btn btn-primary" href="mahasiswa.html">Sign in</a>
				</form>
			</div>
		</div>
	</div>
	<!-- login -->
	<div class="login-1 text-center">
	<p>Belum memilih akun ? klik tombol Register disamping <a href="register.html" class="btn btn-primary">Register</a></p>
	</div>
</div>
</body>
</html>