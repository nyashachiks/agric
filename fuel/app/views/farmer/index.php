<h2>Listing <span class='muted'>Users</span></h2>
<br />

<?php if ($users): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email</th>
			<th>Mobile</th>
			<th>Receipt No.</th>
			<th>Operations</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($users as $item): ?>	
		<?php $firstname='';
			  $lastname='';
			  $structure='';
			  $enabled=0;
			  //getting metadata
			  foreach($item->metadata as $meta)
			  {
			  	//Debug::dump($meta);die;
			  	if($meta->key=='first_name')
			  		$firstname=$meta->value;
			  	if($meta->key=='last_name')
			  		$lastname=$meta->value;
			  	if($meta->key=='structure_id')
			  		$structure=$meta->value;
			  } 
			?>
		
		<tr>
		<?php echo render('utilities/openform');?>
			<td><?php echo $firstname; ?></td>
			<td><?php echo $lastname;?> </td>
			<td><?php echo $item->email; ?></td>
			<td><?php echo $item->username;?> </td>
			<td><?php
				echo Model_User::get_activation_code($item->id); 
			?> </td>
			
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
					<!--enable button-->
					<?php 
					//if current user cannot disable
					list(, $userid) = Auth::get_user_id();
					if($userid!=$item->id):?>
					<?php echo render('utilities/_generichyperlinkbutton',array(
					'gly'=>($enabled<1?'glyphicon glyphicon-ok-circle':'glyphicon glyphicon-ban-circle'),
					'label'=>($enabled<1?" Enable":' Disable'),
					'link'=> ($enabled<1? 'user/enable/'.$item->id.'/1':'user/enable/'.$item->id.'/0') ,
					'view'=>'view',
					 ));?>
					 <?php endif;?>
					 <!--view button-->
					 <?php echo render('utilities/_generichyperlinkbutton',array(
					'gly'=>'glyphicon glyphicon-eye',
					'label'=>" View",
					'link'=> 'user/view/'.$item->id,
					'view'=>'view',
					 ));?>
					 
					 <!--assign role-->
					 <?php echo render('utilities/_generichyperlinkbutton',array(
					'gly'=>'glyphicon glyphicon-eye',
					'label'=>" Assign Role",
					'link'=> 'user/assignrole/'.$item->id,
					'view'=>'edit',
					 ));?>
					 
					 <!--delete button-->
					 <?php //cannot delete current user
					 if($userid!=$item->id):?>
					 <!--view button-->
					 <?php echo render('utilities/_generichyperlinkbutton',array(
					'gly'=>'glyphicon glyphicon-trash icon-white',
					'label'=>" Delete",
					'link'=> 'user/delete/'.$item->id,
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
	</tbody>
</table>

		<?php else: ?>
		<p>No Users.</p>

		<?php endif; ?>
<p>
	<!--?php echo Html::anchor('user/create', 'Add new User', array('class' => 'btn btn-success')); ?-->
</p>
