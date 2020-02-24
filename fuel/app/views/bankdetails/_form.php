<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<h2><?php echo $form_label; ?></h2>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<br/>
			<?php echo Form::open(array("class"=>"form-horizontal")); ?>		<div class="form-group">
			
			<?php echo Form::label('Farmer id', 'farmer_id', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
			<div class="col-md-6 col-sm-6 col-xs-12">
								<?php echo Form::input('farmer_id', Input::post('farmer_id', isset($bankdetail) ? $bankdetail->farmer_id : ''), array('class' => 'col-md-6 col-sm-6 col-xs-12 form-control', 'placeholder'=>'Farmer id')); ?>
			</div>
		</div>
		<div class="form-group">
			
			<?php echo Form::label('Bank name', 'bank_name', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
			<div class="col-md-6 col-sm-6 col-xs-12">
								<?php echo Form::input('bank_name', Input::post('bank_name', isset($bankdetail) ? $bankdetail->bank_name : ''), array('class' => 'col-md-6 col-sm-6 col-xs-12 form-control', 'placeholder'=>'Bank name')); ?>
			</div>
		</div>
		<div class="form-group">
			
			<?php echo Form::label('Branch name', 'branch_name', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
			<div class="col-md-6 col-sm-6 col-xs-12">
								<?php echo Form::input('branch_name', Input::post('branch_name', isset($bankdetail) ? $bankdetail->branch_name : ''), array('class' => 'col-md-6 col-sm-6 col-xs-12 form-control', 'placeholder'=>'Branch name')); ?>
			</div>
		</div>
		<div class="form-group">
			
			<?php echo Form::label('Account number', 'account_number', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
			<div class="col-md-6 col-sm-6 col-xs-12">
								<?php echo Form::input('account_number', Input::post('account_number', isset($bankdetail) ? $bankdetail->account_number : ''), array('class' => 'col-md-6 col-sm-6 col-xs-12 form-control', 'placeholder'=>'Account number')); ?>
			</div>
		</div>
		<div class="form-group">
			
			<?php echo Form::label('Account name', 'account_name', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')); ?>
			<div class="col-md-6 col-sm-6 col-xs-12">
								<?php echo Form::input('account_name', Input::post('account_name', isset($bankdetail) ? $bankdetail->account_name : ''), array('class' => 'col-md-6 col-sm-6 col-xs-12 form-control', 'placeholder'=>'Account name')); ?>
			</div>
		</div>

<div class="ln_solid"></div>
<div class="form-group">
	<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
		<button type="submit" class="btn btn-md btn-round btn-success"><?php echo $btn_text; ?></button>

		<?php echo Html::anchor('bankdetails', 'Back', array('class' => 'btn btn-md btn-round btn-warning', 'style' => 'text-decoration: none')); ?>		
	</div>
	
</div>
<?php echo Form::close(); ?>			
		</div>
	</div>
</div>






