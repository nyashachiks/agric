<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
	<div class="x_title">
		<h2>Labour available for hire</h2>
		<div class="clearfix"></div>
	</div>
	<div class="x_content">
		<br/>
		
	</div>
</div>
</div>

<h2>Listing <span class='muted'>Labors</span></h2>
<br>
<?php if ($labors): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th class="col-xs-2">Laborer Name</th>
			<th class="col-xs-2">Skill name</th>
			<th class="col-xs-1">Rate</th>
			<th class="col-xs-4">Description</th>
			<th class="col-xs-2">CV Name</th>
			<th class="col-xs-1">&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($labors as $item): ?>		<tr>
			
			<td>
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
					echo $firstname.' '.$lastname;
				 ?> 
			 </td>
			<td><?php echo $item->skill_name; ?></td>
			<td><?php echo $item->rate; ?></td>
			<td><?php echo nl2br($item->description); ?></td>
			<td><?php echo $item->actual_name; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php 
						/*	$ratetime=Custom_UserUtility::$getRatePeriods[$item->rate_time];
								echo Form::button('view', '<i class="glyphicon glyphicon-eye-open"></i> View', 
								array('class' => 'btn btn-success btn-sm', 'type'=>'button', 
								'onclick'=>"viewLabor('$item->id','$item->laborer_id','$item->skill_name','$item->rate','$item->description','$item->actual_name','$item->saved_as','$firstname','$lastname','$ratetime')")); 
						 */	?>	
							
							<a href="<?php echo Uri::create('labor/view/'. $item->id) ?>"  style="">
							<button class="btn btn-xs btn-success">View</button>
							</a>
						<?php 
						/*	echo Form::button('edit', '<i class="glyphicon glyphicon-eye-open"></i> Edit', 
							array('class' => 'btn btn-info btn-sm', 'type'=>'button', 
								'onclick'=>"editLabor('$item->id','$item->laborer_id','$item->skill_name','$item->rate','$item->description','$item->actual_name','$item->saved_as','$firstname','$lastname','$ratetime')")); */
						?>				
						<?php 
						/*
						echo Html::anchor('labor/delete/'.$item->id, '<i class="glyphicon glyphicon-trash icon-white"></i> Delete', 
						array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); */ ?>					
					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Labors.</p>

<?php endif; ?><p>
	
</p>
<!-- Modal -->
  <?php echo render('labor/_addmodal'); ?>
  <!-- Modal -->
  <?php echo render('labor/_editmodal'); ?>
   <!-- Modal -->
  <?php echo render('labor/_viewmodal'); ?>
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
