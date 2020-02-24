<h2>Listing <span class='muted'>Agronomists</span></h2>
<br />

<?php if ($users): ?>
<table class="table table-striped table-bordered" id="tbl-users">
	<thead>
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email</th>
			<th>Mobile</th>
		</tr>
	</thead>
	<tbody>
		<?php $count = 0; ?>
	
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
			
		
			<?php if(Model_User::is_AGRITAX($item->id)): 
				  $count++;
			?>
		
		<tr>
			<td><?php echo $firstname; ?></td>
			<td><?php echo $lastname;?> </td>
			<td><?php echo $item->email; ?></td>
			<td><?php echo $item->username;?> </td>
		</tr>
		<?php endif; ?>
		
		<?php endforeach; ?>	
	</tbody>
</table>

		<?php else: ?>
		<div class="alert alert-danger" style="display: none" id="no-records">
			There are no agronomists
		</div>

		<?php endif; ?>
