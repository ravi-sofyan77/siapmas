
<!-- login -->
<?php echo form_open("auth/login");?>
	<strong>Ayo ! Mulai login disini</strong>
	<label class="c-label">
		<?php echo lang('login_identity_label', 'identity');?>
		<?php
			$identity['pattern'] ="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"; 
			echo form_input($identity);
		?>
	</label>
	<div class="u-mar-bottom-m">
		<label>
			<label><?php echo lang('login_password_label', 'password');?></label>
			<?php echo form_input($password);?>
		</label>
	</div>
<div class="clearfix">
		
		<a href="<?php echo site_url('auth/forgot_password');?>" class="u-l-fl">
			<?php echo lang('login_forgot_password');?></a>
		<button class="u-l-fr c-btn c-btn--primary" type="submit">
		Login
		</button>
</div>				
<?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
	<label class="form-check-label">
	<?php echo lang('login_remember_label');?>
</label>
<p>Belum memiliki akun? </p>
<button
	type="button" 
	class="c-btn c-btn--secondary c-btn--full" 
	onclick="location.href='<?php echo site_url('auth/register');?>'">
	Daftar disini
</button>
<?php echo form_close();?>