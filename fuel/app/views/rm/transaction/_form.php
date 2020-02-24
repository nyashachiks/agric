<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<h2>Order Summary</h2>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<br/>
			<?php echo Form::open(array("class"=>"form-horizontal")); ?>
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
				 
				 $narrative='This is a payment of $'.$sale->total.', for '.$sale->quantity
					.'kgs of '.$sale->rawmaterial_offer->brand_name.' sold by '.$firstname.' '.$lastname
					.'The mobile number the payment information will be sent to is '.$user->username.'';
				$narrative2='This is a payment of $'.$sale->total.', for '.$sale->quantity
					.'kgs of '.$sale->rawmaterial_offer->brand_name.' sold by '.$firstname.' '.$lastname
					.'</br> The mobile number the payment information will be sent to is '.$user->username
					.'</br> Please confirm payment by clicking the button below.' ;
					
					echo Form::hidden('rm_sale_id', Input::post('rm_sale_id', $sale->id)); 
					echo Form::hidden('amount', Input::post('amount', $sale->total)); 
					echo Form::hidden('narrative', Input::post('narrative', $narrative)); 
					echo Form::hidden('status', Input::post('status', 'pending')); 
					echo Form::hidden('browse_url', Input::post('browseurl', 'browsurl')); 
					echo Form::hidden('poll_url', Input::post('pollurl', 'pollurl')); 
					echo Form::hidden('paynow_ref', Input::post('paynowref', '000000')); 
					echo Form::hidden('payment_status', Input::post('paymentstatus', 'status')); 
					echo Form::hidden('mobile', Input::post('mobile', $user->username)); 
					
			?>
		
			<div class="row-fluid">
				<?php 	
					echo $narrative2;
				?>
			</div>
					
	
			<div class="ln_solid"></div>
			<div class="form-group">
				<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
					<button type="submit" class="btn btn-md btn-round btn-success">Send for Payment</button>
					<?php echo Html::anchor('rm/transaction', 'Back', array('class' => 'btn btn-md btn-round btn-warning', 'style' => 'text-decoration: none')); ?>		
				</div>
				
			</div>
<?php echo Form::close(); ?>			
		</div>
	</div>
</div>






