<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
	<?php echo Form::hidden('mainmenu',$mainmenu_id);?>
		<div class="row-fluid">
			<div class="col-md-3">
				<?php echo Form::label('Name', 'name', array('class'=>'control-label')); ?>
			</div>
			<div class="col-md-9">
				<?php echo Form::input('name', Input::post('name', isset($dropdown) ? $dropdown->name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Name')); ?>
			</div>
		</div>
		<div class="row-fluid">
			<div class="col-md-3">
				<?php echo Form::label('Url', 'url', array('class'=>'control-label')); ?>
			</div>
			<div class="col-md-9">
				<?php echo Form::textarea('url', Input::post('url', isset($dropdown) ? $dropdown->url : ''), array('class' => 'col-md-8 form-control', 'rows' => 2, 'placeholder'=>'Url')); ?>
			</div>
		</div>
		<div class="row-fluid">
			<div class="col-md-3">
				<?php echo Form::label('Visible', 'visible', array('class'=>'control-label')); ?>
			</div>
			<div class="col-md-9">
				<?php echo Form::select('visible', Input::post('position', isset($mainmenu) ? $mainmenu->visible : 1), 
				array(0=>'False',1=>'True'),
				array('class' => 'col-md-4 form-control', 'placeholder'=>'Position')); ?>
			</div>
		</div>
		<div class="row-fluid">
			
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		
		</div>
	</fieldset>
<?php echo Form::close(); ?>