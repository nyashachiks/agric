<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
	<div class="x_title">
		<h2>Transaction Summary</h2>
		<div class="clearfix"></div>
	</div>
	<div class="x_content">
		<br/>
		<div class="row">
			<?php
	$browser=Session::get('browser');
	$poll=Session::get('poll');
	$ref=Session::get('ref');
	
	$return_checker = @$_GET['ref'];
	
	$show_button 	=  true;
	//if(strtolower(trim($return_checker)) == strtolower(trim($ref))){
	if(!empty($return_checker)){
		$show_button =  false;
	}
?>

<table>
	<tr>
		<td>
			<?php if($show_button): ?>
			<div class="alert alert-warning">
				<p>Your transaction has been accepted, but is not yet paid. You must now make a payment. Details for your order are as follows:</p> 
			</div>
			<br/>
			<?php else: ?>
			<div class="alert alert-success">
				<p>Your payment has been received. Thank you! Details for the transaction are as follow:</p>
			</div>
			<?php endif; ?>
			
			<?php
				$sets=Custom_UserUtility::StatusPoll($poll);
				
					if(!isset($sets['error']))
					{
						// validating the data that has been returned	
						$Merchant=Custom_UserUtility::$get_credential;
						$Merchantkey=$Merchant["Merchantkey"];
						$responsehash=Custom_UserUtility::CreateHash($sets, $Merchantkey);
						
						if($responsehash==$sets['hash'])
						{ 
							
							$transaction = Model_Transaction::find($ref);
							$transaction->status=$sets['status'];
							$transaction->paynowref=$sets['paynowreference'];
							$transaction->save();
							
							//presentattion tweak
							if($show_button)
							{
								$sms_notification = 	" <p>A confirmation of the transaction has been  sent to the mobile number ".$transaction->mobile."</p>";
							}
							else
							{
								$sms_notification = "";
							}
							
							echo "Reference : ".$sets['reference']."</p>"; ?>
							<?php if(strtolower(trim($sets['status'])) =='paid'): ?>
								<p> Status : <span class="label label-success">
									<?php echo $sets['status']; ?> </span>
								</p>
							<?php else: ?>
								<p> Status : <span class="label label-danger">
									<?php echo $sets['status']; ?> </span>
								</p>
							<?php endif; ?>
							
							
							<?php
							echo '<p> Amount : US$'.$sets['amount']."</p>";
							echo '<p> Paynow Reference : '.$sets['paynowreference']."</p>";
							echo $sms_notification; 
							echo '<br/>';
							if ($sets['status']=='Paid')
							{
								$sale=$transaction->sale;
								$sale->status='completed';
								$sale->save();
								//Debug::dump($sale->productoffer->farmer);die;
								
								$farmer=$sale->productoffer->farmer->username;
								$quantity=$sale->bid->quantity;
								$base= $sale->productoffer->product->measurement->unit;
								$prodName=$sale->productoffer->product->name;
								list(, $userid) = Auth::get_user_id(); 
								$users=Auth\Model\Auth_User::find($userid);
								$firstname='';
								$lastname='';
								 
								 
								  foreach($users->metadata as $meta) //iterating through metadata
								  {
								  
								  	if($meta->key=='first_name')
								  		$firstname=$meta->value;
								  	if($meta->key=='last_name')
								  		$lastname=$meta->value;
								  	
								  } 
								$bodyValue="A payment of US".$sets['amount'].' has been made into your account by '.$firstname.' '.$lastname;
								$bodyValue=$bodyValue.' For '.$quantity.' '.$base.' of '.$prodName;
								
								$recipientValue=$farmer;
								Custom_UserUtility::SendSMS($recipientValue, $bodyValue, $userid);
							}
							else
							{
								//echo Html::anchor('transaction/return/'.$ref,'Check Payment', array('class'=>'btn btn-primary'));
							}
							
							
						}
					}
						
					else 
						{
							
							echo "Error: ".$sets['error'];
							echo "Please click here and make payment" ;
							echo Form::button('payment', 'To payment', array('class'=>'btn btn-link btn-md', 'onclick'=>'toPayment()'));
							echo "<br/>";
							echo "After payment click here to refresh";
							echo Form::button('refresh','<i class="glyphicon glyphicon-refresh"> </i>', 
							array('class'=>'btn btn-link', 'onclick'=>'refresh()'));
							
						}
					
			?>
			
		</td>
	</tr>
</table>
<div class="row-fluid" style="margin-bottom: 30px">
<?php if($show_button): ?>
	<a href="<?php echo $browser; ?>" style="text-decoration: none" target="_self">
		<button class="btn btn-primary btn-md btn-round" type="button">Complete the payment</button>
	</a>
<?php endif; ?>
<a href="<?php echo Uri::create('productoffer'); ?>" style="text-decoration: none">
	<button class="btn btn-md btn-warning btn-round"> Back to products</button>
</a>
</div>
		</div>
		
	</div>
</div>
</div>

			
<script>
	function toPayment()
	{
		window.open('<?php echo $browser;?>','payNowPopup', 'toolbar=0,location=0,menubar=0, height=' + screen.height + ',width=' + screen.width);
	}
	function refresh()
	{
		window.location.reload();
	}
</script>