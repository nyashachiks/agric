<h3>Viewing <?php echo $budget->name; ?></h3>
<?php ?>
<p>
	<strong>Name:</strong>
	<?php echo $budget->name; ?>
</p>
<p>
	<strong>Product:</strong>
	<?php $product = Model_Product::find('all');
					foreach($product as $item)
						$arr[]=$item->name;
	echo $arr[$budget->product-1]; ?>
</p>
<p>
	<strong>Region:</strong>
	<?php echo Custom_UserUtility::$getRegions[$budget->region]; ?>
</p>
	
<p>
	<strong>Soil Type:</strong>
	<?php echo Custom_UserUtility::$getSoilType[$budget->soiltype]; ?>
</p>

<div id='activity'>
	<h4><strong>Listing <span class='muted'>Activities for budget</span></strong></h4>
	
	<?php 
			echo Form::button('Add', '<i class="glyphicon glyphicon-plus"></i> Add new Activity', 
								array('class' => 'btn btn-success btn-md', 'type'=>'button', 
								'onclick'=>"addActivity('$budget->id')")); 
	?>	
	<br/>
	<br/>
	<?php if ($activities): ?>
		
			<?php foreach ($activities as $item): ?>
			<div style="border-style: solid; border-color: #01320c; border-width: thin; padding: 5px;">
			<div class="row">
				<div class="col-md-3">		
					<h4><strong><?php echo $item->name; ?></strong>	</h4>					
				</div>		
				<div class="col-md-9">			
					<div class="btn-toolbar">
							<div class="btn-group">
								<?php 
								
								echo Form::button('add_input', '<i class="glyphicon glyphicon-plus"></i> Add an Input', 
								array('class' => 'btn btn-md btn-info', 'type'=>'button', 
								'onclick'=>"addInput('$item->id')")); 
								echo Form::button('add_input', '<i class="glyphicon glyphicon-plus"></i> Add a farming Guide Tip', 
								array('class' => 'btn btn-md btn-primary', 'type'=>'button', 
								'onclick'=>"addFarmGuide('$item->id','$item->name')")); 
								
								echo Form::button('edit', '<i class="glyphicon glyphicon-wrench"></i> Edit Activity ', 
								array('class' => 'btn btn-md btn-success', 'type'=>'button', 
								'onclick'=>"editActivity('$budget->id','$item->id','$item->name')")); 
					 				?>	
																	
					<?php echo Html::anchor('activity/delete/'.$item->id, 
							'<i class="glyphicon glyphicon-trash icon-white"></i> Delete Activity', 
							array('class' => 'btn btn-md btn-danger', 'onclick' => "return confirm('Are you sure?')")); 
					?>
							</div>
					</div>
				</div>
				
			</div>	
				<br/>
			<div class="row-fluid" style="padding-left: 10px;">
				<?php  
					$activity_id=$item->id;
					$inputs=Model_Input::query()->where('activity_id',$activity_id)->get();
					//echo Session::set('inputs', $inputs);
					
				echo render('input/index', array('inputs'=>$inputs, 'activity'=>$item->name));
				?>	
			</div>	
			<div class="row-fluid" style="padding-left: 10px;">
				<?php  
					$activity_id=$item->id;
					$farmguides=Model_Farmguide::query()->where('activity_id',$activity_id)->get();
					echo render('farmguide/index', array('farmguides'=>$farmguides, 'activity'=>$item->name));
				?>	
			</div>	
				
		</div>		
			<?php endforeach; ?>	
		

	<?php else: ?>
	<p>No Activities.</p>

	<?php endif; ?>
</div>
  <!-- Add Activity Modal -->
  	<?php echo render('budget/_addActivityModal'); ?>
  <!-- Edit Activity Modal -->
  	<?php echo render('budget/_editActivityModal'); ?>
  <!-- Add Input Modal -->
  	<?php echo render('budget/_addInputModal'); ?>
  <!-- Edit Input Modal -->
  	<?php echo render('budget/_editInputModal'); ?>
  <!-- Add Input Modal -->
  	<?php echo render('budget/_addFarmguideModal'); ?>
  <!-- Edit Input Modal -->
  	<?php echo render('budget/_editInputModal'); ?>
  	<!-- Add Input Modal -->
  	<?php echo render('budget/_editFarmguideModal'); ?>
   <!-- Modal -->
  <!--?php echo render('budget/_viewmodal'); ?-->
<script>
	function addActivity(budgetid)
	{
		document.getElementById("erroractivity").style.display='none';
		document.getElementById('activityname').value='';
		document.getElementById('budgetid').value=budgetid;
		
		$('#addActivityModal').modal();
	}
	function editActivity(budget_id,id,name)
	{
		document.getElementById("erroreditactivity").style.display='none';
		document.getElementById('eactivityname').value=name;
		document.getElementById('ebudgetid').value=budget_id;
		document.getElementById('eactivityid').value=id;	
		
		$('#editActivityModal').modal();
	}
	function addFarmGuide(activity_id,activity_name)
	{
		document.getElementById("errorfarmguide").style.display='none';
		document.getElementById('factivityid').value=activity_id;
		document.getElementById('factivityname').value=activity_name;
		document.getElementById('farmguideheader').innerHTML='Add a Farm Guide Description for '+activity_name+' actvity.'
		
		$('#addFarmguideModal').modal();
	}
	function addInput(activityid)
	{	
		document.getElementById("erroraddinput").style.display='none';
		document.getElementById('inactivityid').value=activityid;
		
		$('#addInputModal').modal();
	}
	function editInput(id,name,unitcost, quantity,totalcost,activity_id,unit)
	{
		document.getElementById('einname').value=name;
		document.getElementById('einid').value=id;
		document.getElementById('eincostperunit').value=unitcost;	
		document.getElementById('einactivityid').value=activity_id;
		document.getElementById('einquantity').value=quantity;
		document.getElementById('eintotalcost').value=totalcost;
		$("#einunits").val(unit);
		
		$('#editInputModal').modal();
	}
	function editFarmguide(id,description,activity_id,activity_name)
	{
		document.getElementById("erroreditfarmguide").style.display='none';
		document.getElementById('efid').value=id;
		document.getElementById('efactivityid').value=activity_id;
		document.getElementById('efactivityname').value=activity_name;
		document.getElementById('efdescription').value=description;
		document.getElementById('efarmguideheader').innerHTML='Editing Farm Guide Description for '+activity_name+' actvity.'
		
		$('#editFarmguideModal').modal();
	}
	
	
	

</script>
