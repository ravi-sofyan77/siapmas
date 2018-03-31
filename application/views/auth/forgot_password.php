<h1><?php echo lang('forgot_password_heading');?></h1>
<p><?php echo sprintf(lang('forgot_password_subheading'), $identity_label);?></p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/forgot_password");?>

      <p>
      	<label for="identity"><?php echo (($type=='email') ? sprintf(lang('forgot_password_email_label'), $identity_label) : sprintf(lang('forgot_password_identity_label'), $identity_label));?></label> <br />
      	<?php 
      	$identity['class'] ='c-input';
      	echo form_input($identity);?>
      </p>
      <div class="o-flag o-flag--rev u-mar-bottom-m">
      	<div class="o-flag__flex">
      		<?php echo anchor('auth/login','kembali');?>
  		</div>
  		<div class="o-flag__fix">
    		<?php echo form_submit('submit', lang('forgot_password_submit_btn'),array('class'=>'c-btn c-btn--primary"'));?>
  		</div>
      
      </div>

<?php echo form_close();?>
