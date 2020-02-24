<style>
.hero .hero-content {
	padding-top: 15%;
}

.hero h1 {
	font-size: 40px;
}

.form-horizontal .control-label {
	color: #6a7a82;
	text-align: left;
	height: 20px;
}
.libspicker {
	cursor: pointer;
	background: #c200ff;
    color: #fff;
    border-radius: 15px;
	width: 25%;
	height: 34px;
    float: left
}
#branch_code,#payment_term {
	width: 75%;
    float: left;
}
</style>
<script>
	$(function(){
		$(".datepicker").datepicker(
		{ 
			format: 'yyyy-mm-dd',
			autoclose: true,
			selectMonths: true, // Creates a dropdown to control month
    		selectYears: 15, // Creates a dropdown of 15 years to control year
		
		}
		
		);
		
	});
</script>

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-2">
			<div class="hero-content text-center">
				<h2 class="landing-h1" style="" align="center">Farmer Registration</h2>
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

	<!-- /alerts -->

	<form class="form-horizontal" method="post">
		<div class="row landing-wrapper" style="min-height: 300px; padding: 20px 0 5px 0;">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label col-md-4 col-sm-4 col-xs-12">First name</label>
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
						<label class="control-label col-md-4 col-sm-4 col-xs-12">Last name</label>
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
						<label class="control-label col-md-4 col-sm-4 col-xs-12">Email address </label>
						<div class="col-md-7 col-sm-7 col-xs-12">
							<?php echo Form::input('email', Input::post('email', isset($user) ? $user->email : ''), array('class' => 
												'form-control input-sm2', 'placeholder'=>'')); ?>
						</div>
					</div>
							
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label col-md-4 col-sm-4 col-xs-12">Mobile number </label>
						<div class="col-md-7 col-sm-7 col-xs-12">
							<?php echo Form::input('mobile', Input::post('mobile', isset($user) ? $user->username : ''), 
												array('class'=> 'form-control input-sm2', 'placeholder'=>'With country code. eg. +263717779296')); ?>
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
								 	array('class' => ' form-control input-sm2 btn-block', 'rows' =>2)); ?>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-4 col-xs-12">Gender </label>
								<div class="col-md-7 col-sm-7 col-xs-12">
									<?php 
										echo Form::select('gender', Input::post('gender', isset($user) ? $user->gender : ''),
											Custom_UserUtility::gender(),			
											 array('class' => 'form-control')); 
									 ?>
								</div>
							</div>
							
					  </div>
						
			</div>
					
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label col-md-4 col-sm-4 col-xs-12">Country </label>
						<div class="col-md-7 col-sm-7 col-xs-12">
							<?php echo Form::select('country', Input::post('country', isset($country) ? $country->country : ''), 
								array("Select Country"),array('class' => ' form-control input-sm2', 'id'=>'country' ));?>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label col-md-4 col-sm-4 col-xs-12">National ID Number</label>
						<div class="col-md-7 col-sm-7 col-xs-12">
							<?php echo Form::input('nat_id', Input::post('nat_id', isset($user) ? $user->nat_id : ''), array('class' => 
														'form-control', 'placeholder'=>'XX-XXXXXX-X-XX', 'id'=>'nat_id', 'onkeyup'=>'check()', )); ?>
						</div>
					</div>
				</div>
						
			</div>
					
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label col-md-4 col-sm-4 col-xs-12">Province </label>
						<div class="col-md-7 col-sm-7 col-xs-12">
							<?php echo Form::select('province', Input::post('province', isset($address) ? $address->province : ''),
									array("Select Province"), array('class' => ' form-control input-sm2', 'id'=>'state'));?>
						</div>
					</div>
							
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label col-md-4 col-sm-4 col-xs-12">Date of Birth </label>
						<div class="col-md-7 col-sm-7 col-xs-12">
							<?php echo Form::input('date_of_birth', Input::post('date_of_birth', isset($address) ? $address->date_of_birth : ''), array('class' => 'col-md-4 form-control datepicker',  'id'=>'dob')); ?>
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
							<label class="control-label col-md-4 col-sm-4 col-xs-12">Choose a password </label>
							<div class="col-md-7 col-sm-7 col-xs-12">
								<?php echo Form::input('password', Input::post('password', isset($user) ? $user->password : ''),
											 			array('type' => 'password','class'=> 'form-control input-sm2')); ?>
							</div>
					</div>
					</div>
						
			</div>	
			<div class="row">
				<div class="col-md-6">
					<label class="control-label col-md-4 col-sm-4 col-xs-12">Payment Terms</label>
					<div class="form-group">
						
						<div class="col-md-7 col-sm-7 col-xs-12">
								<?php echo Form::input('payment_term', Input::post('payment_term', isset($user) ? $user->ward : ''), array('id'=>'payment_term','class' => 
							'form-control input-sm2','disabled'=>'disabled', 'style' => 'background: #fff')); ?>
							<?php echo Form::input('payment', Input::post('payment', isset($user) ? $user->branch  : ''),
										 			array('id' => 'payment','type'=>'hidden')); ?>
							<span class="input-group-addon libspicker" onclick="viewPayments()">Pick</span>
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
						<label class="control-label col-md-4 col-sm-4 col-xs-12">Bank Branch Code </label>
						<div class="col-md-7 col-sm-7 col-xs-12">
							<?php echo Form::input('branch_code', Input::post('branch_code', isset($bank) ? $bank->branch  : ''),
										 			array('id' => 'branch_code','class'=> 'form-control input-sm2','disabled'=>'disabled', 'style' => 'background: #fff')); ?>

							<?php echo Form::input('branch', Input::post('branch', isset($bank) ? $bank->branch  : ''),
										 			array('id' => 'branch','type'=>'hidden')); ?>
							<span class="input-group-addon libspicker" onclick="viewBranches()">Pick</span>
						</div>
					</div>
					
				</div>	
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label col-md-4 col-sm-4 col-xs-12">Bank Name</label>
						<div class="col-md-7 col-sm-7 col-xs-12">
								<?php echo Form::input('bank', Input::post('bank', isset($bank) ? $bank->name : ''), array('id' => 'bank', 'class' => 
							'form-control input-sm2','disabled'=>'disabled', 'style' => 'background: #fff')); ?>


							<?php echo Form::input('bank_name', Input::post('bank_name', isset($bank) ? $bank->name : ''), array('id' => 'bank_name', 'type'=>'hidden')); ?>

						</div>
					</div>
					
				</div>
								
			</div>
					
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label col-md-4 col-sm-4 col-xs-12">Bank Account Name</label>
						<div class="col-md-7 col-sm-7 col-xs-12">
							<?php echo Form::input('account_name', Input::post('account_name', isset($bank) ? $bank->account_name  : ''),
										 			array('class'=> 'form-control input-sm2')); ?>
						</div>
					</div>
					
				</div>	
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label col-md-4 col-sm-4 col-xs-12">Bank Account Number</label>
						<div class="col-md-7 col-sm-7 col-xs-12">
								<?php echo Form::input('account_number', Input::post('account_number', isset($bank) ? $bank->account_number : ''), array('class' => 
							'form-control input-sm2', 'placeholder'=>'')); ?>
						</div>
					</div>
					
				</div>
								
			</div>
				
			

			<div class="row form-actions text-center landing-text-center" style="margin-top: 20px;">
					<button type="submit" class="btn btn-primary btn-lg btn-cta btn-sm">Signup</button>
					<a href="<?php echo Uri::create('/'); ?>">
						<button type="button" class="btn btn-fill btn-lg btn-cta btn-sm">Cancel</button>
					</a>
			</div>
		</div>
	</form>
	
</div>
<!-- Modal -->
 <?php echo render('user/_pickBranch'); ?>
 <?php echo render('user/_pickPaymentTerm'); ?>
<?php echo Asset::js('country.js'); ?>
<script>
	populateCountries("country", "state","district");
	populateStates("country", "state","district");

	

</script>
<script>
	
	
	function check()
	{
		var nat_id = document.getElementById('nat_id').value;
		
		if(nat_id.length==2||nat_id.length==9||nat_id.length==11)
		{
			document.getElementById('nat_id').value+='-';
		}
		
	}
	
 		function viewBranches()
 		{
			$('#viewBranches').modal();
		}
		function viewPayments()
 		{
			$('#viewPayments').modal();
		}
		
		
</script>

