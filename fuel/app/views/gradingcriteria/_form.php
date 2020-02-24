<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Crit name', 'crit_name', array('class'=>'control-label')); ?>

				<?php echo Form::input('crit_name', Input::post('crit_name', isset($gradingcriterium) ? $gradingcriterium->crit_name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Crit name')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Short name', 'short_name', array('class'=>'control-label')); ?>

				<?php echo Form::input('short_name', Input::post('short_name', isset($gradingcriterium) ? $gradingcriterium->short_name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Short name')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>