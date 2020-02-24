<?php echo Form::open(array("class"=>"form-horizontal",'enctype' => 'multipart/form-data')); ?>

	<fieldset>

		<div class="form-group">
			<?php echo Form::label('Actual name', 'actual_name', array('class'=>'control-label')); ?>

				<?php echo Form::file('file', array('required','id'=>'documentFileName', 
				'class' => 'form-control')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-success')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>