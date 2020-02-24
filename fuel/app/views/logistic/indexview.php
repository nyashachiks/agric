<h4><strong>Listing all Equipment for Hire</strong></h4>
<br/>
<!--?php echo Form::button('Create', '<i class="glyphicon glyphicon-plus"></i> Add New Logistic', 
								array('class' => 'btn btn-success', 'type'=>'button', 
								'onclick'=>"createLogistic()")); 
	?-->
<?php if ($logistics): ?>

<table class="table table-striped">
	<thead>
		<tr>
			<th class="col-xs-2">Equipment Name</th>
			<th class="col-xs-1">Capacity</th>
			<th class="col-xs-2">Supplier</th>
			<th class="col-xs-2">Actions</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($logistics as $item): ?>		<tr>

			<td><?php echo $item->equipmentname; ?></td>
			<td> <?php echo $item->capacity; ?></td>
			
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
			<?php $contact = Model_User::get_contact_details($item->supplier_id,'full'); ?>
			<button class="btn btn-success btn-xs" 
			onclick="viewLogistic(<?php echo $item->id;?>,'<?php echo $item->equipmentname;?>',<?php echo $item->capacity;?>,<?php echo $item->rateperhour;?>,<?php echo $item->supplier_id;?>,'<?php echo $item->description;?>','<?php echo $contact;?>')">View More</button>
			<?php //echo Form::button('btnView', 'View more ...', 
					//			array('class' => 'btn btn-success btn-xs', 'type'=>'button', 
					//			'on'
					//			'onclick'=>"viewLogistic('.$item->id.','.$item->equipmentname.',
					//			'.$item->capacity.','.$item->rateperhour.','.$item->supplier_id',
					//			'$item->description','$contact')")); ?>	
			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>
<!-- // end responsive table wrapper -->

<?php else: ?>
<p>No Equipment for Hire.</p>

<?php endif; ?>
<!-- Modal -->
  <?php echo render('logistic/_addmodal'); ?>
  <!-- Modal -->
  <?php echo render('logistic/_editmodal'); ?>
   <!-- Modal -->
  <?php echo render('logistic/_viewmodal'); ?>
<script>
	function viewLogistic(id,equipmentname,capacity,rateperhour,supplierid,description,contact = "")
{
		
	document.getElementById('view_equip_contact').innerHTML='<strong>Contact details: </strong>'+contact+'<br/>';
	
	document.getElementById('view_equip_name').innerHTML='<strong>Name: </strong>'+equipmentname+'<br/>';
	document.getElementById('view_equip_capacity').innerHTML='<strong>Capacity: </strong>'+capacity+'<br/>';
	document.getElementById('view_equip_rate').innerHTML='<strong>Rate: </strong>$'+rateperhour+'/hour <br/>';
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
