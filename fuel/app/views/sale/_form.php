<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Productoffer id', 'productoffer_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('productoffer_id', Input::post('productoffer_id', isset($sale) ? $sale->productoffer_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Productoffer id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Bid id', 'bid_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('bid_id', Input::post('bid_id', isset($sale) ? $sale->bid_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Bid id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Status', 'status', array('class'=>'control-label')); ?>

				<?php echo Form::input('status', Input::post('status', isset($sale) ? $sale->status : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Status')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Amount', 'amount', array('class'=>'control-label')); ?>

				<?php echo Form::input('amount', Input::post('amount', isset($sale) ? $sale->amount : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Amount')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>