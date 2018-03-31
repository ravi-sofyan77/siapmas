
<?php if (isset($details)) : ?>
	<label class="c-label">
    	Username
    	<input class="c-input" value="<?php echo $details['username'];?>" />
	</label>
	<label class="c-label">
    	email
    	<input class="c-input" value="<?php echo $details['email'];?>" />
	</label>
	<label class="c-label">
    	first name
    	<input class="c-input" value="<?php echo $details['first_name'];?>" />
	</label>
	<label class="c-label">
    	last name
    	<input class="c-input" value="<?php echo $details['last_name'];?>" />
	</label>
	
	
<?php endif; ?>