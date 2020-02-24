<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="row-fluid">
			<div class="col-md-4">
				<?php echo Form::label('Name', 'name', array('class'=>'control-label')); ?>
			</div>
			<div class="col-md-8">
				<?php echo Form::input('name', Input::post('name', isset($conversion) ? $conversion->name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Name')); ?>
			</div>
		</div>
		<div class="row-fluid">
			<div class="col-md-4">
				<?php echo Form::label('Quantity', 'quantity', array('class'=>'control-label')); ?>
			</div>
			<div class="col-md-8">
				<?php echo Form::input('quantity', Input::post('quantity', isset($conversion) ? $conversion->quantity : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Quantity')); ?>
			</div>
		</div>
		<div class="row-fluid">
			<div class="col-md-4">
				<?php echo Form::label('Measurement id', 'measurement_id', array('class'=>'control-label')); ?>
			</div>
			<div class="col-md-8">
				<?php echo Form::input('measurement_id', Input::post('measurement_id', isset($conversion) ? $conversion->measurement_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Measurement id')); ?>
			</div>
		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>