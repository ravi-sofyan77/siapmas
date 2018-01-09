<div id="infoMessage"><?php echo (isset($message))? $message : '';?></div>

<?php echo form_open("auth/submit_register");?>
<div class="row">
  
<div class="col-xs-12">




      <label>
            <?php echo lang('create_user_fname_label', 'first_name');?> <br />
            <?php echo form_input($first_name);?>
      </label>

      <label>
            <?php echo lang('create_user_lname_label', 'last_name');?> <br />
            <?php echo form_input($last_name);?>
      </label>
      
      <?php
      if($identity_column!=='email') {
          echo '<label>';
          echo lang('create_user_identity_label', 'identity');
          echo '<br />';
          echo form_error('identity');
          echo form_input($identity);
          echo '</label>';
      }
      ?>

      <label>
            Program Studi
            <?php //echo lang('create_user_company_label', 'company');?> <br />
            <?php echo form_input($company);?>
      </label>
      <label>
            <?php echo lang('create_user_email_label', 'email');?> <br />
            <?php echo form_input($email);?>
      </label>

      <label>
            <?php echo lang('create_user_phone_label', 'phone');?> <br />
            <?php echo form_input($phone);?>
      </label>

      <label>
            <?php echo lang('create_user_password_label', 'password');?> <br />
            <?php echo form_input($password);?>
      </label>

      <label>
            <?php echo lang('create_user_password_confirm_label', 'password_confirm');?> <br />
            <?php echo form_input($password_confirm);?>
      </label>


	<div class="u-mar-top-m">
		<a style="margin-bottom: 5px;" href="javascript:history.back(1);" class="">
            <i class="fa fa-arrow-left"></i>&nbsp;Kembali </a>&nbsp;
		<label class="text-right">
      		<?php echo form_submit('submit', 'Register',array('class'=>'c-btn c-btn--primary'));?>
		</label>
	</div>

<?php echo form_close();?>

</div>

</div>
