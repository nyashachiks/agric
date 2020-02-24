<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
	<div class="x_title">
	<h2><?php echo $form_label; ?></h2>	
		<div class="clearfix"></div>
	</div>
	
	<div class="x_content">
		<br/>
		<form class="form-horizontal" method="post">
			<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Name</label>
	<div class="col-md-7 col-sm-7 col-xs-12">
		<?php echo Form::input('name', Input::post('name', isset($mainmenu) ? $mainmenu->name : ''), array('class' => 'form-control')); ?>
	</div>
</div>

<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Icon class</label>
	<div class="col-md-7 col-sm-7 col-xs-12">
		<?php echo Form::input('icon', Input::post('icon', isset($mainmenu) ? $mainmenu->icon : ''), array('class' => 'form-control', 'placeholder'=>'fontawesome class eg fa-lock')); ?>
	</div>
</div>	

	<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">URL</label>
	<div class="col-md-7 col-sm-7 col-xs-12">
		<?php echo Form::input('url', Input::post('url', isset($mainmenu) ? $mainmenu->url : ''), array('class' => 'form-control')); ?>
	</div>
</div>

<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Visible?</label>
	<div class="col-md-7 col-sm-7 col-xs-12">
		<?php echo Form::select('visible', Input::post('position', isset($mainmenu) ? $mainmenu->visible : 1), 
				array(0=>'False',1=>'True'),
				array('class' => 'form-control')); ?>
	</div>
</div>

<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Alignment</label>
	<div class="col-md-7 col-sm-7 col-xs-12">
		<?php echo Form::select('aligned', Input::post('aligned', isset($mainmenu) ? $mainmenu->aligned : ''),
				array('Left'=>'Left','Right'=>'Right'),
				 array('class' => 'form-control')); ?>
	</div>
</div>

<div class="ln_solid"></div>
<div class="form-group">
	<div class="col-md-7 col-sm-7 col-xs-12 col-md-offset-3">
		
		<button type="submit" class="btn btn-success btn-md btn-round"><?php echo $btn_label; ?></button>
		<a href="<?php echo Uri::create('mainmenu'); ?>" style="text-decoration: none">
			<button type="button" class="btn btn-warning btn-md btn-round">Cancel</button>
		</a>
		
	</div>
</div>
		</form>
	</div>
</div>

</div>
