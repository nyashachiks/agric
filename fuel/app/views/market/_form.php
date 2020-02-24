	
		<div class="row-fluid">
			<div class="col-md-3">
				<?php echo Form::label('Name', 'name', array('class'=>'control-label')); ?>
			</div>
			<div class="col-md-9">
					<?php echo Form::input('name', Input::post('name', isset($market) ? $market->name : ''), array('class' => ' form-control', 'placeholder'=>'Name')); ?>
			</div>
		</div>
		<div class="col-md-3">
			<?php echo Form::label('Description', 'location', array('class'=>'control-label')); ?>
		</div>
		<div class="col-md-9">
			<?php echo Form::textarea('location', Input::post('location', isset($market) ? $market->location : ''), array('class' => ' form-control', 'rows' => 8, 'placeholder'=>'Description')); ?>

		</div>
		
		
		