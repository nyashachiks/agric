<?php
class Custom_SmS
{
public function SendSmS($mobilenumber,$message)
	{
				// Create map with request parameters
					$url="https://www.txt.co.zw/Remote/SendMessage";
					$fields = array(
					'Username' => ('ttcsremote6'),
					'Recipients' => ($mobilenumber),
					'Body' => ($message), 
					'sending_number' => ('txt.co.zw')
					);
					
					// Build Http query using params
					$fields_string="";                                                               
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
					
					$context  = stream_context_create($opts);

					$result = file_get_contents($url, false, $context);
					
					$result1= substr($result, 0, 7);
		
					if($result1== "SUCCESS")
					{
						$result2= ltrim($result, 'SUCCESS:');
					
					}
					else
					{
						throw new Exception($result,-1);
					}
					return $result2;

	}
}