<div class="row">
      <div class="col-12 col-md-4">
            <h1><?php echo lang('forgot_password_heading');?></h1>
			<p><?php echo sprintf(lang('forgot_password_subheading'), $identity_label);?></p>
      </div>
      <div class="col-12 col-md-8">
            <div class="text-right">
            
            <?php echo anchor('auth/index', ucwords('beranda'))?> |     
            <?php echo anchor('auth/create_user', lang('index_create_user_link'))?> | 
            <?php echo anchor('auth/create_group', lang('index_create_group_link'))?> |
            <a href='<?php echo site_url('admin/daftar_prasarana')?>'>
                  <?php echo ucwords('prasarana');?>
            </a> |
            <a href='<?php echo site_url('admin/daftar_sarana')?>'>
                  <?php echo ucwords('sarana');?>
            </a> |
            <?php echo anchor('auth/logout', 'logout')?>

            </div>
      </div>
</div>
<div class="row">
	
<div class="col-12 col-md-6 offset-md-3">


<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/forgot_password");?>

      <p>
      	<label for="identity"><?php echo (($type=='email') ? sprintf(lang('forgot_password_email_label'), $identity_label) : sprintf(lang('forgot_password_identity_label'), $identity_label));?></label> <br />
      	<?php echo form_input($identity);?>
      </p>

      <p><?php echo form_submit('submit', lang('forgot_password_submit_btn'),array('class'=>'btn btn-primary'));?></p>

<?php echo form_close();?>

</div>

</div>