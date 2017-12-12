<div class="login">
				<?php echo form_open("auth/login");?>
				  <div class="form-group">
					<label><?php echo lang('login_identity_label', 'identity');?></label>
            		<?php echo form_input($identity);?>
				    <small id="emailHelp" class="form-text text-muted">Masukkan alamat email.</small>
				  </div>
				  <div class="form-group">
				    <label><?php echo lang('login_password_label', 'password');?></label>
            <?php echo form_input($password);?>
				  </div>
				  <div class="row">
				  	<div class="col-lg-6">
					  <div class="form-check">
					  	<?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
					  	<label class="form-check-label">
							<?php echo lang('login_remember_label');?>
					    </label>
					  </div>
					  </div>
					  <div class="col-lg-6 text-right">
					  <div class="form-check">
					    <label class="form-check-label">
					      <a href="<?php echo site_url('auth/forgot_password');?>"><?php echo lang('login_forgot_password');?></a>
					    </label>
					  </div>
					</div>
				  </div>
				  <?php echo form_submit('submit', lang('login_submit_btn'),array('class'=>'btn btn-primary'));?>
				<?php echo form_close();?>
			</div> 

<!-- login -->
<div class="login-1 text-center">
	<p>Belum memilih akun ? <?php echo anchor('#',ucwords('register disini'));?></p>
</div>