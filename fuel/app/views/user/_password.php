<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Current password </label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<?php echo Form::password('current', 
					'', array(	'class'=> 'form-control', 'placeholder'=>'')); ?>
	</div>
</div>

<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">New password </label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<?php echo Form::password('new', 
					'', 
							array(	'class'=> 'form-control', 'placeholder'=>'')); ?>
	</div>
</div>

<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Confirm new password </label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<?php echo Form::password('confirm',
					 '',
					 			array('class'=> 'form-control', 'placeholder'=>'')); ?>
	</div>
</div>

<div clas="ln_solid"></div>

<div class="form-group">
	<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
		<button class="btn btn-md btn-success btn-round" type="submit">Save</button>
	</div>
</div>