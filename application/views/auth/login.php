


<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/login");?>
<div class="row">
  <div class="col-6">
    <h3 style="font-weight: 700; font-size: 3em;">Login</h3>
  </div>
  <div class="col-6 text-right">
    <?php echo anchor('auth/landingpage','kembali');?>
  </div>
</div>
<div class="row">
  <div class="col-12">
    <p style="font-size: 1.4em;"><?php echo lang('login_subheading');?></p>
  </div>
</div>
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
<label style="margin-bottom: 15px;">atau, Belum memiliki akun?</label>
<?php echo anchor('auth/register','Daftar Sekarang',array('class'=>'c-btn c-btn--secondary c-btn--full'));?>