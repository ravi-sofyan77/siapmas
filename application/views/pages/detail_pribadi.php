
<div class="container">
<div class="row">
	<div class="col-xs-12 col-md-8">
		
	</div>
	<div class="col-xs-12 col-md-4 text-right">
      <a style="margin-bottom: 5px;" href="javascript:history.back(1);"  class="btn btn-default">
      <i class="fa fa-arrow-left"></i>&nbsp;Kembali </a>
	</div>
</div>
	<div class="row">
		<div class="col-md-10 col-lg-offset-2" >
			<div class="panel with-nav-tabs panel-info col-md-8" >
  				<div class="panel-heading">
      			<ul class="nav nav-tabs">
      				<li class="active">
        				<a href="#home" aria-controls="home" data-toggle="tab">
        					Informasi Akun
        				</a>
        			</li>
        			<li >
        				<a href="#profile" aria-controls="profile" data-toggle="tab">
        					Informasi Umum
        				</a>
        			</li>

        			<li>
        				<a href="#setting" aria-controls="setting"  data-toggle="tab">
        					Ganti Password
        				</a>
        			</li>
      			</ul>
  				</div>
  			<div class="panel-body">
  				<div class="tab-content">
  					<div role="tabpanel" class="tab-pane active" id="home" >
              			
              			<?php
              			if (isset($info) && $info) {
              				foreach ($info as $key => $value) { 
              					if (in_array($key, array('id_pegawai','username','email'))) { ?>
              					<div class="form-group">
              						<label><?php echo ucfirst($key);?></label>
              						
              						<input type="text" class="form-control" 
              							name="<?php echo $key;?>" 
              							value="<?php echo $value;?>" /> 

              					</div>
              				<?php }
              				}
              			}
              			?>
            		</div>
            		<div role="tabpanel" class="tab-pane" id="profile" >
            			<!-- informasi umum here -->
            			<h1>Informasi umum</h1>
            		</div>
  					
  					<div role="tabpanel" class="tab-pane" id="setting">
  						<!-- setting here -->

						<?php
                			if (isset($me)) {
                    			echo form_open($me."/reset_password");
                			}
                		?>
            			<div class="form-group">
              				<label>Password Baru</label>
              				<input type="password" name="password" class="form-control" />
            			</div>
            			<div class="form-group">
              				<label>Konfirmasi Password baru</label>
              				<input type="password" name="cpassword" class="form-control" />
                		</div>
                  			<button type="submit" class="btn btn-primary" >Simpan</button>
                  
                  		<?php echo form_close();?>
  					</div>
  				</div>
  			</div>
		</div>
	</div>
</div>