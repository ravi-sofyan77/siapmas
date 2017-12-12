<div class="row">
	<div class="col-12 col-md-4">
		<h1><?php echo lang('index_heading');?></h1>
		<p><?php echo lang('index_subheading');?></p>
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
<table id="basic-datatables" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
            	<th><?php echo lang('index_fname_th');?></th>
				<th><?php echo lang('index_lname_th');?></th>
				<th><?php echo lang('index_email_th');?></th>
				<th><?php echo lang('index_groups_th');?></th>
				<th><?php echo lang('index_status_th');?></th>
				<th><?php echo lang('index_action_th');?></th>
            </tr>
        </thead>
        <tfoot>
            <tr>
				<th><?php echo lang('index_fname_th');?></th>
				<th><?php echo lang('index_lname_th');?></th>
				<th><?php echo lang('index_email_th');?></th>
				<th><?php echo lang('index_groups_th');?></th>
				<th><?php echo lang('index_status_th');?></th>
				<th><?php echo lang('index_action_th');?></th>
            </tr>
        </tfoot>
        <tbody>
            <?php foreach ($users as $user):?>
		<tr>
            <td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
            <td><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
            <td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
			<td>
				<?php foreach ($user->groups as $group):?>
					<?php echo anchor("auth/edit_group/".$group->id, htmlspecialchars($group->name,ENT_QUOTES,'UTF-8')) ;?><br />
                <?php endforeach?>
			</td>
			<td><?php echo ($user->active) ? anchor("auth/deactivate/".$user->id, lang('index_active_link')) : anchor("auth/activate/". $user->id, lang('index_inactive_link'));?></td>
			<td><?php echo anchor("auth/edit_user/".$user->id, 'Edit') ;?></td>
		</tr>
	<?php endforeach;?>
        </tbody>
    </table>






