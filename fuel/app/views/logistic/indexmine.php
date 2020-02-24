<h4><strong>Listing All My Equipment up for Hire</strong></h4>
<br/>
<div class="row-fluid" style="margin-bottom: 15px">
	<?php 
	list(, $userid) = Auth::get_user_id(); 
	echo Form::button('Create', '<i class="glyphicon glyphicon-plus"></i> Add New Logistic', 
								array('class' => 'btn btn-success', 'type'=>'button', 
								'onclick'=>"createLogistic($userid)")); 
	?>
</div>
<?php if ($mylogistics): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th style='white-space:nowrap;'>Equipment Name</th>
			<th style='white-space:nowrap;'>Capacity</th>
			<th style='white-space:nowrap;'>Rate Per Hour</th>
			<th style='white-space:nowrap;'>Description</th>
			<th style="width:100%;">&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($mylogistics as $item): ?>		<tr>

			<td style='white-space:nowrap;'><?php echo $item->equipmentname; ?></td>
			<td style='white-space:nowrap;'><?php echo $item->capacity; ?></td>
			<td style='white-space:nowrap;'><?php echo "$ ".$item->rateperhour; ?></td>
			<td style='white-space:nowrap;'><?php echo $item->description; ?></td>
			
			<td style="width:100%;">
				<div class="btn-toolbar">
					<div class="btn-group" style='float: right;'>
						<!--?php echo Form::button('View', '<i class="glyphicon glyphicon-eye-open"> View</i>', 
								array('class' => 'btn btn-info btn-sm', 'type'=>'button', 
								'onclick'=>"viewLogistic('$item->id','$item->equipmentname','$item->capacity','$item->rateperhour','$item->supplier_id','$item->description')")); ?-->	
									
							<?php echo Form::button('Edit', '<i class="glyphicon glyphicon-wrench"> Edit</i>', 
								array('class' => 'btn btn-primary btn-sm','type'=>'button',  
						   'onclick'=>"editLogistic('$item->id',' $item->equipmentname',' $item->capacity','$item->rateperhour',' $item->supplier_id','$item->description')")); ?>					
						<?php echo Html::anchor('logistic/delete/'.$item->id, '<i class="glyphicon glyphicon-trash icon-white"></i> Delete', 
							array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					
					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<div class="alert alert-danger">There is no equipment up for hire.</div>

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

	function createLogistic(supplierid)
	{
		
		document.getElementById("errorlogistic").style.display='none';
		document.getElementById('equip_name').value="";
		document.getElementById('equip_capacity').value="";
		document.getElementById('equip_rate').value="";
		document.getElementById('equip_description').value="";
		document.getElementById('equip_supplier_id').value=supplierid;
		$('#addLogisticModal').modal();
	}
</script>
