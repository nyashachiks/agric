<h2>Listing <span class='muted'>Users</span></h2>
<p>
<a href="<?php echo Uri::base();?>user/addCompanyUser"
 class="btn btn-primary">Create New User</a>
 </p>
<br />


<?php if ($meta): ?>
<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email</th>
			<th>Mobile</th>
			<th>Enabled</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
	<?php //foreach($meta as $metaInfo):?>
		<?php foreach ($meta as $item):
		$enabled=$item->user->enabled; ?>		
		<tr>
		<?php echo render('utilities/openform');?>
			<td><?php echo $item->user->first_name; ?></td>
			<td><?php echo $item->user->last_name;;?> </td>
			<td><?php echo $item->user->email; ?></td>
			<td><?php echo $item->user->username;?> </td>
			
			<td><?php echo ($enabled==1?"True":"False");?> </td>
			
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
					<!--enable button-->
					<?php 
					//if current user cannot disable
					list(, $userid) = Auth::get_user_id();
					if($userid!=$item->user->id):?>
					<?php echo render('utilities/_generichyperlinkbutton',array(
					'gly'=>($enabled<1?'glyphicon glyphicon-ok-circle':
					'glyphicon glyphicon-ban-circle'),
					'label'=>($enabled<1?" Enable":' Disable'),
					'link'=> ($enabled<1? 'user/enable/'.$item->user->id.'/1':
					'user/enable/'.$item->user->id.'/0') ,
					'view'=>'view',
					 ));?>
					 <?php endif;?>
					 <!--view button-->
					 <?php echo render('utilities/_generichyperlinkbutton',array(
					'gly'=>'glyphicon glyphicon-eye',
					'label'=>" View",
					'link'=> 'user/view/'.$item->user->id,
					'view'=>'view',
					 ));?>
					 
					 <!--assign role-->
					 <?php echo render('utilities/_generichyperlinkbutton',array(
					'gly'=>'glyphicon glyphicon-eye',
					'label'=>" Assign Role",
					'link'=> 'user/assignrole/'.$item->user->id,
					'view'=>'edit',
					 ));?>
					 
					 <!--delete button-->
					 <?php //cannot delete current user
					 if($userid!=$item->user->id):?>
					 <!--view button-->
					 <?php echo render('utilities/_generichyperlinkbutton',array(
					'gly'=>'glyphicon glyphicon-trash icon-white',
					'label'=>" Delete",
					'link'=> 'user/delete/'.$item->user->id,
					'view'=>'delete',
					'class'=>'btn btn-sm btn-danger',
					'onclick'=>"return confirm('Are you sure?')",
					 ));?>
					 <?php endif;?>			
						
					</div>
				</div>

			</td>
			<?php echo render('utilities/closeform');?>
		</tr>
		
		<?php endforeach; ?>
		<?php //endforeach; ?>	
	</tbody>
</table>

		<?php else: ?>
		<p>No Users.</p>

		<?php endif; ?>
<p>
	<!--?php echo Html::anchor('user/create', 'Add new User', array('class' => 'btn btn-success')); ?-->
</p>
