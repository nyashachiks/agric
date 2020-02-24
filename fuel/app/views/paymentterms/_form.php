<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Code', 'code', array('class'=>'control-label')); ?>

				<?php echo Form::input('code', Input::post('code', isset($paymentterm) ? $paymentterm->code : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Code')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Description', 'description', array('class'=>'control-label')); ?>

				<?php echo Form::input('description', Input::post('description', isset($paymentterm) ? $paymentterm->description : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Description')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>