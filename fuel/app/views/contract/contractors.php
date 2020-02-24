<h4><strong>Listing <span class='muted'>Agronomists</span></strong></h4>
<br />

<?php if ($users): ?>
<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email</th>
			<th>Mobile</th>
			<th>&nbsp;</th>
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
			  	if($meta->key=='enabled')
			  		$enabled=$meta->value;
			  } 
			?>
		
		<tr>
		<?php echo render('utilities/openform');?>
			<td><?php echo $firstname; ?></td>
			<td><?php echo $lastname;?> </td>
			<td><?php echo $item->email; ?></td>
			<td><?php echo $item->username;?> </td>
			
			
			
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('contract/contract_view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>	</div>
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
