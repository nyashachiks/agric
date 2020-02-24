<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Region id', 'region_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('region_id', Input::post('region_id', isset($region_condition) ? $region_condition->region_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Region id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Condition id', 'condition_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('condition_id', Input::post('condition_id', isset($region_condition) ? $region_condition->condition_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Condition id')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>