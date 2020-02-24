<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
		<div class="col-md-2">
		<?php //echo Form::hidden('groupid',$groupid);?>
			<?php echo Form::label('Post', 'name', array('class'=>'control-label')); ?>
			</div>
			<div class="col-md-6">
				<?php echo Form::input('name', Input::post('name', isset($structure) ? $structure->name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Name')); ?>
				</div>

		</div>
	
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>