<div style="clear: both;"> </div>
	<?php echo form_open("auth/login");?>

          <div class="form-group">
            <label><?php echo lang('login_identity_label', 'identity');?></label>
            <?php echo form_input($identity);?>
          </div>

          <div class="form-group">
            <label><?php echo lang('login_password_label', 'password');?></label>
            <?php echo form_input($password);?>
          </div>

<?php echo form_submit('submit', lang('login_submit_btn'),array('class'=>'btn btn-login col-md-12'));?>

	<div class="bot-form">
		<div class="pull-right">
		<p>
			<?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
			<?php echo lang('login_remember_label');?>
		</p>
	</div>
	<div class="pull-left">
		<p><a href="<?php echo site_url('auth/forgot_password');?>"><?php echo lang('login_forgot_password');?></a></p>
	</div>
	</div>
<?php echo form_close();?> 