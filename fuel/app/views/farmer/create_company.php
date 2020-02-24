<style>
.hero .hero-content {
	padding-top: 15%;
}

.hero h1 {
	font-size: 40px;
}

.control-label {
	color: #fff;
}

</style>

<div class="container">
<div class="row">
	<div class="col-md-10 col-md-offset-2">
		<div class="hero-content text-center">
		<h1 class="landing-h1">Signup for Business</h1>
		</div>
	</div>
</div>

<!-- alerts -->

<style>
	div.alert p {
		padding: 0;
		line-height: 1;
	}
</style>
<div class="row">
<?php if (Session::get_flash('success')): ?>
	<div class="alert alert-success">
		<strong>Success</strong>
		<p>
		<?php echo implode('</p><p>', e((array) Session::get_flash('success'))); ?>
		</p>
	</div>
<?php endif; ?>
<?php if (Session::get_flash('error')): ?>
	<div class="alert alert-danger">
		<strong>Error(s) encountered:</strong>
		<p>
		<?php echo implode('</p><p>', e((array) Session::get_flash('error'))); ?>
		</p>
	</div>
<?php endif; ?>
</div>
<!-- /alerts -->

	<form class="form-horizontal" method="post">
<div class="row landing-wrapper" style="min-height: 300px; padding: 20px 0 5px 0;">

		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
	<label class="control-label col-md-4 col-sm-4 col-xs-12">Company Name</label>
	<div class="col-md-7 col-sm-7 col-xs-12">
	
		<?php echo Form::input('companyName', Input::post('companyName', isset($companyName) ? $companyName : ''), 
							array(	'class'=> 'form-control input-sm2', 'placeholder'=>'')); ?>
	</div>
</div>
			</div>
			
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
	<label class="control-label col-md-4 col-sm-4 col-xs-12">Contact First name</label>
	<div class="col-md-7 col-sm-7 col-xs-12">
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
		<?php echo Form::input('first_name', Input::post('first_name', isset($firstname) ? $firstname : ''), 
							array(	'class'=> 'form-control input-sm2', 'placeholder'=>'')); ?>
	</div>
</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
	<label class="control-label col-md-4 col-sm-4 col-xs-12">Contact Last name</label>
	<div class="col-md-7 col-sm-7 col-xs-12">
		<?php echo Form::input('last_name', Input::post('last_name', isset($lastname) ? $lastname : ''),
					 			array('class'=> 'form-control input-sm2', 'placeholder'=>'')); ?>
	</div>
</div>
				
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
	<label class="control-label col-md-4 col-sm-4 col-xs-12">Contact Mobile number </label>
	<div class="col-md-7 col-sm-7 col-xs-12">
		<?php echo Form::input('mobile', Input::post('mobile', isset($user) ? $user->username : ''), 
							array('class'=> 'form-control input-sm2', 'placeholder'=>'With country code. eg. +263717779296')); ?>
	</div>
</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
	<label class="control-label col-md-4 col-sm-4 col-xs-12">Email address </label>
	<div class="col-md-7 col-sm-7 col-xs-12">
		<?php echo Form::input('email', Input::post('email', isset($user) ? $user->email : ''), array('class' => 
						'form-control input-sm2', 'placeholder'=>'')); ?>
	</div>
</div>
				
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
	<label class="control-label col-md-4 col-sm-4 col-xs-12">Choose a password </label>
	<div class="col-md-7 col-sm-7 col-xs-12">
		<?php echo Form::input('password', Input::post('password', isset($user) ? $user->password : ''),
					 			array('type' => 'password','class'=> 'form-control input-sm2')); ?>
	</div>
</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
	<label class="control-label col-md-4 col-sm-4 col-xs-12">Repeat password </label>
	<div class="col-md-7 col-sm-7 col-xs-12">
		<?php echo Form::input('password2', Input::post('password2', isset($user) ? '' : ''),
					 			array('type' => 'password','class'=> 'form-control input-sm2')); ?>
	</div>
</div>
				
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
	<label class="control-label col-md-4 col-sm-4 col-xs-12">Address </label>
	<div class="col-md-7 col-sm-7 col-xs-12">
		<?php echo Form::textarea('address', Input::post('address', isset($address) ? $address->address : ''),
					 array('class' => ' form-control input-sm2 btn-block', 'rows' =>1)); ?>
	</div>
</div>
			</div>
			<div class="col-md-6">
					<div class="form-group">
	<label class="control-label col-md-4 col-sm-4 col-xs-12">Telephone </label>
	<div class="col-md-7 col-sm-7 col-xs-12">
		<?php echo Form::input('phone', Input::post('phone', isset($address) ? $address->phone : ''), array('class' =>' form-control input-sm2 btn-block')); ?>
	</div>
</div>
				
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
	<label class="control-label col-md-4 col-sm-4 col-xs-12">Country </label>
	<div class="col-md-7 col-sm-7 col-xs-12">
		<?php echo Form::select('country', Input::post('country', isset($country) ?
		 $country->country : ''), 
					@Model_Country::get_select_options('-Select a country -'),array('class' => ' form-control input-sm2', 
					'id'=>'country' ));?>
	</div>
</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
	<label class="control-label col-md-4 col-sm-4 col-xs-12">Province </label>
	<div class="col-md-7 col-sm-7 col-xs-12">
		<?php echo Form::select('province', Input::post('province', isset($province) ? $province->province : ''),
				array("Select Province"), array('class' => ' form-control input-sm2', 'id'=>'state'));?>
	</div>
</div>
				
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
	<label class="control-label col-md-4 col-sm-4 col-xs-12">City or district </label>
	<div class="col-md-7 col-sm-7 col-xs-12">
		<?php echo Form::select('district', Input::post('district', isset($address) ? $address->district : ''), array(
					"Select District"), array('class' => ' form-control input-sm2 btn-block', 'id'=>'district')); ?>
				<?php echo Form::input('district2', Input::post('district2', isset($address) ? $address->district : ''), array('class' =>
					' form-control input-sm2 btn-block', 'placeholder'=>'District', 'style'=>'display:none', 'id'=>'district_2')); ?>
	</div>
</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
	<label class="control-label col-md-4 col-sm-4 col-xs-12"> </label>
	<div class="col-md-7 col-sm-7 col-xs-12">
		
	</div>
</div>
				
			</div>
		</div>
	
</div>

<div class="row form-actions text-center landing-text-center" style="margin-top: 20px;">
	<button type="submit" class="btn btn-primary btn-lg btn-cta">Signup</button>
	<a href="<?php echo Uri::create('/'); ?>">
		<button type="button" class="btn btn-fill btn-lg btn-cta">Cancel</button>
	</a>
</div>
	</form>

</div>
<?php echo render('countrydynamics/loader'); ?>