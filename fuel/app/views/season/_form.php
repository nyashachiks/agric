<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="row">
			<div class="col-md-3">
				<?php echo Form::label('Name', 'name', array('class'=>'control-label')); ?>
			</div>
			<div class="col-md-9">
				<?php echo Form::input('name', Input::post('name', isset($season) ? $season->name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Name')); ?>
			</div>
		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>