<style>

label.control-label{
	color: white;
}

</style>



<!--<div class="panel panel-default">
<div class="panel-body col-md-8">-->



<form method="post" class="form-horizontal">
<div class="row">
	<div class="col-md-2">
		
			<?php echo Form::label('Company Name:', 'companyName', array('class'=>'control-label')); ?>
	</div>
	<div class="col-md-10">	
			<?php echo Form::input('companyName', Input::post('CompanyName', isset($companyName) ? $companyName : ''), 
							array(	'class'=> 'form-control', 'placeholder'=>'Company Name')); ?>
	</div>
</div>
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
			<?php echo Form::label('Contact First Name:', 'first_name', array('class'=>'control-label')); ?>
	</div>
	<div class="col-md-10">	
			<?php echo Form::input('first_name', Input::post('first_name', isset($firstname) ? $firstname : ''), 
							array(	'class'=> 'form-control', 'placeholder'=>'First Name')); ?>
	</div>
</div>

<div class="row">
	<div class="col-md-2">
		<?php echo Form::label('Contact Last Name:', 'last_name', array('class'=>'control-label')); ?>
	</div>
	<div class="col-md-10">	
		<?php echo Form::input('last_name', Input::post('last_name', isset($lastname) ? $lastname : ''),
					 			array('class'=> 'form-control', 'placeholder'=>'Last Name')); ?>
	</div>
</div>

<div class="row">
	<div class="col-md-2">
		<?php echo Form::label('Contact Mobile:', 'mobile', array('class'=>'control-label')); ?>
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




<?php //echo render('address/_form'); ?>
		<div class="row">
			<div class="col-md-2">	
				<?php echo Form::label('Address:', 'address', array('class'=>'control-label')); ?>
			</div>
			<div class="col-md-10">	
					<?php echo Form::textarea('address', Input::post('address', isset($address) ? $address->address : ''),
					 array('class' => ' form-control btn-block', 'rows' =>3, 'placeholder'=>'House Number and Street name')); ?>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-2">	
				<?php echo Form::label('Tel:', 'phone', array('class'=>'control-label')); ?>
			</div>
			<div class="col-md-10">
				<?php echo Form::input('phone', Input::post('phone', isset($address) ? $address->phone : ''), array('class' =>' form-control btn-block','placeholder'=>'Phone')); ?>
			</div>
		</div>
		
		<?php  //if(isset($country)): ?>
		<?php  if(true): ?>
		
		<div class="row">
			<div class="col-md-2">	
				<?php echo Form::label('Country:', 'country', array('class'=>'control-label')); ?>
			</div>
			<div class="col-md-10">
				<?php echo Form::select('country', Input::post('country', isset($country) ? $country->country : ''), 
					array("Select Country"),array('class' => ' form-control btn-block', 'id'=>'country' ));?>
				
			</div>	
		</div>
		<div class="row">
			<div class="col-md-2">	
				<?php echo Form::label('Province:', 'province', array('class'=>'control-label')); ?>
			</div>
			<div class="col-md-10">
				<?php echo Form::select('province', Input::post('province', isset($province) ? $province->province : ''),
				array("Select Province"), array('class' => ' form-control btn-block', 'id'=>'state'));?>
			</div>
			
		</div>
		
		<?php endif; ?>
			
			<?php //echo (isset($country)?render('country/_form' ,array('country'=>$country)): render('country/_form'));
		?>
		
		<div class="row">
			<div class="col-md-2">	
				<?php echo Form::label('City or District:', 'district', array('class'=>'control-label')); ?>
			</div>
			<div class="col-md-10">
				<?php echo Form::select('district', Input::post('district', isset($address) ? $address->district : ''), array(
					"Select District"), array('class' => ' form-control btn-block', 'id'=>'district')); ?>
				<?php echo Form::input('district2', Input::post('district2', isset($address) ? $address->district : ''), array('class' =>
					' form-control btn-block', 'placeholder'=>'District', 'style'=>'display:none', 'id'=>'district_2')); ?>
			</div>
		</div>
	<?php if(!isset($country)){?>
			<script language="javascript">
				populateCountries("country", "state","district");
			</script>
		<?php };?>


<div class="row" style="margin-top: 20px">
<div class="col-md-10 col-md-offset-2">
	 <button type="submit" class="btn btn-md btn-primary" >Register</button>
	 <a href="<?php echo Uri::base();?>" style="text-decoration: none; " >
			 <button type="button" class="btn btn-md btn-warning" >Back</button>
	 </a>
</div>
	 </div>
</form>