<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
	<div class="x_title">
		<h2>Order Summary</h2>
		<div class="clearfix"></div>
	</div>
	<div class="x_content">
		<br/>
		<?php echo Form::open(array("class"=>"form-horizontal")); ?>
	<fieldset>
		<?php 
				$sale = Session::get('sale');
				list(, $userid) = Auth::get_user_id(); 
				$user=Auth\Model\Auth_User::find($userid);
				$firstname='';
			  	$lastname='';
			  	$structure='';
			  	$enabled=0;
			  	//getting metadata
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
				 $narrative='This is a payment of $'.$sale->amount.', for '.$sale->bid->quantity
					.'kgs of '.$sale->bid->productoffer->product->name.' by '.$firstname.' '.$lastname
					.'The mobile number the payment information will be sent to is '.$user->username.'';
				$narrative2='This is a payment of $'.$sale->amount.', for '.$sale->bid->quantity
					.'kgs of '.$sale->bid->productoffer->product->name.' by '.$firstname.' '.$lastname
					.'</br> The mobile number the payment information will be sent to is '.$user->username
					.'</br> Please confirm payment by clicking the button below.' ;
					
					echo Form::hidden('sale_id', Input::post('sale_id', $sale->id)); 
					echo Form::hidden('amount', Input::post('amount', $sale->amount)); 
					echo Form::hidden('narrative', Input::post('narrative', $narrative)); 
					echo Form::hidden('status', Input::post('status', 'pending')); 
					echo Form::hidden('browseurl', Input::post('browseurl', 'browsurl')); 
					echo Form::hidden('pollurl', Input::post('pollurl', 'pollurl')); 
					echo Form::hidden('paynowref', Input::post('paynowref', '000000')); 
					echo Form::hidden('paymentstatus', Input::post('paymentstatus', 'status')); 
					echo Form::hidden('mobile', Input::post('mobile', $user->username)); 
		?>
		
		<div class="row-fluid">
			<?php 	
				echo $narrative2;
			?>
		</div>
		<br/><br/>
		<div class="row-fluid">
			<div class="col-md-5">
					<button class="btn btn-md btn-success btn-round" type="submit">Send for payment</button>
					<a href="<?php echo Uri::create('productoffer/index'); ?>" style="text-decoration: none" >
						<button type="button" class="btn btn-md btn-warning btn-round">Cancel</button>
					</a>
			</div>
			
		</div>
	</fieldset>
<?php echo Form::close(); ?>
		
	</div>
</div>
</div>

