<?php
	
		
		if(isset($transaction))	
		{
			$sets=Custom_UserUtility::StatusPoll($transaction->pollurl);
				
					if(!isset($sets['error']))
					{
						// validating the data that has been returned	
						$Merchant=Custom_UserUtility::$get_credential;
						$Merchantkey=$Merchant["Merchantkey"];
						$responsehash=Custom_UserUtility::CreateHash($sets, $Merchantkey);
						
						if($responsehash==$sets['hash'])
						{ 
							
							
							$transaction->status=$sets['status'];
							$transaction->paynowref=$sets['paynowreference'];
							$transaction->save();
							
							echo "Reference : ".$sets['reference']."</p>";
							echo "<p> Status : ".$sets['status']."</p>";
							echo '<p> Amount : US$'.$sets['amount']."</p>";
							echo '<p> Paynow Reference : '.$sets['paynowreference']."</p>";
							echo " <p>And a confirmation of your payment has been  sent to the mobile number ".$transaction->mobile."</p>";
							echo 'After payment please click here to check payment status';
							
							if ($sets['status']=='Paid')
							{
								$sale=$transaction->sale;
								$sale->status='completed';
								
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