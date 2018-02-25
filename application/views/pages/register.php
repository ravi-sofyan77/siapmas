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
          <select class="c-input" name="company">
            <option value="0">Pilih salah satu</option>
            <optgroup label="Fakultas Teknik Telekomunikasi Dan Elektro">
                <option value="S1 Teknik Telekomunikasi">
                    S1 Teknik Telekomunikasi
                </option>
                <option value="D3 Teknik Telekomunikasi">
                    D3 Teknik Telekomunikasi
                </option>
                <option value="S1 Teknik Elektro">
                    S1 Teknik Elektro
                </option>
            </optgroup>
            <optgroup label="Fakultas Teknik Informatika Dan Industri">
                <option value="S1 Teknik Informatika">
                    S1 Teknik Informatika
                </option>
                <option value="S1 Software Engineering">
                    S1 Software Engineering
                </option>
                <option value="S1 Sistem Informasi">
                    S1 Sistem Informasi
                </option>
                <option value="S1 Teknik Industri">
                    S1 Teknik Industri
                </option>
            </optgroup>
        </select>
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
<div class="clearfix">
    <div class="u-l-fl">
        <?php echo anchor('auth/login','kembali');?>
    </div>
    <div class="u-l-fr">
        <?php echo form_submit('submit', 'Register',array('class'=>'c-btn c-btn--primary'));?>
    </div>
</div>

  <?php echo form_close();?>

</div>

</div>
