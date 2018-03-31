<div class="card">
	<div class="card-body">
		<form action="<?php echo site_url($controller.'/update_profile');?>" method="post">

			<h3>Informasi Account</h3>
			<div class="row">
				<div class="col">
					<label>Username</label>
					<input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $profile['username'];?>">
				</div>
				<div class="col">
					<label>Email</label>
					<input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $profile['email'];?>">
				</div>
			</div>
			<h3>Informasi Pribadi</h3>
			<div class="row">
				<div class="col">
					<label>Nama Awal</label>
					<input type="text" name="first_name" class="form-control" placeholder="First name" value="<?php echo $profile['first_name'];?>">
				</div>
				<div class="col">
					<label>Nama Akhir</label>
					<input type="text" name="last_name" class="form-control" placeholder="Last name" value="<?php echo $profile['last_name'];?>">
				</div>
			</div>
			<h3>Ganti Password</h3>
			<div class="row">
				<div class="col">
					<label>Password Baru</label>
					<input type="password" name="password" class="form-control" placeholder="New Password">
				</div>
				<div class="col">
					<label>Konfirmasi Password</label>
					<input type="password" name="c_password" class="form-control" placeholder="Confirm New Password">
				</div>
			</div>
			<div class="row">
				<div class="col" style="margin-top: 10px;">
					<div class="text-right">
						<button type="submit" class="btn btn-primary">
							<i class="fa fa-save"></i>
							Simpan
						</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>