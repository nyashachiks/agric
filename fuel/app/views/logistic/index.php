<h2>Listing <span class='muted'>Logistics</span></h2>
<br/>

<?php if ($logistics): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Equipment Name</th>
			<th>Capacity</th>
			<th>Rate Per Hour</th>
			<th>Description</th>
			<th>Supplier</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($logistics as $item): ?>		<tr>

			<td><?php echo $item->equipmentname; ?></td>
			<td><?php echo $item->capacity; ?></td>
			<td><?php echo "$ ".$item->rateperhour; ?></td>
			<td><?php echo $item->description; ?></td>
			<td>
			<?php 
				
				$users=Auth\Model\Auth_User::find($item->supplier_id); //searching for user
				$firstname='';
			  	$lastname='';
			    //getting metadata
			 	
			  	foreach($users->metadata as $meta) //iterating through metadata
			  	{
				 	if($meta->key=='first_name')
				  		$firstname=$meta->value;
				  	if($meta->key=='last_name')
				  		$lastname=$meta->value;
				} 
				echo $firstname.' '.$lastname;
			?>
			
			</td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Form::button('View', '<i class="glyphicon glyphicon-eye-open"> View</i>', 
								array('class' => 'btn btn-info btn-sm', 'type'=>'button', 
								'onclick'=>"viewLogistic('$item->id','$item->equipmentname','$item->capacity','$item->rateperhour','$item->supplier_id','$item->description')")); ?>	
									
							<?php /* echo Form::button('Edit', '<i class="glyphicon glyphicon-wrench"> Edit</i>', 
								array('class' => 'btn btn-primary btn-sm','type'=>'button',  
						   'onclick'=>"editLogistic('$item->id',' $item->equipmentname',' $item->capacity','$item->rateperhour',' $item->supplier_id','$item->description')")); */ ?>					
						<?php /* echo Html::anchor('logistic/delete/'.$item->id, '<i class="glyphicon glyphicon-trash icon-white"></i> Delete', 
							array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); */?>					
					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Logistics.</p>

<?php endif; ?>
<!-- Modal -->
  <?php echo render('logistic/_addmodal'); ?>
  <!-- Modal -->
  <?php echo render('logistic/_editmodal'); ?>
   <!-- Modal -->
  <?php echo render('logistic/_viewmodal'); ?>
<script>
	function viewLogistic(id,equipmentname,capacity,rateperhour,supplierid,description)
{
	
	document.getElementById('view_equip_name').innerHTML='<strong>Name: </strong>'+equipmentname+'<br/>';
	document.getElementById('view_equip_capacity').innerHTML='<strong>Capacity: </strong>'+capacity+'<br/>';
	document.getElementById('view_equip_rate').innerHTML='<strong>Rate: </strong>'+rateperhour+'<br/>';
	document.getElementById('view_equip_description').innerHTML='<strong>Description </strong>'+description+'<br/>';
	document.getElementById('view_edit_id').value=id;
	document.getElementById('view_edit_equip_supplier_id').value=supplierid;
	document.getElementById('view_edit_equip_name').value=equipmentname;
	document.getElementById('view_edit_equip_capacity').value=capacity;
	document.getElementById('view_edit_equip_rate').value=rateperhour;
	document.getElementById('view_edit_equip_description').value=description;
	
	$('#viewLogisticModal').modal();
}
	function editLogistic(id,equipmentname,capacity,rateperhour,supplierid,description)
{	
	document.getElementById('edit_equip_name').value=equipmentname;
	document.getElementById('edit_equip_capacity').value=capacity;
	document.getElementById('edit_equip_rate').value=rateperhour;
	document.getElementById('edit_equip_description').value=description;
	document.getElementById('equip_supplier_id').value=supplierid;
	document.getElementById('edit_equip_id').value=id;
	
	
	$('#editLogisticModal').modal();
}

	function createLogistic()
	{
		document.getElementById("errorlogistic").style.display='none';
		document.getElementById('equip_name').value="";
		document.getElementById('equip_capacity').value="";
		document.getElementById('equip_rate').value="";
		document.getElementById('equip_description').value="";
		document.getElementById('equip_supplier_id').value="";
		$('#addLogisticModal').modal();
	}
</script>
