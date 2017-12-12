<div class="row">
      <div class="col-12 col-md-4">
        <h1><?php echo lang('edit_user_heading');?></h1>
<p><?php echo lang('edit_user_subheading');?></p>
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

<?php echo form_open(uri_string());?>

      <p>
            <?php echo lang('edit_user_fname_label', 'first_name');?> <br />
            <?php echo form_input($first_name);?>
      </p>

      <p>
            <?php echo lang('edit_user_lname_label', 'last_name');?> <br />
            <?php echo form_input($last_name);?>
      </p>

      <p>
            <?php echo lang('edit_user_company_label', 'company');?> <br />
            <?php echo form_input($company);?>
      </p>

      <p>
            <?php echo lang('edit_user_phone_label', 'phone');?> <br />
            <?php echo form_input($phone);?>
      </p>

      <p>
            <?php echo lang('edit_user_password_label', 'password');?> <br />
            <?php echo form_input($password);?>
      </p>

      <p>
            <?php echo lang('edit_user_password_confirm_label', 'password_confirm');?><br />
            <?php echo form_input($password_confirm);?>
      </p>

      <?php if ($this->ion_auth->is_admin()): ?>

          <h3><?php echo lang('edit_user_groups_heading');?></h3>
          <?php foreach ($groups as $group):?>
              <label class="checkbox">
              <?php
                  $gID=$group['id'];
                  $checked = null;
                  $item = null;
                  foreach($currentGroups as $grp) {
                      if ($gID == $grp->id) {
                          $checked= ' checked="checked"';
                      break;
                      }
                  }
              ?>
              <input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
              <?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
              </label>
          <?php endforeach?>

      <?php endif ?>

      <?php echo form_hidden('id', $user->id);?>
      <?php echo form_hidden($csrf); ?>

      <p><?php echo form_submit('submit', lang('edit_user_submit_btn'),array('class'=>'btn btn-primary'));?></p>

<?php echo form_close();?>

</div>

</div>