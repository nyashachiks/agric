<?php
require ("functions.php");
//file_put_contents('postdata.txt', var_export($_POST, true));
///////////////////////////////////////////////getting ministry from table///////////////////////////////////////////////////

//$con=db_cxn();
/*$results=mysqli_query($con,"SELECT * FROM `transaction` WHERE trans_ref='".$_POST['ref']."' ");
mysqli_close($con);
$row = mysqli_fetch_assoc($results);
$ministry = $row["ministry"];
$applicationName = $row["app_name"];
$id_num=$row["id_num"];*/

//Getting The merchant key 

$Merchant=get_credatials();
	
//posted response from paynow 

$fields = array(
                       
						'reference'=> $_POST['reference'],// system transaction reference number
						'paynowreference'=>$_POST['paynowreference'],// optional information to be displayed to customer about transaction
						'amount'=>$_POST['amount'], // amount two decimal place 
						'status'=>$_POST['status'],
						'pollurl'=>$_POST['pollurl'] // poll url
                        
                        
                );
				//echo $Merchant['Merchantkey'];
// validating the data that has been returned	
$responsehash=CreateHash($fields,$Merchant['Merchantkey']);
if($responsehash==$_POST['hash']){ 

			//insert into the database the transaction
	$con=db_cxn();
	//mysqli_query($con,"UPDATE TRANSACTION SET `paynowRef` ='".$sets['paynowreference']."',`paymentStatus`='".$sets['status']."' WHERE trans_ref='".$_GET['ref']."' ");
	mysqli_query($con,"UPDATE TRANSACTION SET `paynowRef` ='".$fields['paynowreference']."',`paymentStatus`='".$fields['status']."' WHERE trans_ref='".$_GET['ref']."' ");
	mysqli_close($con);
	
	/////////////////////////////////////////////////////////connecting and posting results to SAP erp////////////////////////////////////////////

if ($fields['status']=='Paid')
	{				 
	$LOGIN = array (
		"ASHOST"=>"10.10.14.32", // application server host name
		"SYSNR"=>"02",// system number
		"CLIENT"=>"310",// client
		"USER"=>"mmusangeya",// user
		"PASSWD"=>"C7CuDk8hu3Z3YTgP",// password
		"CODEPAGE"=>"1100"
		);  // codepage


 	//————- Set the name of the function

	$rfcfunction = "Z_NSSA_PROCESS_PAYMENT_W";
	
	 //———— Make a connection to the SAP server
 	$rfc = saprfc_open($LOGIN);

 	if(!$rfc) {  // We have failed to connect to the SAP server
    	echo "Failed to connect to the SAP server".saprfc_error();
    	exit(1);
 	}

 	//———- Locate the function and discover the interface
 	$rfchandle = saprfc_function_discover($rfc, $rfcfunction);

 	if(!$rfchandle){ // We have failed to discover the function
		echo "We have failed to discover the function".saprfc_error($rfc);
		exit(1);
 	}
	

						saprfc_import ($rfchandle,"REFNO",$fields['reference']);
					
						saprfc_import ($rfchandle,"AMOUNT",$fields['amount']);
					
						saprfc_import ($rfchandle,"TRANS_DATE",$row['tdate']);
					 
				

 	//——— Call the function and check for errors
 	$rfcresults = saprfc_call_and_receive($rfchandle);

 	if ($rfcresults != SAPRC_OK){
		if ($rfcresults == SAP_EXCEPTION){
			$error = ("Exception raised:".saprfc_exception($rfchandle));
		}else{
			$error = ("Call error:".saprfc_error($rfchandle));
		}
		echo $error;
		exit();
 	}
	 $result = saprfc_export ($rfchandle,"EXMESSAGE");
	//echo '<br>'.saprfc_error().'<br>';
	saprfc_function_free($rfchandle);
 	saprfc_close($rfc);
	
	
	//insert into the database the transaction
	$con=db_cxn();
	mysqli_query($con,"UPDATE TRANSACTION SET `result_response` ='$result' WHERE trans_ref='".$_GET['ref']."' ");
	mysqli_close($con);
	}

	echo $fields['status'];
	}
else 
	{
		
		$con=db_cxn();
	mysqli_query($con,"UPDATE TRANSACTION SET `result_response` ='your data has been corrupted' WHERE trans_ref='".$_GET['ref']."' ");
	mysqli_close($con);
	echo "your data has been corrupted";
	}
	

?>