<?php echo Form::open(array("class"=>"form-horizontal")); ?>

		<div class="form-group">
			<?php echo Form::label('Name', 'name', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
			<div class="col-md-4 col-sm-6 col-xs-12">
				<?php echo Form::input('name', Input::post('name', isset($grain) ? $grain->name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'')); ?>
			</div>
		</div>
		<div class="form-group">
			<?php echo Form::label('Description', 'description', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<?php echo Form::textarea('description', Input::post('description', isset($grain) ? $grain->description : ''), array('class' => 'col-md-8 form-control', 'rows' => 4, 'placeholder'=>'')); ?>
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-6 col-md-offset-3 col-sm-6 col-xs-12">
			<?php echo Form::submit('submit', $btn_label, array('class' => 'btn btn-primary')); ?>	
			<?php echo Html::anchor('grains', 'Back', array('class' => 'btn btn-warning')); ?>			
			</div>
			
		</div>
<?php echo Form::close(); ?>