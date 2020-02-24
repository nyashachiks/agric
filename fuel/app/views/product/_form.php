<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Name', 'name', array('class'=>'control-label')); ?>

				<?php echo Form::input('name', Input::post('name', isset($product) ? $product->name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Name')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Measurement id', 'measurement_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('measurement_id', Input::post('measurement_id', isset($product) ? $product->measurement_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Measurement id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Producttype id', 'producttype_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('producttype_id', Input::post('producttype_id', isset($product) ? $product->producttype_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Producttype id')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>