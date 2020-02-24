<fieldset>
	<div id="onetopic"	style="text-align: left;">
		<div id="empty" class="alert alert-danger" style="display:none">
			<strong>Error</strong>
			<p id="p2">
				
			</p>
		</div>
	</div>
	<div class="row-fluid">
			<div class="col-md-4">
				<?php echo Form::label('Equipment Name', 'equipmentname', array('class'=>'control-label')); ?>
			</div>
			<div class="col-md-8">
				<?php echo Form::input('equipmentname', Input::post('equipmentname', isset($logistic) ? $logistic->equipmentname : ''), 
					array('id'=>'edit_equip_name','class' => 'col-md-4 form-control', 'placeholder'=>'Equipment Name')); ?>
			</div>
		</div>
		<div class="row-fluid">
			<div class="col-md-4">
				<?php echo Form::label('Capacity', 'capacity', array('class'=>'control-label')); ?>
			</div>
			<div class="col-md-8">
				<?php echo Form::input('capacity', Input::post('capacity', isset($logistic) ? $logistic->capacity : ''), 
					array('id'=>'edit_equip_capacity','class' => 'col-md-4 form-control', 'placeholder'=>'Capacity')); ?>
			</div>
		</div>
		<div class="row-fluid">
			<div class="col-md-4">
				<?php echo Form::label('Rate Per Hour', 'rateperhour', array('class'=>'control-label')); ?>
			</div>
			<div class="col-md-8">
				<?php echo Form::input('rateperhour', Input::post('rateperhour', isset($logistic) ? $logistic->rateperhour : ''), 
					array('id'=>'edit_equip_rate','class' => 'col-md-4 form-control', 'placeholder'=>'e.g 0.50 for 50 cents or 2.30 for $2.30')); ?>
			</div>
		</div>
		<div class="row-fluid">
			<div class="col-md-4">
				<?php echo Form::label('Description', 'description', array('class'=>'control-label')); ?>
			</div>
			<div class="col-md-8">
				<?php echo Form::input('description', Input::post('description', isset($logistic) ? $logistic->description : ''), 
					array('id'=>'edit_equip_description','class' => 'col-md-4 form-control', 'placeholder'=>'Description')); ?>
			</div>
		</div>
		
		<?php 
				echo Form::hidden('id', '', array('id' => 'edit_equip_id'));
				echo Form::hidden('supplier_id', '',array('id'=>'_edit_equip_supplier_id'));
		?>	
</fieldset>