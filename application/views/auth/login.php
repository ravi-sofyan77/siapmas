<h1 style="font-weight: 700; font-size: 3em;">Login</h1>
<p style="font-size: 1.4em;"><?php echo lang('login_subheading');?></p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/login");?>
<div class="row">
  <div class="col-md-12">
  <label><?php echo lang('login_identity_label', 'identity');?></label>
    <?php echo form_input($identity);?>
  
</div>
<div class="col-md-12" style="margin-top: 15px;">
  <label><?php echo lang('login_password_label', 'password');?>  </label>
    <?php echo form_input($password);?>

</div>
    <div class="col-md-12" style="margin-top: 25px;">
        <?php echo lang('login_remember_label', 'remember');?>
        <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
    </div>
    <div class="col-md-12" style="margin-top: 35px; margin-bottom: 15px;">
      <?php echo form_submit('submit', lang('login_submit_btn'),array('class'=>'c-btn c-btn--primary btn-login"'));?>
    </div>
</div>
<?php echo form_close();?>

<label><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></label>
<label style="margin-bottom: 15px;">or, Don't have an account?</label>
<?php echo anchor('auth/register','Register Now !',array('class'=>'c-btn c-btn--secondary c-btn--full'));?>