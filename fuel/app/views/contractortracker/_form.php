<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<h2><?php echo $form_label; ?></h2>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<br/>
			<?php echo Form::open(array("class"=>"form-horizontal")); ?>		<div class="form-group">
			
			<?php echo Form::label('Contracttracker id', 'contracttracker_id', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
			<div class="col-md-6 col-sm-6 col-xs-12">
								<?php echo Form::input('contracttracker_id', Input::post('contracttracker_id', isset($contractortracker) ? $contractortracker->contracttracker_id : ''), array('class' => 'col-md-6 col-sm-6 col-xs-12 form-control', 'placeholder'=>'Contracttracker id')); ?>
			</div>
		</div>
		<div class="form-group">
			
			<?php echo Form::label('Notes', 'notes', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
			<div class="col-md-6 col-sm-6 col-xs-12">
								<?php echo Form::textarea('notes', Input::post('notes', isset($contractortracker) ? $contractortracker->notes : ''), array('class' => 'col-md-6 col-sm-6 col-xs-12 form-control', 'rows' => 4, 'placeholder'=>'Notes')); ?>
			</div>
		</div>
		<div class="form-group">
			
			<?php echo Form::label('Date', 'date', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
			<div class="col-md-6 col-sm-6 col-xs-12">
								<?php echo Form::input('date', Input::post('date', isset($contractortracker) ? $contractortracker->date : ''), array('class' => 'col-md-6 col-sm-6 col-xs-12 form-control', 'placeholder'=>'Date')); ?>
			</div>
		</div>
		<div class="form-group">
			
			<?php echo Form::label('Status', 'status', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
			<div class="col-md-6 col-sm-6 col-xs-12">
								<?php echo Form::input('status', Input::post('status', isset($contractortracker) ? $contractortracker->status : ''), array('class' => 'col-md-6 col-sm-6 col-xs-12 form-control', 'placeholder'=>'Status')); ?>
			</div>
		</div>

<div class="ln_solid"></div>
<div class="form-group">
	<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
		<button type="submit" class="btn btn-md btn-round btn-success"><?php echo $btn_text; ?></button>

		<?php echo Html::anchor('contractortracker', 'Back', array('class' => 'btn btn-md btn-round btn-warning', 'style' => 'text-decoration: none')); ?>		
	</div>
	
</div>
<?php echo Form::close(); ?>			
		</div>
	</div>
</div>






