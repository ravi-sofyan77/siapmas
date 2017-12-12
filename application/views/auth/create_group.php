<div class="row">
      <div class="col-12 col-md-4">
<h1><?php echo lang('create_group_heading');?></h1>
<p><?php echo lang('create_group_subheading');?></p>
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