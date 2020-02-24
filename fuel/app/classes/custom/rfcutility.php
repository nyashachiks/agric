
<?php 
	use SAPNWRFC\Connection as SapConnection;
	use SAPNWRFC\Exception as SapException;
class Custom_RFCUtility
{
	
	
	public static function create_vendor($firstname,$lastname,$address , $city, $account_number, $account_name ,$branch , $region, $paymentterms, $id_number)
	{
		try 
		{ 	//get connection parameters
			$params = Config::get('sapnwcfg'); 
			
			//open a connection
			$sapcon = new SapConnection($params);
			
			//specify what remote function to execute
			$remoteFunction = $sapcon->getFunction('ZVENDOR_INSERT2');  
			$reg='';
			//picking region code
			if($region=='Harare')
			{
				$reg="HRE";
			}
			elseif($region=='Bulawayo')
			{
				$reg="BYO";
			}
			elseif($region=='Manicaland')
			{
				$reg="MNC";
			}
			elseif($region=='Mashonaland Central')
			{
				$reg="MSC";
			}
			elseif($region=='Mashonaland East')
			{
				$reg="MSE";
			}
			elseif($region=='Mashonaland West')
			{
				$reg="MSW";
			}
			elseif($region=='Masvingo')
			{
				$reg="MSV";
			}
			elseif($region=='Matabeleland North')
			{
				$reg="MTN";
			}
			elseif($region=='Matabeleland North')
			{
				$reg="MTS";
			}
			elseif($region=='Midlands')
			{
				$reg="MID";
			}
			//specify input data for the remote function
			$input = 
			[ 
				'FIRST_NAME' =>$firstname.' '. $lastname,
				'LAST_NAME' =>  $lastname ,
				'PHYSICAL_ADDRESS' 	=> $address,
				'ID_NUMBER'=>$id_number,
				'PAYMENT_TERM'=>$paymentterms,
				'COUNTRY'=>'ZW',
				'CITY'=>$city,
				'ACCOUNT_NO'=>$account_number,
				'ACCOUNT_NAME'=>$account_name,
				'REGION'=>$reg,
				'BANK_COUNTRY'=>'ZW',
				'BANK_KEY'=>$branch,
				
			]; 
			

			//result from executing the remote function
			$result = $remoteFunction->invoke($input); 
			
			//do something with the result
			
			//close the connection to SAP
			$sapcon->close();
			return $result['VENDORNUMBER'];

		} catch(Exception $ex) 
		{ 
			//tell user that an error occurred during the RFC call
			//Debug::dump($ex); die;
			Session::set_flash('error',  "The SAP System is down, please contact your System Administrator "); 
			Response::redirect('user_profile');

		}


	}
	public static function create_stop_order_code($vendor, $vendor_name, $code, $company_code, $deduction_rate, $commission, $description)
	{
		try 
		{ 	//get connection parameters
			$params = Config::get('sapnwcfg'); 
			
			//open a connection
			$sapcon = new SapConnection($params);
			
			//specify what remote function to execute
			$remoteFunction = $sapcon->getFunction('ZSO_CODE_ADD');  
			
			//specify input data for the remote function
			$ded= floatval($deduction_rate);
			$comm = floatval($commission);
			
			$input = 
			[ 

				'CODE'=>$code,
				'VENDOR'=>$vendor,
				'BUKRS'=>$company_code,
				'VNAME1'=>$vendor_name,
				'DEDRATE'=>$ded,
				'COMM'=>$comm,
				'DESCR'=>$description,
			]; 
			

			//result from executing the remote function
			$result = $remoteFunction->invoke($input); 
			
			//do something with the result
			
			//close the connection to SAP
			$sapcon->close();
			return $result;

		} catch(Exception $ex) 
		{ 
			//tell user that an error occurred during the RFC call
			
			Session::set_flash('error',"The SAP System is down, please contact your System Administrator". $ex->getMessage().'.'); 
			Response::redirect(\Config::get('stopcode/create'));

		}


	}
	public static function update_stop_order_code($id, $vendor, $vendor_name, $code, $company_code, $deduction_rate, $commission, $description)
	{
		try 
		{ 	
			//get connection parameters
			$params = Config::get('sapnwcfg'); 
			
			//open a connection
			$sapcon = new SapConnection($params);
			
			//specify what remote function to execute
			$remoteFunction = $sapcon->getFunction('ZSO_CODE_CHANGE');  
			
		
			//specify input data for the remote function
			$ded= floatval($deduction_rate);
			$comm = floatval($commission);
			 	$user= $params['user'];
			$input = 
			[ 
				
				'CODE'=>strtoupper($code),
				'VENDOR'=>$vendor,
				'BUKRS'=>$company_code,
				'VNAME1'=>strtoupper($vendor_name),
				'DEDRATE'=>$ded,
				'COMM'=>$comm,
				'DESCR'=>strtoupper($description),
				'CNAME'=>$user,
				
			]; 
			

			//result from executing the remote function
			$result = $remoteFunction->invoke($input); 
			
			//do something with the result
			
			//close the connection to SAP
			$sapcon->close();
			return $result;

		} 
		catch(Exception $ex) 
		{ 
			//tell user that an error occurred during the RFC call
			
			Session::set_flash('error', "The SAP System problem, please contact your System Administrator. ". $ex->getMessage()."."); 
			Response::redirect(\Config::get('stopcode/edit/'.$id));

		}


	}
	public static function delete_stop_order_code($code)
	{
		try 
		{ 	//get connection parameters
			$params = Config::get('sapnwcfg'); 
			
			//open a connection
			$sapcon = new SapConnection($params);
			
			//specify what remote function to execute
			$remoteFunction = $sapcon->getFunction('ZSO_CODE_DELETE');  
			
			//specify input data for the remote function
			$input = 
			[ 
				'CODE'=>$code,
							
			]; 
			

			//result from executing the remote function
			$result = $remoteFunction->invoke($input); 
			
			//do something with the result
			
			//close the connection to SAP
			$sapcon->close();
			return $result;

		} 
		catch(Exception $ex) 
		{ 
			//tell user that an error occurred during the RFC call
			
			Session::set_flash('error', "The SAP System is down, please contact your System Administrator. ". $ex->getMessage()."."); 
			Response::redirect(\Config::get('stopcode/'));

		}


	}
	public static function create_stoporder($co_code, $id_no,$farmer_num,$code ,$farmer_name, $material_group, $max_amount, $depot, $effective_date, $so_text)
	{	
				
		
		
		try 
		{ 	//get connection parameters
			$params = Config::get('sapnwcfg'); 
			
			//open a connection
			$sapcon = new SapConnection($params);
			
			//specify what remote function to execute
			$remoteFunction = $sapcon->getFunction('Z_SO_CREATE');  
			
			//specify input data for the remote function
			$user= $params['user'];
			$input = 
			[ 
				'BUKRS'=>$co_code,
				//'STOPNO'=> $stop_no,
				'CODE'=>$code,
				'IDNO'=>$id_no,
				'FARMER'=>$farmer_num,
				'FNAME'=>$farmer_name,
				'MGROUP'=>$material_group,
				'MAXAMT'=>$max_amount,
				'EFDATE'=> $effective_date,
				'DEPOT'=>$depot,
				'TXT'=> $so_text,
				'ENAME'=>$user,
				'EDATE'=> date('Ymd'),
				'CDATE'=>date('Ymd'),
								
			]; 
			

			//result from executing the remote function
			$result = $remoteFunction->invoke($input); 
		
			//do something with the result
			
			//close the connection to SAP
			$sapcon->close();
			return $result;

		} catch(Exception $ex) 
		{ 
		
			//Debug::dump($ex);die;
			//tell user that an error occurred during the RFC call
			Session::set_flash('error',"The SAP System is down, please contact your System Administrator ". $ex->getMessage().'.'); 
			Response::redirect('stoporder/create');
		}


	}

	public static function delete_stoporder($stop_no)
	{	
				
		
		
		try 
		{ 	//get connection parameters
			$params = Config::get('sapnwcfg'); 
			
			//open a connection
			$sapcon = new SapConnection($params);
			
			//specify what remote function to execute
			$remoteFunction = $sapcon->getFunction('Z_SO_DELETE1');  
			
			//specify input data for the remote function
			$user= $params['user'];
			$input = 
			[ 
				
				'STOPNO'=> $stop_no,
										
			]; 
			

			//result from executing the remote function
			$result = $remoteFunction->invoke($input); 
			
			//do something with the result
			
			//close the connection to SAP
			$sapcon->close();
			return $result;

		} catch(Exception $ex) 
		{ 
		
		//Debug::dump($ex);die;
			//tell user that an error occurred during the RFC call
			Session::set_flash('error', " There is an  SAP Error, please contact your System Administrator, ". $ex->getMessage()); 
			Response::redirect('stoporder/');
		}


	}

	public static function update_stoporder($id, $co_code, $stop_no, $id_no,$farmer_num,$code ,$farmer_name, $material_group, $max_amount, $depot, $effective_date, $so_text)
	{	
				
		
		
		try 
		{ 	//get connection parameters
			$params = Config::get('sapnwcfg'); 
			
			//open a connection
			$sapcon = new SapConnection($params);
			
			//specify what remote function to execute
			$remoteFunction = $sapcon->getFunction('Z_SO_CHANGE1');  
			
			//specify input data for the remote function
			$user= $params['user'];
			$input = 
			[ 
				'BUKRS'=>$co_code,
				'STOPNO'=> $stop_no,
				'CODE'=>$code,
				'IDNO'=>$id_no,
				'FARMER'=>$farmer_num,
				'FNAME'=>$farmer_name,
				'MGROUP'=>$material_group,
				'MAXAMT'=>$max_amount,
				'EFDATE'=> $effective_date,
				'DEPOT'=>$depot,
				'TXT'=> $so_text,
				'ENAME'=>$user,
				'EDATE'=> date('Ymd'),
				'CDATE'=>date('Ymd'),
								
			]; 
			

			//result from executing the remote function
			$result = $remoteFunction->invoke($input); 
			
			//do something with the result
			
			//close the connection to SAP
			$sapcon->close();
			return $result;

		} catch(Exception $ex) 
		{ 
		
		
			//tell user that an error occurred during the RFC call
			Session::set_flash('error', " There is an  SAP Error, please contact your System Administrator, ". $ex->getMessage()); 
			Response::redirect('stoporder/edit/'.$id);
		}


	}
	
	public static function create_sales_order()
	{
		try 
		{ 	//get connection parameters
			$params = Config::get('sapnwcfg'); 
					
			//open a connection
			$sapcon = new SapConnection($params);
			
			//specify what remote function to execute
			$remoteFunction = $sapcon->getFunction('BAPI_SALESORDER_CREATEFROMDAT2');  
			$order_header=[
			['DOC_TYPE'=>'ZBV',
			'SALES_ORG'=>'1000',
			'DISTR_CHAN'=>'10',
			'DIVISION'=>'12',
			'SALES_GRP'=>'000',
			'SALES_OFF'=>'NH01',
			'BUSINESS_PARTNER_NO'=>'300001',],
			
			];
			$order_partners=[
			'PARTN_ROLE'=>'SH',
			'PARTN_NUMB'=>'300001',
			
			];
			$order_item=[
			'ITM_NUMBER'=>'10',
			'MATERIAL'=>'144',
			'BATCH'=>'INTAKE2019',
			'PLANT'=>'NH01',
			'TARGET_QTY'=>'24',
			'BUSINESS_PARTNER_NO'=>'300001',
			
			];
			
			
			
			//specify input data for the remote function
			$input = 
			[ 
				'ORDER_HEADER_IN' =>[
										'DOC_TYPE'=>'TA',
										'SALES_ORG'=>'3000',
										'DISTR_CHAN'=>'20',
										'DIVISION'=>'30',
										
																			
									],
				'ORDER_PARTNERS' =>  [
										[
											'PARTN_ROLE'=>'AG',
											'PARTN_NUMB'=>'300013',
										],
																			
									 ] ,
				'ORDER_ITEMS_IN'	=> [
											[
												'MATERIAL'=>'247',
												'PLANT'=>'8000',
												'TARGET_QTY'=>2,
											],
										
										],
							
			]; 
			$input2 = 
			[ 
				'ORDER_HEADER_IN' =>[
										'DOC_TYPE'=>'TA',
										'SALES_ORG'=>'0001',
										'DISTR_CHAN'=>'01',
										'DIVISION'=>'01',
										'SALES_GRP'=>'001',
										'SALES_OFF'=>'0001',
										'BUSINESS_PARTNER_NO'=>'300001',
										
																			
									],
				'ORDER_PARTNERS' =>  [
										[
											'PARTN_ROLE'=>'AG',
											'PARTN_NUMB'=>'3000001',
										],
																			
									 ] ,
				'ORDER_ITEMS_IN'	=> [
											[
												'ITM_NUMBER'=>'10',
												'MATERIAL'=>'144',
												'BATCH'=>'INTAKE2019',
												'PLANT'=>'NH01',
												'TARGET_QTY'=>24,
												'BUSINESS_PARTNER_NO'=>'300001',
											],
										
										],
							
			]; 
			

			//result from executing the remote function
			$result = $remoteFunction->invoke( $input2
												); 
			
			//do something with the result
			//$remoteFunction->invoke('BAPI_TRANSACTION_COMMIT');
			//close the connection to SAP
			$sapcon->close();
			//var_dump( $result); die;
			return $result;

		} catch(Exception $ex) 
		{ 
			//tell user that an error occurred during the RFC call
			echo 'Exception: ' . $ex->getMessage();
		}


	}
	

}

