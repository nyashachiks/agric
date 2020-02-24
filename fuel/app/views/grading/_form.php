<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Inspection lot', 'inspection_lot', array('class'=>'control-label')); ?>

				<?php echo Form::input('inspection_lot', Input::post('inspection_lot', isset($grading) ? $grading->inspection_lot : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Inspection lot')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Material id', 'material_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('material_id', Input::post('material_id', isset($grading) ? $grading->material_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Material id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Quality score', 'quality_score', array('class'=>'control-label')); ?>

				<?php echo Form::input('quality_score', Input::post('quality_score', isset($grading) ? $grading->quality_score : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Quality score')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Valuation code', 'valuation_code', array('class'=>'control-label')); ?>

				<?php echo Form::input('valuation_code', Input::post('valuation_code', isset($grading) ? $grading->valuation_code : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Valuation code')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Date', 'date', array('class'=>'control-label')); ?>

				<?php echo Form::input('date', Input::post('date', isset($grading) ? $grading->date : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Date')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Plant', 'plant', array('class'=>'control-label')); ?>

				<?php echo Form::input('plant', Input::post('plant', isset($grading) ? $grading->plant : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Plant')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Quantity', 'quantity', array('class'=>'control-label')); ?>

				<?php echo Form::input('quantity', Input::post('quantity', isset($grading) ? $grading->quantity : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Quantity')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Vendor number', 'vendor_number', array('class'=>'control-label')); ?>

				<?php echo Form::input('vendor_number', Input::post('vendor_number', isset($grading) ? $grading->vendor_number : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Vendor number')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>