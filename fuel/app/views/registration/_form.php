
<?php 	$user=Auth\Model\Auth_User::find($user_identity);
				$firstname='';
			  	$lastname='';
			  	
			  	//getting metadata
				  foreach($user->metadata as $meta)
				  {
				  	//Debug::dump($meta);die;
				  	if($meta->key=='first_name')
				  		$firstname=$meta->value;
				  	if($meta->key=='last_name')
				  		$lastname=$meta->value;
				  	
				  } 
				 $narrative='AMA Registration fee for '.$firstname.' '.$lastname
					.'. The mobile number the payment information will be sent to is '.$user->username.'';
				
					
					echo Form::hidden('user_id', Input::post('user_id', $user_identity), array('id'=>'fuser_id')); 
					echo Form::hidden('amount', Input::post('amount', '20'), array('id'=>'famount')); 
					echo Form::hidden('narrative', Input::post('narrative', $narrative), array('id'=>'fnarrative')); 
					echo Form::hidden('status', Input::post('status', 'pending'), array('id'=>'fstatus')); 
					echo Form::hidden('browseurl', Input::post('browseurl', 'browsurl'), array('id'=>'fbrowseurl')); 
					echo Form::hidden('pollurl', Input::post('pollurl', 'pollurl'), array('id'=>'fpollurl')); 
					echo Form::hidden('paynowref', Input::post('paynowref', '000000'), array('id'=>'fpaynowref')); 
					echo Form::hidden('paymentstatus', Input::post('paymentstatus', 'status'), array('id'=>'fpaymentstatus')); 
					echo Form::hidden('mobile', Input::post('mobile', $user->username), array('id'=>'fusername')); 
?>
	
		<div class="row">
			<div class="col-md-3">
				<?php echo Form::label('Fee:', 'amount', array('class'=>'control-label')); ?>
			</div>
			<div class="col-md-9">
				<?php echo Form::input('amount', Input::post('amount', isset($registration) ? $registration->amount : '$20'), array('class' => 'form-control btn-block', 'placeholder'=>'Amount','disabled'=>'disabled')); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<?php echo Form::label('Narrative:', 'narrative', array('class'=>'control-label')); ?>
			</div>
			<div class="col-md-9">
				<?php echo Form::textarea('narrative', Input::post('narrative', isset($registration) ? $registration->narrative : $narrative), array('class' => ' form-control btn-block', 'rows' => 6, 'placeholder'=>'Narrative','disabled'=>'disabled')); ?>
			</div>
		</div>
		
	

