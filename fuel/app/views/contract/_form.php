<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="row">
			<div class="col-md-3">
				<?php echo Form::label('Contract Application  id', 'contractapplication_id', array('class'=>'control-label')); ?>
			</div>
			<div class="col-md-7">
				<?php echo Form::input('contractapplication_id', Input::post('contractapplication_id', isset($contract) ? $contract->contractapplication_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Contractapplication id')); ?>
		</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<?php echo Form::label('Contractor id', 'contractor_id', array('class'=>'control-label')); ?>
			</div>
			<div class="col-md-7">
				<?php echo Form::input('contractor_id', Input::post('contractor_id', isset($contract) ? $contract->contractor_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Contractor id')); ?>
		</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<?php echo Form::label('Loan amount', 'loan_amount', array('class'=>'control-label')); ?>
			</div>
			<div class="col-md-7">
				<?php echo Form::input('loan_amount', Input::post('loan_amount', isset($contract) ? $contract->loan_amount : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Loan amount')); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<?php echo Form::label('Balance brought forward', 'balance_brought_forward', array('class'=>'control-label')); ?>
			</div>
			<div class="col-md-7">
				<?php echo Form::input('balance_brought_forward', Input::post('balance_brought_forward', isset($contract) ? $contract->balance_brought_forward : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Balance brought forward')); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<?php echo Form::label('Amount paid', 'amount_paid', array('class'=>'control-label')); ?>
			</div>
			<div class="col-md-7">
				<?php echo Form::input('amount_paid', Input::post('amount_paid', isset($contract) ? $contract->amount_paid : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Amount paid')); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<?php echo Form::label('Balance carried forward', 'balance_carried_forward', array('class'=>'control-label')); ?>
			</div>
			<div class="col-md-7">
				<?php echo Form::input('balance_carried_forward', Input::post('balance_carried_forward', isset($contract) ? $contract->balance_carried_forward : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Balance carried forward')); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<?php echo Form::label('Date paid', 'date_paid', array('class'=>'control-label')); ?>
			</div>
			<div class="col-md-7">
				<?php echo Form::input('date_paid', Input::post('date_paid', isset($contract) ? $contract->date_paid : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Date paid')); ?>
		</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<?php echo Form::label('Status', 'status', array('class'=>'control-label')); ?>
			</div>
			<div class="col-md-7">
				<?php echo Form::input('status', Input::post('status', isset($contract) ? $contract->status : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Status')); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<?php echo Form::label('Comment', 'comment', array('class'=>'control-label')); ?>
			</div>
			<div class="col-md-7">
				<?php echo Form::textarea('comment', Input::post('comment', isset($contract) ? $contract->comment : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Comment')); ?>
			</div>
		</div>

		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>