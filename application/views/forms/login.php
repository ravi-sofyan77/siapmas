
        <div class="form-box" id="login-box">
            <div class="header"><span class="glyphicon glyphicon-book"></span> Login APeK</div>
            <?php echo form_open("auth/login");?>
                
                <div class="body bg-gray">
                    <div class="form-group">
                        <label><?php echo lang('login_identity_label', 'identity');?></label>
                        <?php echo form_input($identity);?>
                    </div>
                    <div class="form-group">
                        <label><?php echo lang('login_password_label', 'password');?></label>
                        <?php echo form_input($password);?>
                    </div>          
                </div>
                <div class="footer" style="padding-bottom: 35px;">                                                               
                    <?php echo form_submit('submit', lang('login_submit_btn'),array('class'=>'btn btn-danger btn-block'));?>
                    
                    <p class="col-xs-6">
                        <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
                        <?php echo lang('login_remember_label');?>
                    </p>
                    <p class="col-xs-6 text-right">
                        <a href="<?php echo site_url('auth/forgot_password');?>">
                        <?php echo lang('login_forgot_password');?></a>
                    </p>
                </div>

            <?php echo form_close();?> 

            <div class="margin text-center col-xs-12" >
              <span>
                <a href="http://jvm.co.id" target="_blank" style="color: white;">
                    CV JAVA MULTI MANDIRI
                </a> 
                &copy; 2017 
              </span>
            </div>
        </div>