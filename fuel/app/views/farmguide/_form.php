<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<h4 id='farmguideheader'></h4>
		<?php 
				echo Form::hidden('activity_id', Input::post('activity_id', 
				isset($farmguide) ? $farmguide->activity_id : ''),
				array('id'=>'factivityid')	);
				
				echo Form::hidden('activity_name', '',array('id'=>'factivityname')	);
		?>
	
		
		<div class="row-fluid">
			<div class="col-md-3">
				<?php echo Form::label('Description', 'description', array('class'=>'control-label')); ?>
			</div>
			<div class="col-md-9">
				<?php echo Form::input('description', Input::post('description', 
				isset($farmguide) ? $farmguide->description : ''), 
				array('id'=>'fdescription','class' => 'col-md-4 form-control', 'placeholder'=>'Description')); ?>
			</div>
		</div>
		
	</fieldset>
<?php echo Form::close(); ?>