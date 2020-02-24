<?php
class Controller_Rm_Transaction extends Controller_Template
{

	public function action_index()
	{
		$data['rm_transactions'] = Model_Rm_Transaction::find('all');
		$this->template->title = "Rm_transactions";
		$this->template->content = View::forge('rm/transaction/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('rm/transaction');

		if ( ! $data['rm_transaction'] = Model_Rm_Transaction::find($id))
		{
			Session::set_flash('error', 'Could not find rm_transaction #'.$id);
			Response::redirect('rm/transaction');
		}

		$this->template->title = "Rm_transaction";
		$this->template->content = View::forge('rm/transaction/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Rm_Transaction::validate('create');

			if ($val->run())
			{
				$rm_transaction = Model_Rm_Transaction::forge(array(
					'rm_sale_id' => Input::post('rm_sale_id'),
					'amount' => Input::post('amount'),
					'narrative' => Input::post('narrative'),
					'status' => Input::post('status'),
					'browse_url' => Input::post('browse_url'),
					'poll_url' => Input::post('poll_url'),
					'paynow_ref' => Input::post('paynow_ref'),
					'payment_status' => Input::post('payment_status'),
					'mobile' => Input::post('mobile'),
				));
				

				if ($rm_transaction and $rm_transaction->save())
				{
					
					//Prepare for pay now
					$url="https://www.paynow.co.zw/interface/initiatetransaction";
					//$url="http://paynow.webdevworld.com/interface/initiatetransaction"; /// url of initialising the transaction
					
					//lets get some details about the buyer
					list(,$uid) 	=  Auth::get_user_id();
					$buyer_record 	=  Model_User::find($uid);
					
					$buyer_email_address = trim($buyer_record->email);
					$buyer_phone_number  = trim($buyer_record->username);
					
					$Merchant=Custom_UserUtility::$get_credential;
					$Merchantkey=$Merchant["Merchantkey"];	
					$transRef=uniqid();
					$amount1=$rm_transaction->amount;
					$amount= sprintf('%0.2f', $amount1);
					$refkey=$rm_transaction->rm_sale_id;
					
					$fields = array(
							'id' => $Merchant["IntergrateId"], //integration ID live
							//'id'=>'1066',
							//'id'=>'1072',
							'reference'=> $refkey,// system transaction reference number
							'amount'=>$amount, // amount two decimal place 
							'additionalinfo'=>"",//$_POST['desc'],// optional information to be displayed to customer about transaction
							'returnurl'=> Uri::base().'rm/transaction/return.php?ref='.$transRef, // return url
							'resulturl'=> Uri::base().'rm/transaction/result.php?ref='.$transRef, // return result
							'authemail'=> 'onlinepayments@ttcs.co.zw',
							//'authemail'=> $buyer_email_address, //'onlinepayments@ttcs.co.zw',
				            'status'=>'Message',
				                        
				                );
				                
					// converting the array into post data including the hashing
					$fields_string='';	
					foreach($fields as $key=>$value) { 
						$fields_string .= $key.'='.$value.'&';
					 }

					rtrim($fields_string,'&');


					$fields_string .='hash='.Custom_UserUtility::CreateHash($fields,$Merchantkey);

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
					//var_dump($context);die;
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
							$responsehash=Custom_UserUtility::CreateHash($sets,$Merchantkey);

							if($responsehash==$sets['hash'])
							{ 
								//from pay now sucess';
								//update transaction in the database.
								//Debug::dump($sets);die;
								$rm_transaction->browse_url=$sets['browserurl'].$buyer_phone_number;
								$rm_transaction->poll_url=$sets['pollurl'];
								
								$rm_transaction->status=$sets['status'];
								$rm_transaction->save();
								
							
							}
							else 
							{
								echo "your data has been corrupted : ".$sets['error'];
							}
						}
						else
						{

							echo "Error: ".$sets['error'];

						}
						
							Session::set('browser',$sets['browserurl']);
							Session::set('poll', $sets['pollurl']);
							Session::set('ref', $rm_transaction->id);
				
					
					Response::redirect('rm/transaction/return/'.$rm_transaction->id);
					
				}

				else
				{
					Session::set_flash('error', 'Could not save Transaction.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Transactions";
		$this->template->content = View::forge('rm/transaction/create');

	}
	public function action_result($id = null)
	{
		

		if ( ! $data['rm_transaction'] = Model_Rm_Transaction::find($id))
		{
			Session::set_flash('error', 'Could not find transaction #'.$id);
			Response::redirect('rm_transaction');
		}
		

		$this->template->title = "Transaction";
		$this->template->content = View::forge('rm/transaction/result', $data);

	}
	

	

	public function action_return()
	{
		//lets get rid of this popup. wont work on major browsers
		$browser=Session::get('browser'); 
		
			
		$this->template->title = "Transaction";
		$this->template->content = View::forge('rm/transaction/return');
	}
	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('rm/transaction');

		if ( ! $rm_transaction = Model_Rm_Transaction::find($id))
		{
			Session::set_flash('error', 'Could not find rm_transaction #'.$id);
			Response::redirect('rm/transaction');
		}

		$val = Model_Rm_Transaction::validate('edit');

		if ($val->run())
		{
			$rm_transaction->rm_sale_id = Input::post('rm_sale_id');
			$rm_transaction->amount = Input::post('amount');
			$rm_transaction->narrative = Input::post('narrative');
			$rm_transaction->status = Input::post('status');
			$rm_transaction->browse_url = Input::post('browse_url');
			$rm_transaction->poll_url = Input::post('poll_url');
			$rm_transaction->paynow_ref = Input::post('paynow_ref');
			$rm_transaction->payment_status = Input::post('payment_status');
			$rm_transaction->mobile = Input::post('mobile');

			if ($rm_transaction->save())
			{
				Session::set_flash('success', 'Updated rm_transaction #' . $id);

				Response::redirect('rm/transaction');
			}

			else
			{
				Session::set_flash('error', 'Could not update rm_transaction #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$rm_transaction->rm_sale_id = $val->validated('rm_sale_id');
				$rm_transaction->amount = $val->validated('amount');
				$rm_transaction->narrative = $val->validated('narrative');
				$rm_transaction->status = $val->validated('status');
				$rm_transaction->browse_url = $val->validated('browse_url');
				$rm_transaction->poll_url = $val->validated('poll_url');
				$rm_transaction->paynow_ref = $val->validated('paynow_ref');
				$rm_transaction->payment_status = $val->validated('payment_status');
				$rm_transaction->mobile = $val->validated('mobile');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('rm_transaction', $rm_transaction, false);
		}

		$this->template->title = "Rm_transactions";
		$this->template->content = View::forge('rm/transaction/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('rm/transaction');

		if ($rm_transaction = Model_Rm_Transaction::find($id))
		{
			$rm_transaction->delete();

			Session::set_flash('success', 'Deleted rm_transaction #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete rm_transaction #'.$id);
		}

		Response::redirect('rm/transaction');

	}

}
