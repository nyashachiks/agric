<?php

use SAPNWRFC\Connection as SapConnection;
use SAPNWRFC\Exception as SapException;

class Controller_Test extends Controller
{
	/**
	 * The basic welcome message
	 *
	 * @access  public
	 * @return  Response
	 */
	 
	 
	 public function action_sap1()
	 {
		try 
		{ 
			$params = Config::get('sapnwcfg');
			$sapcon = new SapConnection($params);

			$remoteFunction = $sapcon->getFunction('Z_MIM_TEST'); 

			$input = [ 
			'INP' => 'Libstar Babe!' ]; 

			$result = $remoteFunction->invoke($input); 

			var_dump($result); 
			$sapcon->close();

		} catch(Exception $ex) 
		{ 
			echo 'Exception: ' . $ex->getMessage() . PHP_EOL; 
		}
	 }
	 
	public function action_saprfc()
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
	
	
	public function action_sap2()
	{
		
		$parameters = [
			'ashost' => '192.168.1.129',
			'sysnr'  => '46',
			'client' => '310',
			'user' => 'MMUSANGEYA',
			'passwd' => 'gV#j7B9Pz',
		];


	 try { 
	 $connection = new SapConnection($parameters); 
	 $remoteFunction = $connection->getFunction('BAPI_VENDOR_CREATE'); 
	 
	 echo '<h3>Input Variables</h3>'; 
	 
	 $in = [
				'firstname' => 'Liberty',
				'lastname' => 'Mataruse',
				'address' => 'Some place in Harare',
				'country' => 'ZW'
			
			];
			
			/*
			$in = [
				'VENDORNO' => 200,
				'VENDOR' => 300,
				'RETURN' => 1
			];
			
			*/

			$result = $remoteFunction->invoke($in); 
			echo '<h3>Return Values</h3>'; 
			var_dump($result); 
			
		$connection->close();
		
	} catch(SapException $ex) 
	{ 
		echo 'Exception: ' . $ex->getMessage() . PHP_EOL; 
	}
		
}
	
	public function action_permits(){
		$this->template->title =  "Loans";
		$this->template->content =  View::forge('test/permit');
	}
	
	public function action_loans(){
		$this->template->title =  "Loans";
		$this->template->content =  View::forge('test/loans');
	}
	
	public function action_sorders()
	{
		
		$this->template->title =  "Stop orders";
		$this->template->content =  View::forge('test/sorders');
	}

	/**
	 * A typical "Hello, Bob!" type example.  This uses a Presenter to
	 * show how to use them.
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_hello()
	{
		return Response::forge(Presenter::forge('welcome/hello'));
	}

	/**
	 * The 404 action for the application.
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_404()
	{
		return Response::forge(Presenter::forge('welcome/404'), 404);
	}
}
