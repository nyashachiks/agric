<?php
class Controller_Transaction extends Controller_Template
{

	public function action_index()
	{
		$data['transactions'] = Model_Transaction::find('all');
		$this->template->title = "Transactions";
		$this->template->content = View::forge('transaction/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('transaction');

		if ( ! $data['transaction'] = Model_Transaction::find($id))
		{
			Session::set_flash('error', 'Could not find transaction #'.$id);
			Response::redirect('transaction');
		}

		$this->template->title = "Transaction";
		$this->template->content = View::forge('transaction/view', $data);

	}
	public function action_invoices()
	{
		//$data['transactions'] = //Model_Transaction::find('all');
		$this->template->title = "Transactions";
		$this->template->content = View::forge('transaction/invoice');

	}
	public function action_result($id = null)
	{
		

		if ( ! $data['transaction'] = Model_Transaction::find($id))
		{
			Session::set_flash('error', 'Could not find transaction #'.$id);
			Response::redirect('transaction');
		}
		

		$this->template->title = "Transaction";
		$this->template->content = View::forge('transaction/result', $data);

	}


	public function action_return()
	{
		//lets get rid of this popup. wont work on major browsers
		$browser=Session::get('browser'); 
		
		?>	
			<!--		<script language="javascript" type="text/javascript">
							window.open('<?php echo $browser;?>');
						</script>
			-->
		<?php	
		$this->template->title = "Transaction";
		$this->template->content = View::forge('transaction/return');
	}
	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Transaction::validate('create');
			$sets='';
			
				
			if ($val->run())
			{
				$transaction = Model_Transaction::forge(array(
					'sale_id' => Input::post('sale_id'),
					'amount' => Input::post('amount'),
					'narrative' => Input::post('narrative'),
					'status' => Input::post('status'),
					'browseurl' => Input::post('browseurl'),
					'pollurl' => Input::post('pollurl'),
					'paynowref' => Input::post('paynowref'),
					'paymentstatus' => Input::post('paymentstatus'),
					'mobile' => Input::post('mobile'),
				));

				if ($transaction and $transaction->save())
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
					$amount1=$transaction->amount;
					$amount= sprintf('%0.2f', $amount1);
					$refkey=$transaction->sale_id;
					$fields = array(
							'id' => $Merchant["IntergrateId"], //integration ID live
							//'id'=>'1066',
							//'id'=>'1072',
							'reference'=> $refkey,// system transaction reference number
							'amount'=>$amount, // amount two decimal place 
							'additionalinfo'=>"",//$_POST['desc'],// optional information to be displayed to customer about transaction
							'returnurl'=> Uri::base().'transaction/return.php?ref='.$transRef, // return url
							'resulturl'=> Uri::base().'transaction/result.php?ref='.$transRef, // return result
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
								$transaction->browseurl=$sets['browserurl'];
								$transaction->pollurl=$sets['pollurl'];
								$transaction->status=$sets['status'];
								$transaction->save();
							
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
						
					//$browser=$sets['browserurl'].'_blank';
					$browser = $sets['browserurl'].$buyer_phone_number;
					
					Session::set('browser', $browser);
					$poll=$sets['pollurl'];
					Session::set('poll', $poll);
					Session::set('ref', $transaction->id);
					Response::redirect('transaction/return/');
					
				}

				else
				{
					Session::set_flash('error', 'Could not save transaction.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Transactions";
		$this->template->content = View::forge('transaction/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('transaction');

		if ( ! $transaction = Model_Transaction::find($id))
		{
			Session::set_flash('error', 'Could not find transaction #'.$id);
			Response::redirect('transaction');
		}

		$val = Model_Transaction::validate('edit');

		if ($val->run())
		{
			$transaction->sale_id = Input::post('sale_id');
			$transaction->amount = Input::post('amount');
			$transaction->narrative = Input::post('narrative');
			$transaction->status = Input::post('status');
			$transaction->browseurl = Input::post('browseurl');
			$transaction->pollurl = Input::post('pollurl');
			$transaction->paynowref = Input::post('paynowref');
			$transaction->paymentstatus = Input::post('paymentstatus');
			$transaction->mobile = Input::post('mobile');

			if ($transaction->save())
			{
				Session::set_flash('success', 'Updated transaction #' . $id);

				Response::redirect('transaction');
			}

			else
			{
				Session::set_flash('error', 'Could not update transaction #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$transaction->sale_id = $val->validated('sale_id');
				$transaction->amount = $val->validated('amount');
				$transaction->narrative = $val->validated('narrative');
				$transaction->status = $val->validated('status');
				$transaction->browseurl = $val->validated('browseurl');
				$transaction->pollurl = $val->validated('pollurl');
				$transaction->paynowref = $val->validated('paynowref');
				$transaction->paymentstatus = $val->validated('paymentstatus');
				$transaction->mobile = $val->validated('mobile');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('transaction', $transaction, false);
		}

		$this->template->title = "Transactions";
		$this->template->content = View::forge('transaction/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('transaction');

		if ($transaction = Model_Transaction::find($id))
		{
			$transaction->delete();

			Session::set_flash('success', 'Deleted transaction #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete transaction #'.$id);
		}

		Response::redirect('transaction');

	}

}
