<?php
class Controller_Farm extends Controller_Template
{

	public function action_index()
	{
		$data['farms'] = Model_Farm::find('all');
		$this->template->title = "Farms";
		$this->template->content = View::forge('farm/index', $data);

	}

	public function action_indexview()
	{
		$data['farms'] = Model_Farm::find('all');
		
		$this->template->title = "Farms";
		$this->template->content = View::forge('farm/indexview', $data);

	}
	public function action_indexmine($id = null)
	{
		if(is_null($id))
		list(,$id)=Auth::get_user_id(); // edit for current user
		$data['farms'] = Model_Farm::query()->where('user_id',  $id)->get();
		
		$this->template->title = "Farms";
		$this->template->content = View::forge('farm/indexmine', $data);

	}
	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('farm');

		if ( ! $data['farm'] = Model_Farm::find($id))
		{
			Session::set_flash('error', 'Could not find farm #'.$id);
			Response::redirect('farm');
		}

		$this->template->title = "Farm";
		$this->template->content = View::forge('farm/view', $data);

	}
	public function action_result($id = null)
	{
		

		if ( ! $data['registration'] = Model_Registration::find($id))
		{
			Session::set_flash('error', 'Could not find transaction #'.$id);
			Response::redirect('registration');
		}
		

		$this->template->title = "Registration";
		$this->template->content = View::forge('transaction/result', $data);

	}


	public function action_return()
	{
		$browser=Session::get('browser');
		
		?>	
						<script language="javascript" type="text/javascript">
							window.open('<?php echo $browser;?>');
						</script>
		<?php 
		$this->template->title = "Transaction";
		$this->template->content = View::forge('transaction/return');
	}

	public function action_create()
	{
		
		if (Input::method() == 'POST')
		{
			$val = Model_Farm::validate('create');
			
			if ($val->run())
			{
				
			/*---------*/
				$country='';
				$country_name=Input::post('country');
				$countrys=Model_Country::query()->where('country_name', $country_name)->get();
				
				foreach ($countrys as $item)
				{
					$country=$item;
				}
				$countryid=$country['id'];
			
			//address
				$address = Model_Address::forge(array(
				'address' => Input::post('address'),
				'province' => Input::post('province'),
				'district' => Input::post('district'),
				'postal_code' => Input::post('postal_code'),
				'phone' => Input::post('phone'),
				'country_id'=>$countryid,//'city_id'=>$city->id,
			));
			$address->save();

				$farm = Model_Farm::forge(array(
					'user_id' => Input::post('user_id'),
					'name' => Input::post('name'),
					'size' => Input::post('size'),
					'units' => Input::post('units'),
					'longitude' => Input::post('longitude'),
					'latitude' => Input::post('latitude'),
					'address_id' => $address->id,
				));

				if ($farm and $farm->save())
				{
					
					Session::keep_flash('sucess', 'Farm created successfully');
					Response::redirect('farm/index');
					
					// FOLLOWING STUFF NOT REQUIRED FOR NOW!!
					//=======================================
					
					//registration creation
					$registration = Model_Registration::forge(array(
					'user_id' => Input::post('farmer_id'),
					'amount' => Input::post('amount'),
					'narrative' => Input::post('narrative'),
					'status' => Input::post('status'),
					'browseurl' => Input::post('browseurl'),
					'pollurl' => Input::post('pollurl'),
					'paynowref' => Input::post('paynowref'),
					'paymentstatus' => Input::post('paymentstatus'),
					'mobile' => Input::post('mobile'),
					));
					
					if ($registration and $registration->save())
					{
						//paynow registration
						//Prepare for pay now
						$url="https://www.paynow.co.zw/interface/initiatetransaction";
						$Merchant=Custom_UserUtility::$get_credential;
						$Merchantkey=$Merchant["Merchantkey"];	
						$transRef=uniqid();
						$amount1=$registration->amount;
						$amount= sprintf('%0.2f', $amount1);
						$refkey=$registration->id;
						$fields = array(
								
								'id'=>'1072',
								'reference'=> $refkey,// system transaction reference number
								'amount'=>$amount, // amount two decimal place 
								'additionalinfo'=>"",//$_POST['desc'],// optional information to be displayed to customer about transaction
								'returnurl'=> Uri::base(). '/transaction/return.php?ref='.$transRef, // return url
								'resulturl'=> Uri::base(). '/transaction/result.php?ref='.$transRef, // return result
								//'authemail'=>$_POST['email'],
								'authemail'=>'onlinepayments@ttcs.co.zw',
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
							
							if($sets['status']=="Ok")
							{
								// validating the data that has been returned	
								$responsehash=Custom_UserUtility::CreateHash($sets,$Merchantkey);

								if($responsehash==$sets['hash'])
								{ 
									//from pay now sucess';
									//update registration in the database.
									$registration->browseurl=$sets['browserurl'];
									$registration->pollurl=$sets['pollurl'];
									$registration->status=$sets['status'];
									$registration->save();
								
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
						$browser=$sets['browserurl'].'_blank';
						
						Session::set('browser', $browser);
						$poll=$sets['pollurl'];
						Session::set('poll', $poll);
						Session::set('ref', $registration->id);
						Response::redirect('farm/return');
					
					}
					else
					{
						Session::set_flash('error', 'Could not save registration.');
					}
					
					$query = Model_Farm::query()->where('user_id',  Auth::get_user_id()[1]);
					//return  $query->count();
					die;
					
				}

				else
				{
					//return -1;
					//die;
					Session::set_flash('error', 'Could not create farm. Please try again.');
				}
			}
			else
			{
				//return -1;
				//die;
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Farms";
		$this->template->content = View::forge('farm/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('farm');

		if ( ! $farm = Model_Farm::find($id))
		{
			Session::set_flash('error', 'Could not find farm #'.$id);
			Response::redirect('farm');
		}

		$val = Model_Farm::validate('edit');

		if ($val->run())
		{
			$farm->user_id = Input::post('user_id');
			$farm->name = Input::post('name');
			$farm->size = Input::post('size');
			$farm->units = Input::post('units');
			$farm->address_id = Input::post('address_id');
			$farm->longitude = Input::post('longitude');
			$farm->latitude = Input::post('latitude');

			if ($farm->save())
			{
				Session::set_flash('success', 'Updated farm #' . $id);

				Response::redirect('farm');
			}

			else
			{
				Session::set_flash('error', 'Could not update farm #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$farm->user_id = $val->validated('user_id');
				$farm->name = $val->validated('name');
				$farm->size = $val->validated('size');
				$farm->units = $val->validated('units');
				$farm->address_id = $val->validated('address_id');
				$farm->longitude = Input::post('longitude');
				$farm->latitude = Input::post('latitude');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('farm', $farm, false);
		}

		$this->template->title = "Farms";
		$this->template->content = View::forge('farm/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('farm');

		if ($farm = Model_Farm::find($id))
		{
			$farm->delete();

			Session::set_flash('success', 'Deleted farm #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete farm #'.$id);
		}

		Response::redirect('farm');

	}

}
