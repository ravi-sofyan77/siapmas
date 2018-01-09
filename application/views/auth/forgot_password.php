<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/forgot_password");?>

      <p>
            <label for="identity"><?php echo (($type=='email') ? sprintf(lang('forgot_password_email_label'), $identity_label) : sprintf(lang('forgot_password_identity_label'), $identity_label));?></label> <br />
            <?php 
                  $identity['class'] = 'c-input';
                  echo form_input($identity);
            ?>
      </p>

      <p>
      <a style="margin-bottom: 5px;" href="javascript:history.back(1);" class="">
            <i class="fa fa-arrow-left"></i>&nbsp;Kembali </a>&nbsp;   
            <?php echo form_submit('submit', lang('forgot_password_submit_btn'),
                  array('class'=>'c-btn c-btn--primary'));?>
            
      </p>

<?php echo form_close();?>