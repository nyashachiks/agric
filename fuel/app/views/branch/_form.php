<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Id', 'id', array('class'=>'control-label')); ?>

				<?php echo Form::input('id', Input::post('id', isset($branch) ? $branch->id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Branch code', 'branch_code', array('class'=>'control-label')); ?>

				<?php echo Form::input('branch_code', Input::post('branch_code', isset($branch) ? $branch->branch_code : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Branch code')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Bank name', 'bank_name', array('class'=>'control-label')); ?>

				<?php echo Form::input('bank_name', Input::post('bank_name', isset($branch) ? $branch->bank_name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Bank name')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Bank address', 'bank_address', array('class'=>'control-label')); ?>

				<?php echo Form::input('bank_address', Input::post('bank_address', isset($branch) ? $branch->bank_address : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Bank address')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Bank city', 'bank_city', array('class'=>'control-label')); ?>

				<?php echo Form::input('bank_city', Input::post('bank_city', isset($branch) ? $branch->bank_city : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Bank city')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Branch name', 'branch_name', array('class'=>'control-label')); ?>

				<?php echo Form::input('branch_name', Input::post('branch_name', isset($branch) ? $branch->branch_name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Branch name')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Swift code', 'swift_code', array('class'=>'control-label')); ?>

				<?php echo Form::input('swift_code', Input::post('swift_code', isset($branch) ? $branch->swift_code : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Swift code')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>