<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="row-fluid">
			<div class="col-md-3">
				<?php echo Form::label('Name', 'name', array('class'=>'control-label')); ?>
			</div>
			<div class="col-md-9">
				<?php echo Form::input('name', Input::post('name', isset($activity) ? $activity->name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Name','id'=>'eactivityname')); ?>
			</div>
		</div>
		<?php
			echo Form::hidden('budget_id', Input::post('budget_id', isset($activity) ? $activity->budget_id : ''), 
			array('id'=>'ebudgetid')); 
			echo Form::hidden('sid', Input::post('sid', isset($activity) ? $activity->id : ''), 
			array('id'=>'eactivityid')); 
			 
		?>
			
		
	</fieldset>
<?php echo Form::close(); ?>

	