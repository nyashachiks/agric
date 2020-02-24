<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<h2><?php echo $form_label; ?></h2>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<br/>
			<?php echo Form::open(array("class"=>"form-horizontal")); ?>		
			<div class="form-group">
			
		
			<div class="col-md-6 col-sm-6 col-xs-12">
								<?php echo Form::hidden('contract_id', 
								$contactApplicationId);
								 ?>
			</div>
		</div>
		<div class="form-group">
			
			<?php echo Form::label('Startdate', 'startdate', 
			array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
			<div class="col-md-6 col-sm-6 col-xs-12">
								<?php echo Form::input('startdate', Input::post('startdate', isset($contractstart) ? 
								$contractstart->startdate : ''), 
								array('class' => 'col-md-6 col-sm-6 col-xs-12 form-control datepicker',
								'type'=>"text",
								 'placeholder'=>'Pick a start date')); ?>
			</div>
		</div>

<div class="ln_solid"></div>
<div class="form-group">
	<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
		<button type="submit" class="btn btn-md btn-round btn-success"><?php echo $btn_text; ?></button>

		<?php echo Html::anchor('contractstart', 'Back', array('class' => 'btn btn-md btn-round btn-warning', 'style' => 'text-decoration: none')); ?>		
	</div>
	
</div>
<?php echo Form::close(); ?>			
		</div>
	</div>
</div>






