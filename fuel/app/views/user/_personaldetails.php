




<div class="row">
		
			<div class="col-md-2">
				<?php echo Form::label('First Name:', 'first_name', array('class'=>'control-label')); ?>
				</div>
				<div class="col-md-10">	
					<?php echo Form::input('first_name', 
					Input::post('first_name', isset($user) ? $user->first_name : ''), 
							array(	'class'=> 'form-control', 'placeholder'=>'First Name')); ?>
				</div>
		</div>
		
		<div class="row">
			<div class="col-md-2">
					<?php echo Form::label('Last Name:', 'last_name', array('class'=>'control-label')); ?>
				</div>
				<div class="col-md-10">
					<?php echo Form::input('last_name',
					 Input::post('last_name', isset($user) ? $user->last_name : ''),
					 			array('class'=> 'form-control', 'placeholder'=>'Last Name')); ?>
				</div>
		</div>
		
	
				<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-2">
					<?php echo Form::label('Email:', 'email', array('class'=>'control-label')); ?>
				</div>
				<div class="col-md-10">
					<?php echo Form::input('email', Input::post('email', isset($user) ? $user->email : ''), array('class' => 
						'form-control', 'placeholder'=>'Email')); ?>
				</div>
		</div>