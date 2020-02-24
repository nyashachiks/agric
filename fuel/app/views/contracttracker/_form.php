<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<h2><?php echo $form_label; ?></h2>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<br/>
			<?php echo Form::open(array("class"=>"form-horizontal",'enctype'=> "multipart/form-data" )); ?>		<div class="form-group">
			
			<?php //echo Form::label('Contract id', 'contract_id', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
			<div class="col-md-6 col-sm-6 col-xs-12">
								<?php echo Form::hidden('contract_id', $contactApplicationId);
								//, array('class' => 'col-md-6 col-sm-6 col-xs-12 form-control', 'placeholder'=>'Contract id')); ?>
			</div>
		</div>
		<div class="form-group">
			
			<?php echo Form::label('Date', 'enddate', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
			<div class="col-md-6 col-sm-6 col-xs-12">
								<?php echo Form::input('enddate', Input::post('enddate', 
								isset($contracttracker) ? $contracttracker->enddate : ''),
								 array('class' => 'col-md-6 col-sm-6 col-xs-12 form-control datepicker', 
								 'type'=>'text',
								 'placeholder'=>'Pick a date')); ?>
			</div>
		</div>
		<div class="form-group">
			
			<?php echo Form::label('Notes', 'notes', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
			<div class="col-md-6 col-sm-6 col-xs-12">
								<?php echo Form::textarea('notes', Input::post('notes', isset($contracttracker) ? $contracttracker->notes : ''), array('class' => 'col-md-6 col-sm-6 col-xs-12 form-control', 'rows' => 4, 'placeholder'=>'Notes')); ?>
			</div>
		</div>
		<div class="form-group">
			
			<?php echo Form::label('Picture', 'picture', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
			<div class="col-md-6 col-sm-6 col-xs-12">
								<?php echo Form::file('file', array('required','id'=>'documentFileName', 
				'class' => 'form-control')); ?>
			</div>
		</div>
	<div class="form-group">
			
			<?php echo Form::label('Status', 'status', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
			<div class="col-md-6 col-sm-6 col-xs-12">
								<?php echo Form::select('status', Input::post('status', 
								isset($contracttracker) ? $contracttracker->staus : ''),
								['Work In Progress'=>'Work In Progress','Complete'=>'Complete','Discontinue'=>'Discontinue'],
								 array('class' => 'col-md-6 col-sm-6 col-xs-12 form-control', 
								 	 )); ?>
			</div>
		</div>

<div class="ln_solid"></div>
<div class="form-group">
	<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
		<button type="submit" class="btn btn-md btn-round btn-success"><?php echo $btn_text; ?></button>

		<?php echo Html::anchor('contracttracker', 'Back', array('class' => 'btn btn-md btn-round btn-warning', 'style' => 'text-decoration: none')); ?>		
	</div>
	
</div>
<?php echo Form::close(); ?>			
		</div>
	</div>
</div>

