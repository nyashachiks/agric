<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="row">
			<div class="col-md-3">
				<?php echo Form::label('Farm id', 'farm_id', array('class'=>'control-label')); ?>
			</div>
			<div class="col-md-7">
				<?php echo Form::input('farm_id', Input::post('farm_id', isset($seasonfarming) ? $seasonfarming->farm_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Farm id')); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<?php echo Form::label('Year', 'year', array('class'=>'control-label')); ?>
		</div>
			<div class="col-md-7">
				<?php echo Form::input('year', Input::post('year', isset($seasonfarming) ? $seasonfarming->year : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Year')); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<?php echo Form::label('Product id', 'product_id', array('class'=>'control-label')); ?>
			</div>
			<div class="col-md-7">
				<?php echo Form::input('product_id', Input::post('product_id', isset($seasonfarming) ? $seasonfarming->product_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Product id')); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<?php echo Form::label('Season id', 'season_id', array('class'=>'control-label')); ?>
			</div>
			<div class="col-md-7">
				<?php echo Form::input('season_id', Input::post('season_id', isset($seasonfarming) ? $seasonfarming->season_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Season id')); ?>
			</div>
		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		
		</div>
	</fieldset>
<?php echo Form::close(); ?>