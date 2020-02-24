<div class="form-group">
	<?php echo Form::label('Type', 'type', array('class'=>'control-label')); ?>

	<?php 
		$arr = Model_Structure::$structure;
		echo Form::select('type', Input::post('type', isset($structure) ? $structure->type : ''),$arr,
		array('class' => 'col-md-4 form-control', 'placeholder'=>'Type')); 
	?>
	
</div>