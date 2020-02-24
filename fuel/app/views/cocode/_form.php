<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Id', 'id', array('class'=>'control-label')); ?>

				<?php echo Form::input('id', Input::post('id', isset($cocode) ? $cocode->id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Co code', 'co_code', array('class'=>'control-label')); ?>

				<?php echo Form::input('co_code', Input::post('co_code', isset($cocode) ? $cocode->co_code : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Co code')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Co name', 'co_name', array('class'=>'control-label')); ?>

				<?php echo Form::input('co_name', Input::post('co_name', isset($cocode) ? $cocode->co_name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Co name')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('City', 'city', array('class'=>'control-label')); ?>

				<?php echo Form::input('city', Input::post('city', isset($cocode) ? $cocode->city : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'City')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Currency', 'currency', array('class'=>'control-label')); ?>

				<?php echo Form::input('currency', Input::post('currency', isset($cocode) ? $cocode->currency : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Currency')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>