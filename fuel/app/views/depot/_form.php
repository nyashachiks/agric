<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Plant', 'plant', array('class'=>'control-label')); ?>

				<?php echo Form::input('plant', Input::post('plant', isset($depot) ? $depot->plant : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Plant')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Short name', 'short_name', array('class'=>'control-label')); ?>

				<?php echo Form::input('short_name', Input::post('short_name', isset($depot) ? $depot->short_name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Short name')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Name', 'name', array('class'=>'control-label')); ?>

				<?php echo Form::input('name', Input::post('name', isset($depot) ? $depot->name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Name')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('City', 'city', array('class'=>'control-label')); ?>

				<?php echo Form::input('city', Input::post('city', isset($depot) ? $depot->city : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'City')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>