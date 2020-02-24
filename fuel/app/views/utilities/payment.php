 <?php
include ("functions.php");
 $refkey=$_POST['refno'];
 $amount=trim($_POST['amount']);
$id_num=$_POST['id'];

$url="https://www.paynow.co.zw/interface/initiatetransaction";
//$url="http://paynow.webdevworld.com/interface/initiatetransaction"; /// url of initialising the transaction
$Merchant=get_credatials();
$Merchantkey=$Merchant["Merchantkey"];

//$Merchantkey="71a03cfe-c9b6-4c63-a5d8-b67f222da3ea"; //live
//$Merchantkey="e0be1737-6ea2-490c-8a22-9fec8428025d";// test

$transRef=uniqid();

$fields = array(
						//'id'=>$merchant["IntergrateId"], //integration ID live
						//'id'=>'1066',
						'id'=>'1072',
						'reference'=> $refkey,// system transaction reference number
						'amount'=>$amount, // amount two decimal place 
						'additionalinfo'=>"",//$_POST['desc'],// optional information to be displayed to customer about transaction
						'returnurl'=>'http://localhost:1234/smart_farmer/public/transaction/return.php?ref='.$transRef, // return url
						'resulturl'=>'http://localhost:1234/smart_farmer/public/transaction/result.php?ref='.$transRef, // return result
						//'authemail'=>$_POST['email'],
						'authemail'=>'onlinepayments@ttcs.co.zw',
                        'status'=>'Message',
                        
                );

	
	// converting the array into post data including the hashing	
foreach($fields as $key=>$value) { 
	$fields_string .= $key.'='.$value.'&';
 }

rtrim($fields_string,'&');


$fields_string .='hash='.CreateHash($fields,$Merchantkey);

$fields['returnurl']= urlencode($fields['returnurl']);
$fields['resulturl']= urlencode($fields['resulturl']);

$opts = array('http' =>
    array(
        'method'  => 'POST',
        'header'  => 'Content-type: application/x-www-form-urlencoded',
        'content' => $fields_string
    )
);
//exit($fields_string);
//initiating the transaction and retrieving the results
$context  = stream_context_create($opts);
//echo $fields_string;
$result = file_get_contents($url, false, $context);


// parsing results into an array 
$temp=explode("&",$result);
$sets = array();
foreach ($temp as $value) 
{
	$array = explode('=', $value);
	$array[1] = trim($array[1], '"');
	$sets[$array[0]] = rawurldecode($array[1]);
}
	//var_dump($sets);
	if($sets['status']=="Ok")
	{
		// validating the data that has been returned	
		$responsehash=CreateHash($sets,$Merchantkey);

		if($responsehash==$sets['hash']){ 
			//insert into the database the transaction
			$con=db_cxn();

			mysqli_query($con,"INSERT INTO TRANSACTION (id_num, app_name, trans_ref, `reference`, `amount`, `narative`,`transStatus`,`pollurl`,browserurl,transdate,mobile,tdate)
			VALUES ('".$id_num."', '".$applicationName."', '".$transRef."', '".$fields ['reference']."','".$fields ['amount']."', '".$fields ['additionalinfo']."','".$sets['status']."','".$sets['pollurl']."','".$sets['browserurl']."',NOW(),'".$_POST['Mobile']."','".$_POST['trans_date']."')");

			mysqli_close($con);
			/*echo  "INSERT INTO TRANSACTION (id_num, app_name, trans_ref, `reference`, `amount`, `narative`,`transStatus`,`pollurl`,browserurl,transdate,mobile,tdate)
			VALUES ('".$id_num."', '".$applicationName."', '".$transRef."', '".$fields ['reference']."',".$fields ['amount'].", '".$fields ['additionalinfo']."','".$sets['status']."','".$sets['pollurl']."','".$sets['browserurl']."',NOW(),'".$_POST['Mobile']."','".$_POST['trans_date']."')";
			//exit();*/


			//////////////////////////////////////////// redirect to the payment page/////////////////////////////
?>
		
			<script src="https://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
			<link rel="stylesheet" href="https://code.jquery.com/ui/1.8.10/themes/smoothness/jquery-ui.css" type="text/css">
			<script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jquery.ui/1.8.10/jquery-ui.min.js"></script>

			<script language="javascript" type="text/javascript">
				window.open("<?php echo $sets['browserurl']?>",'_blank' );
				window.location ="return_portal.php?ref=<?php echo $transRef;?>";
			</script>

<?php
		}
		else 
		{
			echo "your data has been corrupted : ".$sets['error'];
		}
	}
	else{

		echo "Error: ".$sets['error'];

	}
			
			

?>