
<h3><?php echo lang('forgot_password_heading');?></h3>
<p><?php echo sprintf(lang('forgot_password_subheading'), $identity_label);?></p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/submit_forgot_password");?>

      <p>
      	<label for="identity"><?php echo (($type=='email') ? sprintf(lang('forgot_password_email_label'), $identity_label) : sprintf(lang('forgot_password_identity_label'), $identity_label));?></label> <br />
      	<?php echo form_input($identity);?>
      </p>

      <p>
      <a href="<?php echo site_url('auth/index');?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> kembali</a>
      <?php echo form_submit('submit', lang('forgot_password_submit_btn'),array('class'=>'btn btn-primary'));?></p>

<?php echo form_close();?>