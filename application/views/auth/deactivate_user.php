<div class="row">
      <div class="col-12 col-md-8">
      <h1><?php echo lang('deactivate_heading');?></h1>
<p><?php echo sprintf(lang('deactivate_subheading'), $user->username);?></p>
      </div>
      <div class="col-12 col-md-4">
            <div class="text-right">
            
            <?php echo anchor('auth/index', ucwords('beranda'))?> |     
            
            <?php echo anchor('auth/logout', 'logout')?>

            </div>
      </div>
</div>
<div class="row">
	
<div class="col-12 col-md-6 offset-md-3">



<?php echo form_open("auth/deactivate/".$user->id);?>

  <p>
  	<?php echo lang('deactivate_confirm_y_label', 'confirm');?>
    <input type="radio" name="confirm" value="yes" checked="checked" />
    <?php echo lang('deactivate_confirm_n_label', 'confirm');?>
    <input type="radio" name="confirm" value="no" />
  </p>

  <?php echo form_hidden($csrf); ?>
  <?php echo form_hidden(array('id'=>$user->id)); ?>

  <p><?php echo form_submit('submit', lang('deactivate_submit_btn'),array('class'=>'btn btn-danger'));?></p>

<?php echo form_close();?>

</div>

</div>
