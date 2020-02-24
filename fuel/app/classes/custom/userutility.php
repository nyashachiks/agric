<?php class Custom_UserUtility
{
	public static function sendSMS($recipientValue, $bodyValue, $senderId)
	{
		$url="https://www.txt.co.zw/Remote/SendMessage";
		$fields_string="";
		$fields = array(
			
			'Username'=>'ttcsremote6', //username
			'Recipients'=> $recipientValue,// comma separated string, will replace leading 0 with country code in smshop if not specified
			'Body'=>$bodyValue, // message
			
		                                                                                                
		     );
		                                                                
		 // converting the array into post data including the hashing         
		foreach($fields as $key=>$value) 
		{ 
		      $fields_string .= $key.'='.$value.'&';
		}

		rtrim($fields_string,'&');



		$opts = array('http' =>
		    array(
		        'method'  => 'POST',
		        'header'  => 'Content-type: application/x-www-form-urlencoded',
		        'content' => $fields_string
		    )
		);

		//initiating the transaction and retrieving the results
		$context  = stream_context_create($opts);

		$result = @file_get_contents($url, false, $context);
			
		$result1= substr($result, 0, 7);
		
		if($result1== "SUCCESS")
		{
			$result2= ltrim($result, 'SUCCESS:');
		
		}
		else
		{
			$result2= ltrim($result, 'ERROR:');
		}
		
		$sms = Model_Sm::forge();
		$sms->username = 'ttcsremote6';
		$sms->recipients=$recipientValue;
		$sms->sending_number='txt.co.zw';
		$sms->body = $bodyValue;
		$sms->sender_id=$senderId;
		$sms->message_id=$result2;
		$sms->save();
	}
	public static function getUserProfile()
	{
		list(, $userid) = Auth::get_user_id();
		$user=Auth\Model\Auth_User::find($userid);
		 $firstname='';
			  $lastname='';
			  $structure='';
			  $enabled=0;
			  $role='';
			  //getting metadata
			  if(isset($user->metadata))
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
			  if(isset($user->roles)) 
			  foreach($user->roles as $item)
			  {
			  	$role=$item->name;
			  	
			  }
			
			  Session::set('firstname',$firstname);
			  Session::set('lastname',$lastname);
			  Session::set('enabled',$enabled);
			  //Session::set('company',$user->group->name);
			  //Session::set('role',$role);
			  if($firstname=='Cecilia')
			  {
			  	$role='Agritax';
			  }
			return array('firstname'=>$firstname,'lastname'=>$lastname, 'role'=>$role)	;
	}
	
	public static $getRegions=array(
	'--Select a Region--',
	'Region One',
	'Region Two',
	'Region Three',
	'Region Four'
	);
	
	public static $getRatePeriods=array(
	'--Select a Rate--',
	'Per Hour',
	'Per Day',
	'Per Week',
	'Per Month'
	);
	
	public static $getSoilType=array(
	'--Select Soil Type--',
	'Clay Soil',
	'Good Soil',
	'Second Test Soil',
	'Test Soil'
	);
	
	public static function soilType()
	{
		$soilTypes=array();
		$soilTypes[0]='--Select Soil Type--';
		$soilTypes['Clay Soil']='Clay Soil';
		$soilTypes['Sandy Soil']='Sandy Soil';
		
		return $soilTypes;
	}
	
	public static function regions()
	{
		
	
		$regions=array();
		$regions[0]="--Select Region--";
		$regions['BYO']='Bulawayo';
		$regions['CHI']='Chinhoyi';
		$regions['GWE']='Gweru';	
		$regions['HRE']='Harare';	
		$regions['MAS']='Masvingo';	
		$regions['MUT']='Mutare';	
		return $regions;
	}
	public static function gender()
	{
		
	
		$gender=array();
		$gender[0]="--Select Gender--";
		$gender['Female']='Female';
		$gender['Male']='Male';
		
		return $gender;
	}
	
	public static function farmtype()
	{
		
	
		$farmtype=array();
		$farmtype[0]="--Select Farm Type--";
		$farmtype['Commercial Small-Scale Farmer']='Commercial Small-Scale Farmer';
		$farmtype['Subsistence Small-Scale Farmer']='Subsistence Small-Scale Farmer';
		$farmtype['Communal']='Communal';	
		$farmtype['A1']='A1';	
		$farmtype['A2']='A2';	
		return $farmtype;
	}
	
	public static function create_vendor($firstname, $lastname, $address, $country)
	{
		if (! extension_loaded('sapnwrfc')) {
			    throw new \Exception('Extension "sapnwrfc" not loaded. Please see https://github.com/piersharding/php-sapnwrfc#installation');
			}

			// @see the available connection paraemters here
			// http://help.sap.com/saphelp_nwpi711/helpdata/en/48/c7bb09da5e31ebe10000000a42189b/content.htm
			$config = [
			    'MSHOST' => '...',
			    
			    'CLIENT' => '...',
			    
			    'R3NAME' => '...',
			    'GROUP' => '...',
			    
			    'CODEPAGE' => '...',
			    
			    'LANG' => 'en',
			    
			    'LCHECK' => true,
			    'TRACE' => true,
			    
			    'user' => '...',
			    'passwd' => '...'
			];

			$conn = new sapnwrfc($config);

			$func = $conn->function_lookup('BAPI_VENDOR_CREATE');
			//these are not the actual parameters
			$params = [
						    'firstname' => $firstname,
						        'lastname' => $lastname,
						        'address' => $address,
						        'country' => $country
						    
						];

			$result = $func->invoke($params);

			// is an empty array
			if (is_array($result)) {
			    var_dump($result);
			} else {
			    echo 'Could not ping the SAP system';
			}

			$conn->close();

	}
	public static function create_BP( $region, $city, $firstname, $lastname, $street, $housenumber)
	{
		$street=trim($street);
		$street = preg_replace('/\s+/', '_', $street);
		$region=trim($region);
		$city= trim($city);
		$firstname= trim($firstname);
		$lastname=trim($lastname);
		$housenumber=trim($housenumber);	
		$request_url = 'http://192.168.1.15:52000/sap_interface/addbp.php?region='.$region.'&city='.$city.'&firstname='.$firstname.'&lastname='.$lastname.'&housenumber='.$housenumber.'&street='.$street.'';
	
	
	  $ch = curl_init();
	  curl_setopt($ch, CURLOPT_URL, $request_url);
	  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
	  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	  $response = curl_exec($ch);
	  
	  
	  curl_close($ch);
	
	  return $response;
	
	}
	public static  $getSchoolLevels=array(
		'--Select subject level--',
		'Grade One',
		'Grade Two',
		'Grade Three',
		'Grade Four',
		'Grade Five',
		'Grade Six',
		'Grade Seven',
		'Form One',
		'Form Two',
		'Form Three',
		'Form Four',
		'Form Five',
		'Form Six'
		);
	public static  $getSubjects=array(
		'--Select subject--',
		'');
	public static function units()
		{
			$units=array();
			
			//$units["Select Unit"]="--Select Unit--";
			$units[0]="--Select Unit--"; //makes validation by LibValidator a snap!
			//$units["Square Kilometers"]="Square Kilometers";
			$units["Acres"]="Acres";
			$units["Hectares"]="Hectares";
			
			return $units;
		}
	public static function future_years()
	{
		$fy=array();
				
		for ($year = date('Y'); $year < date('Y')+10; $year++)
		{
			$fy[$year]=$year;
		}
		//Debug::dump($fy);die;
		return $fy;
	}
	
	// function to create the hash
static  function CreateHash ($value,$MerchantKey){

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

 static function StatusPoll ($url){
	
	
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
static $get_credential = array(
				"Merchantkey" => "71a03cfe-c9b6-4c63-a5d8-b67f222da3ea",
				"IntergrateId" => "1072"
				);
		
		
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

}

