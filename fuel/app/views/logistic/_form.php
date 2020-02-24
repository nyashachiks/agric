<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="row">
			<div class="col-md-4">
				<?php echo Form::label('Equipment Name', 'equipmentname', array('class'=>'control-label')); ?>
			</div>
			<div class="col-md-8">
				<?php echo Form::input('equipmentname', Input::post('equipmentname', isset($logistic) ? $logistic->equipmentname : ''), 
					array('id'=>'equip_name','class' => 'btn-block form-control', 'placeholder'=>'Equipment Name')); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<?php echo Form::label('Capacity', 'capacity', array('class'=>'control-label')); ?>
			</div>
			<div class="col-md-8">
				<?php echo Form::input('capacity', Input::post('capacity', isset($logistic) ? $logistic->capacity : ''), 
					array('id'=>'equip_capacity','class' => 'btn-block form-control', 'placeholder'=>'Capacity')); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<?php echo Form::label('Rate Per Hour', 'rateperhour', array('class'=>'control-label')); ?>
			</div>
			<div class="col-md-8">
				<?php echo Form::input('rateperhour', Input::post('rateperhour', isset($logistic) ? $logistic->rateperhour : ''), 
					array('id'=>'equip_rate','class' => 'btn-block form-control', 'placeholder'=>'e.g 0.50 for 50 cents or 2.30 for $2.30')); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<?php echo Form::label('Description', 'description', array('class'=>'control-label')); ?>
			</div>
			<div class="col-md-8">
			
			<?php echo Form::textarea('description',Input::post('description', isset($logistic) ? $logistic->description : ''),array('id'=>'equip_description','class' => 'btn-block form-control', 'placeholder'=>'Description','rows' => 4)); ?>
				<?php //echo Form::input('description', Input::post('description', isset($logistic) ? $logistic->description : ''), array('id'=>'equip_description','class' => 'btn-block form-control', 'placeholder'=>'Description')); ?>
			</div>
		</div>
		
		<?php 
				list(, $userid) = Auth::get_user_id();
				echo Form::hidden('supplier_id', Input::post('supplier_id', $userid),array('id'=>'equip_supplier_id'));
		?>
		
		
		
	</fieldset>
<?php echo Form::close(); ?>