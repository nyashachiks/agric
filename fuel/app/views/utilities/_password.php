<div class="row-fluid">
			<div class="col-md-3">
					<?php echo Form::label('Password:', 'password', array('class'=>'control-label')); ?>
				</div>
				<div class="col-md-9">	
					<?php echo Form::password('password', '',array('class'=> 'form-control', 'placeholder'=>'Password')); ?>
				</div>
		</div>
		<div class="row-fluid">
			<div class="col-md-3">
					<?php echo Form::label('Confirm Password:', 'confirm', array('class'=>'control-label')); ?>
				</div>
				<div class="col-md-9">	
					<?php echo Form::password('confirm', '',array('class'=> 'form-control', 'placeholder'=>'Password Confirm')); ?>
				</div>
	</div>