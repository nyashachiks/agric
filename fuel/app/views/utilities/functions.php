<?php
// function to create the hash
 function CreateHash ($value,$MerchantKey){

	$string ="";
	foreach ($value as $key => $value){
		if(strtoupper($key) !="HASH" ){
			$string .=$value;
		}
	}
	$string.=$MerchantKey;


	
	$hash =hash("sha512",$string);
	return strtoupper($hash);
}

///////////////////////////////////////////////////////////////////////////////////////////function to check status of a transaction

 function StatusPoll ($refno,$MerchantKey){
 $con=db_cxn();
/*$con=mysqli_connect("localhost","root","TwentyThird01","paynow");
		// Check connection
		if (mysqli_connect_errno())
		  {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		  }*/
			$results=mysqli_query($con,"SELECT * FROM TRANSACTION	WHERE trans_ref='".$refno."' ");
		
		//mysqli_close($con);
	

$row = mysqli_fetch_array($results);

//var_dump($row);
$url= $row['pollurl'];
$result = file_get_contents($url, false);
//echo $result;

// parsing results into an array 
	$temp=explode("&",$result);
	$sets = array();
	foreach ($temp as $value) {
		$array = explode('=', $value);
		$array[1] = trim($array[1], '"');
		$sets[$array[0]] = rawurldecode($array[1]);
	}
return $sets;
	
 
 }



/////////////////////////////////////////////////////////get marchant key, integration id and sms username//////////////////////////////
function get_credatials()
{
$details = array("Merchantkey" => "71a03cfe-c9b6-4c63-a5d8-b67f222da3ea","IntergrateId" => "1072");
	
	return $details;
}
/////////////////////////////////////////////////database connection////////////////////////////////////////////////////
function db_cxn()
{
$con=mysqli_connect("localhost","root","TwentyThird01","paynow");
		// Check connection
		if (mysqli_connect_errno())
		  {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		  }
		  return $con;
}
?>