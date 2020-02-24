<?php
/*
*	@author	Liberty Mataruse
*/
use SAPNWRFC\Connection as SapConnection;
use SAPNWRFC\Exception as SapException;

class Controller_Testsap extends Controller
{
	 public function action_test1()
	 {
		try 
		{ 	//get connection parameters
			$params = Config::get('sapnwcfg'); 
			
			//open a connection
			$sapcon = new SapConnection($params);
			
			//specify what remote function to execute
			$remoteFunction = $sapcon->getFunction('ZVENDOR_INSERT2');  
			
			//specify input data for the remote function
			$input = 
			[ 
				'FIRST_NAME' => 'Terence1',
				'LAST_NAME' => 'Muchenje' ,
				'PHYSICAL_ADDRESS'=>'1 Kenilworth Road',
				'COUNTRY'=>'ZW',
				'CITY'=>'Bulawayo',
				'ACCOUNT_NO'=>'3012344666',
				'ACCOUNT_NAME'=>'T Muchenje',
				'REGION'=>'BYO',
				'BANK_COUNTRY'=>'ZW',
				'BANK_KEY'=>'8102',
				
			]; 
			
			//result from executing the remote function
			$result = $remoteFunction->invoke($input); 
			
			//do something with the result
			Debug::dump($result); 
			
			//close the connection to SAP
			$sapcon->close();

		} catch(Exception $ex) 
		{ 
			//tell user that an error occurred during the RFC call
			echo 'Exception: ' . $ex->getMessage();
		}
	 }
}