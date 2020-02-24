<div class="row">
	<div class="col-md-2">
		<?php
			if(isset($user))
			{
				 foreach($user->metadata as $meta)
				  {
				  	//Debug::dump($meta);die;
				  	if($meta->key=='first_name')
				  		$firstname=$meta->value;
				  	if($meta->key=='last_name')
				  		$lastname=$meta->value;
				  	if($meta->key=='structure_id')
				  		$structure=$meta->value;
				  	if($meta->key=='enabled')
				  		$enabled=$meta->value;
				  } 
			}
			?>
			<?php echo Form::label('First Name:', 'first_name', array('class'=>'control-label')); ?>
	</div>
	<div class="col-md-10">	
			<?php echo Form::input('first_name', Input::post('first_name', isset($firstname) ? $firstname : ''), 
							array(	'class'=> 'form-control', 'placeholder'=>'First Name')); ?>
	</div>
</div>

<div class="row">
	<div class="col-md-2">
		<?php echo Form::label('Last Name:', 'last_name', array('class'=>'control-label')); ?>
	</div>
	<div class="col-md-10">	
		<?php echo Form::input('last_name', Input::post('last_name', isset($lastname) ? $lastname : ''),
					 			array('class'=> 'form-control', 'placeholder'=>'Last Name')); ?>
	</div>
</div>

<div class="row">
	<div class="col-md-2">
		<?php echo Form::label('Mobile:', 'mobile', array('class'=>'control-label')); ?>
	</div>
	<div class="col-md-10">
		<?php echo Form::input('mobile', Input::post('mobile', isset($user) ? $user->username : ''), 
							array('class'=> 'form-control', 'placeholder'=>'With country code. eg. +263717779296')); ?>
	</div>
</div>
<div class="row">
	<div class="col-md-2">
		<?php echo Form::label('Email:', 'email', array('class'=>'control-label')); ?>
	</div>
	<div class="col-md-10">	
		<?php echo Form::input('email', Input::post('email', isset($user) ? $user->email : ''), array('class' => 
						'form-control', 'placeholder'=>'Email')); ?>
	</div>
</div>

<div class="row">
	<div class="col-md-2">
		<?php echo Form::label('Choose a password:', 'password', array('class'=>'control-label')); ?>
	</div>
	<div class="col-md-10">	
		<?php echo Form::input('password', Input::post('password', isset($user) ? $user->password : ''),
					 			array('type' => 'password','class'=> 'form-control', 'placeholder'=>'Your password')); ?>
	</div>
</div>
<div class="row">
	<div class="col-md-2">
		<?php echo Form::label('Repeat password:', 'password2', array('class'=>'control-label')); ?>
	</div>
	<div class="col-md-10">	
		<?php echo Form::input('password2', Input::post('password2', isset($user) ? '' : ''),
					 			array('type' => 'password','class'=> 'form-control', 'placeholder'=>'Repeat your password')); ?>
	</div>
</div>
<div class="row">
	<div class="col-md-2">
		<?php echo Form::label('Is Company Contact:', 'companyContact', array('class'=>'control-label')); ?>
	</div>
	<div class="col-md-1">	
		<?php echo Form::checkbox('companyContact',true,false,array("class"=>"form-control")); ?>
	</div>
</div>
<div class="row">
	<div class="col-md-2">
		<?php echo Form::label('Set as Administrator:', 'administrator', array('class'=>'control-label')); ?>
	</div>
	<div class="col-md-1">	
		<?php echo Form::checkbox('administrator',true,false,array("class"=>"form-control")); ?>
	</div>
</div>


