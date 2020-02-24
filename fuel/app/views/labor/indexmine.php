<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
	<div class="x_title">
	<h2>List of my skills</h2>
	
	<div class="clearfix"></div>
	</div>
	<div class="x_content">
	<br/>
	<div class="row-fluid" style="margin-bottom: 15px;">
	<a href="<?php echo Uri::create('labor/create'); ?>">
		<?php echo Form::button('Createxx', '<i class="glyphicon glyphicon-plus"></i> Add New Labor', 
								array('class' => 'btn btn-success', 'type'=>'button'
							)); 
	?>
	</a>
</div>
<?php if ($mylabors): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th class="col-xs-2">Skill name</th>
			<th class="col-xs-1">Rate</th>
			<th class="col-xs-3">Description</th>
			<th class="col-xs-2">CV Name</th>
			<th class="col-xs-2">&nbsp;</th>
		</tr>
	</thead>
	<tbody>
	

<?php foreach ($mylabors as $item): ?>		<tr>
				<?php
					$users=Auth\Model\Auth_User::find($item->laborer_id); //searching for user
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
					
				 ?> 
			 
			<td><?php echo $item->skill_name; ?></td>
			<td><?php 
					$ratetime=Custom_UserUtility::$getRatePeriods[$item->rate_time];
					echo "$".$item->rate.'/'.$ratetime; ?></td>
			<td><?php echo $item->description; ?></td>
			<td><?php echo $item->actual_name; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php 
							echo Html::anchor('labor/view/'.$item->id, '<i class="glyphicon glyphicon-eye-open icon-white"></i> View', 
							array('class' => 'btn btn-sm btn-success')); 
						?>				
						<?php echo Html::anchor('labor/edit/'.$item->id, '<i class="glyphicon glyphicon-wrench"></i> Edit',
						array('class' => 'btn btn-sm btn-info')); ?> 		
						<?php echo Html::anchor('labor/delete/'.$item->id, '<i class="glyphicon glyphicon-trash icon-white"></i> Delete', 
						array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					
					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	
</tbody>
</table>

<?php else: ?>
<div class="alert alert-danger">
	<p>There are no skills. Consider adding one.</p>
</div>

<?php endif; ?>
	
	</div>
</div>
</div>


<!-- Modal -->
  <?php //echo render('labor/_addmodal'); ?>
  <!-- Modal -->
  <?php //echo render('labor/_editmodal'); ?>
   <!-- Modal -->
  <?php //echo render('labor/_viewmodal'); ?>
<script>
	function viewLabor(id, laborer_id,skillname,rate,description,actual_name,saved_as, firstname, lastname,ratetime)
{
	
	document.getElementById('heading').innerHTML='Viewing labor information for '+firstname+' '+lastname+'<br/>';
	
	document.getElementById('view_skill_name').innerHTML='<strong>Skill: </strong>'+skillname+'<br/>';
	document.getElementById('view_rate').innerHTML='<strong>Rate: </strong> $'+rate+' '+ ratetime+'<br/>';
	document.getElementById('view_description').innerHTML='<strong>Description: </strong>'+description+'<br/>';
	document.getElementById('cv_name').innerHTML='<strong>Download CV: </strong>'+actual_name+'<br/>';
	document.getElementById('view_edit_skill_id').value=id;
	document.getElementById('view_edit_skill_actual_name').value=actual_name;
	/*<input id='view_edit_skill_id'></input>
	<input id='view_edit_skill_name'></input>
	<input id='view_edit_skill_rate'></input>
	<input id='view_edit_skill_rate_interval'></input>
	<input id='view_edit_skill_description'></input>
	<input id='view_edit_skill_laborer_id'></input>
	
	
	<input id='view_edit_saved_as'></input>*/
	$('#viewLaborModal').modal();
}
	function editLabor(id, laborer_id,skillname,rate,description,actual_name,saved_as, firstname, lastname,ratetime)
{	
	
	
	$('#editLaborModal').modal();
}

	function createLabor()
	{
		document.getElementById("errorlabor").style.display='none';
		$('#addLaborModal').modal();
		
	}
</script>
