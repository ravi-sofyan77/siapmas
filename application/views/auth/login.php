<h1><?php echo lang('login_heading');?></h1>
<p><?php echo lang('login_subheading');?></p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/login");?>

  <p>
    <?php echo lang('login_identity_label', 'identity');?>
    <?php echo form_input($identity);?>
  </p>

  <p>
    <?php echo lang('login_password_label', 'password');?>
    <?php echo form_input($password);?>
  </p>
  <div class="clearfix">
        <div class="u-l-fl">
        <?php echo lang('login_remember_label', 'remember');?>
        <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
        </div>
        <div class="u-l-fr">
          <?php echo form_submit('submit', lang('login_submit_btn'),array('class'=>'c-btn c-btn--primary"'));?>
        </div>
  </div>

<?php echo form_close();?>

<p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>
<p>or, Don't have an account?</p>
<?php echo anchor('auth/register','Register Now !',array('class'=>'c-btn c-btn--secondary c-btn--full'));?>