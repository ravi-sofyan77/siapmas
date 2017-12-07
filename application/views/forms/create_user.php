<?php 
    if (isset($me)) {
      echo form_open($me."/save_new_user");
    }
    
  ?>
<div class="row">
    <div class="row">
        <div class="col-xs-12">
          <div class="text-right">
            <button type="submit" class="btn btn-primary">
              <i class="fa fa-save"></i>
              Simpan
            </button>
          </div>  
        </div>
      </div>
<div class="col-md-6 col-lg-offset-3" >
	
  		<div class="row">
  			<div class="col-xs-12">
  				<div class="form-group">
    			<label >Username</label>
    				<input type="text" name="username" class="form-control"  placeholder="Username">
  				</div>
  				<div class="form-group">
    				<label >Email address</label>
    				<input type="email" name="email" class="form-control"  placeholder="Alamat Email">
  				</div>
  				<div class="form-group">
    				<label >Password</label>
    				<input type="password" name="password" class="form-control"  placeholder="Password">
  				</div>
  				<div class="form-group">
    			<label >Grup pengguna</label>
				<?php if (isset($groups)){ ?>
        			<select class="form-control" name="group">
        				<option value="0">pilih group</option>
          				<?php
          					foreach ($groups as $key => $item) { ?>
            					<option value="<?php echo $item['id'];?>"><?php echo $item['name'];?></option>
          						<?php } ?>
          				</select>
				<?php  }else{ ?>
      					<input type="hidden" name="group" value="6" />
				<?php } ?>
  				</div>
  			</div>
  		</div>
  		
	</div>
</div>
<?php echo form_close();?>