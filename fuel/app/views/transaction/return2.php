<?php
		
			
					require ("functions.php");
					$con=db_cxn();
					$results=mysqli_query($con,"SELECT * FROM `transaction` WHERE trans_ref='".$_GET['ref']."' ");
					mysqli_close($con);
					$row = mysqli_fetch_assoc($results);
					$ministry = $row["ministry"];
					$merchant=get_credatials();
					$MerchantKey=$merchant['Merchantkey'];
					
					$sets=StatusPoll ($_GET['ref'],$MerchantKey);

					if(!isset($sets['Error']))
					{
						// validating the data that has been returned	
						
						$responsehash=CreateHash($sets,$MerchantKey);
						
						if($responsehash==$sets['hash']){ 

							$con=db_cxn();
							mysqli_query($con,"UPDATE TRANSACTION SET `paynowRef` ='".$sets['paynowreference']."',`paymentStatus`='".$sets['status']."' WHERE trans_ref='".$_GET['ref']."' ");
							$results=mysqli_query($con,"SELECT * FROM TRANSACTION	WHERE trans_ref='".$_GET['ref']."' ");
							mysqli_close($con);
							$result = mysqli_fetch_assoc($results);
						
							echo "Reference : ".$sets['reference']."</p>";
							echo	"<p> Status : ".$sets['status']."</p>";
							echo	'<p> Amount : US$'.$sets['amount']."</p>";
							echo	'<p> Paynow Reference : '.$sets['paynowreference']."</p>";
							if($result['mobile']!=""){
								echo " <p>And a confirmation of your payment has been  sent to the mobile number ".$result['mobile']."</p>";
							}
						}
						else 
						{
							echo "Error: ".$sets['Error'];
						}
					}

		
			</td>
		</tr>
	</table>
		
		?>	