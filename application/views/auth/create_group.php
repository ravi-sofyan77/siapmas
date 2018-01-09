<h1><?php echo lang('create_group_heading');?></h1>
<p><?php echo lang('create_group_subheading');?></p><div class="row">
      
<div class="col-12 col-md-6 offset-md-3">


<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/create_group");?>

      <p>
            <?php echo lang('create_group_name_label', 'group_name');?> <br />
            <?php echo form_input($group_name);?>
      </p>

      <p>
            <?php echo lang('create_group_desc_label', 'description');?> <br />
            <?php echo form_input($description);?>
      </p>
      <div class="form-group">
      	<a href="javascript:history.back()" class="btn ">
      	<i class="fa fa-arrow-left"></i>&nbsp;
      	Kembali
      </a>
      <?php echo form_submit('submit', lang('create_group_submit_btn'),array('class'=>'btn btn-primary'));?>	
      </div>
      

<?php echo form_close();?>
</div>

</div>