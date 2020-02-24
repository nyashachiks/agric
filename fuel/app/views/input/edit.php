<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="row-fluid">
			<div class="col-md-3">
				<?php echo Form::label('Name', 'name', array('class'=>'control-label')); ?>
			</div>
			<div class="col-md-9">
				<?php echo Form::input('name', Input::post('name', isset($input) ? $input->name : ''), 
				array('id'=>'einname','class' => 'col-md-4 form-control', 'placeholder'=>'Name')); ?>
			</div>
		</div>
		
			<?php 
			
			
			echo Form::hidden('activity_id', Input::post('activity_id', isset($input) ? $input->activity_id : ''),
			array('id'=>'einactivityid')	);
			echo Form::hidden('id', Input::post('id', isset($input) ? $input->id : ''),
			array('id'=>'einid')	);
			?>
		<div class="row-fluid">
			<div class="col-md-3">
				<?php echo Form::label('Units', 'unit', array('class'=>'control-label')); ?>
			</div>
			<div class="col-md-9">
				<select class="form-control" id="einunits" name="einunits">
					<option value="-1">Select Unit</option>
					<option value="Square Kilometer">Square Kilometer</option>
					<option value="Acre">Acre</option>
					<option value="Hectare">Hectare</option>
				</select>
			</div>
		</div>
		<div class="row-fluid">
			<div class="col-md-3">
				<?php echo Form::label('Cost per unit', 'cost_per_unit', array('class'=>'control-label')); ?>
			</div>
			<div class="col-md-9">
				<?php echo Form::input('cost_per_unit', Input::post('cost_per_unit', 
				isset($input) ? $input->cost_per_unit : ''), 
				array('id'=>'eincostperunit','class' => 'col-md-4 form-control', 'placeholder'=>'Cost per unit','onKeyUp'=>'cal()')); ?>
			</div>
		</div>
		<div class="row-fluid">
			<div class="col-md-3">
				<?php echo Form::label('Quantity', 'quantity', array('class'=>'control-label')); ?>
			</div>
			<div class="col-md-9">
				<?php echo Form::input('quantity', Input::post('quantity', isset($input) ? $input->quantity : ''), 
				array('id'=>'einquantity','class' => 'col-md-4 form-control', 'placeholder'=>'Quantity', 'onKeyUp'=>'cal()')); ?>
			</div>
		</div>
		<div class="row-fluid">
			<div class="col-md-3">
				<?php echo Form::label('Total cost', 'total_cost', array('class'=>'control-label')); ?>
			</div>
			<div class="col-md-9">
				<?php echo Form::input('total_cost', Input::post('total_cost', isset($input) ? $input->total_cost : ''),
				 array('id'=>'eintotalcost','class' => 'col-md-4 form-control', 'placeholder'=>'Total cost', 'readOnly'=>'true')); ?>
			</div>
		</div>
		
	</fieldset>
<?php echo Form::close(); ?>