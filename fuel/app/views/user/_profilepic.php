<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Select Picture </label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<?php echo Form::file('file', array('required','id'=>'documentFileName', 
				'class' => 'form-control')); ?>
	</div>
</div>





<div clas="ln_solid"></div>

<div class="form-group">
	<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
		<button class="btn btn-md btn-success btn-round" type="submit">Upload</button>
	</div>
</div>