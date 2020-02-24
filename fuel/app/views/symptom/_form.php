<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		
		<div class="row-fluid">
			<div class="col-md-3">
				<?php echo Form::label('Description', 'description', array('class'=>'control-label')); ?>
			</div>
			<div class="col-md-9">
				<?php echo Form::textarea('description', Input::post('description', isset($symptom) ? $symptom->description : ''), array('class' => 'col-md-4 form-control','rows'=>'4', 'placeholder'=>'Description')); ?>
			</div>
		</div>
		
		
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>