<?php //echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
		<div class="col-md-2">
			<?php echo Form::label('Name', 'name', array('class'=>'control-label')); ?>
	</div>
	<div class="col-md-9">
				<?php echo Form::input('name', Input::post('name', isset($structure) ? $structure->name : ''),
				 array('class' => 'col-md-4 form-control', 'placeholder'=>'Name')); ?>
			</div>
		</div>
	<div class="form-group">
		<div class="col-md-2">
			<?php echo Form::label('Description', 'description', array('class'=>'control-label')); ?>
	</div>
	<div class="col-md-9">
				<?php echo Form::textarea('description', Input::post('name', isset($structure) ? $structure->name : ''),
				 array('class' => 'col-md-4 form-control', 'placeholder'=>'Description')); ?>
			</div>
		</div>
		
	</fieldset>
<?php //echo Form::close(); ?>