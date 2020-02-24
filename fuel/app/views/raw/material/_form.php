<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<h2><?php echo $form_label; ?></h2>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<br/>
			<?php echo Form::open(array("class"=>"form-horizontal")); ?>		<div class="form-group">
			
			<?php echo Form::label('Name', 'name', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
			<div class="col-md-6 col-sm-6 col-xs-12">
								<?php echo Form::input('name', Input::post('name', isset($raw_material) ? $raw_material->name : ''), array('class' => 'col-md-6 col-sm-6 col-xs-12 form-control', 'placeholder'=>'Name')); ?>
			</div>
		</div>
		<div class="form-group">
			
			<?php echo Form::label('Description', 'description', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
			<div class="col-md-6 col-sm-6 col-xs-12">
								<?php echo Form::textarea('description', Input::post('description', isset($raw_material) ? $raw_material->description : ''), array('class' => 'col-md-6 col-sm-6 col-xs-12 form-control', 'rows' => 4, 'placeholder'=>'Description')); ?>
			</div>
		</div>
		<div class="form-group">
			
			<?php echo Form::label('Measurement id', 'measurement_id', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
			<div class="col-md-6 col-sm-6 col-xs-12">
								<?php echo Form::input('measurement_id', Input::post('measurement_id', isset($raw_material) ? $raw_material->measurement_id : ''), array('class' => 'col-md-6 col-sm-6 col-xs-12 form-control', 'placeholder'=>'Measurement id')); ?>
			</div>
		</div>

<div class="ln_solid"></div>
<div class="form-group">
	<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
		<button type="submit" class="btn btn-md btn-round btn-success"><?php echo $btn_text; ?></button>

		<?php echo Html::anchor('raw/material', 'Back', array('class' => 'btn btn-md btn-round btn-warning', 'style' => 'text-decoration: none')); ?>		
	</div>
	
</div>
<?php echo Form::close(); ?>			
		</div>
	</div>
</div>






