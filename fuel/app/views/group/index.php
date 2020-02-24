<h2>Listing <span class='muted'>Organisations</span></h2>
<br>
<?php if ($structures): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>Structure</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($structures as $item): ?>		<tr>

			<td><?php echo $item->name; ?></td>
			<td><?php
			$count=0;//gives count of roles associated with the structure
			//Debug::dump($item->roles);
			$cout_group_roles=0;
			if(isset($item->roles))
				{
					foreach($item->roles as $r)
					{	///echo $r->name;
					$cout_group_roles+=1;
					}
				}
			//$cout_group_roles=count(count($item->roles));// gives count of roles associated with group
			if(isset($item->structures))
			{
				foreach($item->structures as $struct)
				{
					$count+=count($struct->roles);
					echo $struct->name. ' ';
				}
			
			} 
			//for now total count, i m adding the 2 counts
			//but this is buggy
			$count += $cout_group_roles;
			
			 ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
					<?php 
					
					
					//=(isset($item->structures->roles)?count($item->structures->roles):0);
					
					echo Html::anchor('group/selectroles/'.$item->id, '<span class="badge">'.$count.'</span> <i class="glyphicon glyphicon-user"></i>
					 Roles Covered',
						 array('class' => 'btn btn-warning btn-sm')); ?>
						 
						<?php echo Html::anchor('structure/view/'.$item->id, '<i class="glyphicon glyphicon-eye-open"></i> View',
						 array('class' => 'btn btn-default btn-sm','onclick'=>'getModal()')); ?>	
						 					<?php echo Html::anchor('structure/edit/'.$item->id,
						 					 '<i class="glyphicon glyphicon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('structure/delete/'.$item->id, 
						 					 '<i class="glyphicon glyphicon-trash glyphicon-white"></i> Delete', 
						 					 array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Structures.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('group/create', 'Add new Organisation', array('class' => 'btn btn-success')); ?>
</p>
