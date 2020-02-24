<?php
class Controller_Auth extends Controller_Template 
{
	
	public $template = 'sfv2_landing_tmpl';
	
	public function action_login($page=NULL)														
	{ 
	//todo: if logged in, go to dashboard
	
	if(Auth::check()) Response::redirect('farm/create');
	if (Input::method() == "POST") 
		{  
			$username=$_POST['username'];
			
			if(!filter_var($username, FILTER_VALIDATE_EMAIL)) {
    		 	//not an email, maybe its a phone number
    			$username=ltrim(trim($username),"+"); //removing + from cell number
				$username=ltrim($username,"00"); //removing 00 from cell number
			} 
			$auth = Auth::instance();

			// check the credentials. This assumes that you have the previous table created
			if ($auth->login($username, $_POST['password'])) 
			{
			
				
				Response::redirect('dashboard');
						
			}	
			else
			 {
				
				Session::set_flash('error', 'Authetication failure, please check your username or password.');
			}
		}
		// Show the login form
		$this->template->title = "User Login";
		$this->template->content = View::forge('guest/login_form');
	}
																
	public function action_forgotpassword()
	{
		$channel='email';
		if (Input::method() == "POST") 
		{  
		try{
			$username=$_POST['username'];
			$userEmail=$username;
			
			if(!filter_var($username, FILTER_VALIDATE_EMAIL)) {
    		 	//not an email, maybe its a phone number
    		 	$channel='mobile';
    			$username=ltrim(trim($username),"+"); //removing + from cell number
				$username=ltrim($username,"00"); //removing 00 from cell number
			} 
			else{
				//we have email, lets pull out username
				$user=Model_User::query()->select('username')->where('email',$username)->get_one();
				
				if(empty($user))
				{
						
					throw new Exception("Invalid username",8);
				}
				else //username exists
					{
						$username=$user->username;
					}
			}
			//lets reset password
				$new_password = Auth::reset_password($username);
				$msg='Your SmartFarmer password has been reset to : 
				'.$new_password . ' .Please login to change it';
			if($channel=='email')	
			{
				//sending Email
				$email=new Custom_Email();
				$email->SendEmail([$userEmail],
				$msg,'SmartFarmer Password Reset');	
			}
			else
			{
				$sms= new Custom_SmS();
				$sms->SendSmS($username,$msg);
			}		
			Session::set_flash('success','Password has been reset, please check your '.$channel);
			Response::redirect(\Config::get('routes.login'));
			}
			catch (Exception $e)
			{
				Session::set_flash('error','Error Code: '. $e->getCode(). ' Error : '.
				 $e->getMessage());
			}
		}
		$this->template->title = "Forgot Password";
		$this->template->content = View::forge('guest/passwordreset_form');
	}
	// show the landing page
	public function action_landing()
	{
		$this->template->title = "Welcome";
		$this->template->content = View::forge('guest/landing_page');
		
		
	}
	
	public function action_logout()
	{
		//No back button.
		$response = new Response();	
	
		$response->set_header('Cache-Control', 'no-cache, no-store, max-age=0, must-revalidate');
		$response->set_header('Expires', 'Mon, 26 Jul 1997 05:00:00 GMT');
		$response->set_header('Pragma', 'no-cache');
	
		$response->send();
		//login out
		Auth::logout();
		
		//clean up session specifics
		Session::delete('geo.lat');
		Session::delete('geo.lon');
		Session::delete('geo.city');
		
		Response::redirect('/');
		
	}

public function action_register()
{
	if (Input::method() == 'POST')
		{ 
			$error='';
			$val = Model_Address::validate('create_address');
			if(!$val->run())
				$error=$val;

			$val = Model_User_Profile::validate('create_user_profile');
			if(!$val->run())
				$error=$val;

			$val = Model_Bankdetail::validate('create_bank_details');
			if(!$val->run())
				$error=$val;

			
			$val = Model_User::validate('create');
			if(!$val->run())
				$error=$val; //loading error
				
			$nat_id= LibValidator::_validation_valid_natid(Input::post('nat_id'));

			$district= LibValidator::_validation_valid_selection(Input::post('district'));

			$province= LibValidator::_validation_valid_selection(Input::post('province'));

			$phone= LibValidator::_validation_valid_cellphone(Input::post('mobile'));
		
			$gender= LibValidator::_validation_valid_selection(Input::post('gender'));

			if ($error==''&& $nat_id==true && $gender==true && $province==true && $district==true && $phone ==true )
			{
				try
					{
						$country='';
						$country_name=Input::post('country');
						$countrys=Model_Country::query()->where('country_name', $country_name)->get();
						
						foreach ($countrys as $item)
						{
							$country=$item;
						}
						$countryid=$country['id'];
						
						
						$district=Input::post('district');
						
						//address

						$address = Model_Address::forge(array(

						'address' => Input::post('address'),
						'province' => Input::post('province'),
						'district' =>$district,
						'postal_code' => Input::post('postal_code'),
						'phone' => Input::post('mobile'),
						'country_id'=>$countryid,
					
						));
						$str = trim(Input::post('mobile'));
					
						$username = trim(str_replace("+","",Input::post('mobile')));
						//call to RFC and return vendor number
						$firstname = Input::post('first_name');	
						$lastname = Input::post('last_name');
						//$address = Input::post('address');

						$district = Input::post('district');
						$account_number= Input::post('account_number');
						$account_name = Input::post('account_name') ;
						$branch = Input::post('branch');
						$province = Input::post('province');
						$paymentterms=Input::post('payment_term');
						$vendor_num= $str ;/*Custom_RFCUtility::create_vendor($firstname,$lastname,$address ,$district, $account_number, $account_name ,$branch , $province, $paymentterms);*/
						
						if ($vendor_num == "") 
						{
							
							Session::set_flash('Failed', 'The SAP System is down, please contact your System Administrator'); 
					
						}
						
						else
						{	
							
							$address->save();	
							$user =	Auth::create_user
										(
											$username,
											Input::post('password'),
											Input::post('email'),
											Input::post('type'),
											array
												(
													'first_name' => Input::post('first_name'),
													'last_name' => Input::post('last_name'),
													'address_id'=>$address->id,	
													'enabled'=>1,   //when email validation is introduced enabled=>0;
												)
										);
							//create userprofile

							if($user)
							{
								$user_profile = Model_User_Profile::forge(array(
							
									'user_id' => $user,
									'national_id' => Input::post('nat_id'),
									'gender' =>Input::post('gender'),
									'date_of_birth' => Input::post('date_of_birth'),
									'payment_term' =>'0',
									'vendor_number'=> $vendor_num,
								
									));
														
								$user_profile->save();

								//create bank details
								$bank_details = Model_Bankdetail::forge(array(
								
									'farmer_id' => $user,
									'bank_name' => Input::post('bank_name'),
									'branch_name' =>Input::post('branch'),
									'account_number' => Input::post('account_number'),
									'account_name' => Input::post('account_name'),
								
									));
								$bank_details ->save();
								Session::set('userid',$user);		
								Session::set_flash('success', 'User account successfully registered! For number '.$str.'.'); //check your email for further details
								Response::redirect(\Config::get('routes.login'));
							}
							else 
							{
								Session::set_flash('error',('User could not be saved.'));
							}
							
						}

					}
				catch (\SimpleUserUpdateException $e)
					{
						// duplicate email address
						if ($e->getCode() == 2)
						{
							Session::set_flash('error',('login.email-already-exists'));
						}

						// duplicate username
						elseif ($e->getCode() == 3)
						{
							Session::set_flash('error',('login.username-already-exists'));
						}

						// this can't happen, but you'll never know...
						else
						{

							Session::set_flash('error',$e->getMessage());
						}
					}

			}
			else
			{
				if($district==false)
					{
						Session::set_flash('error', 'Select District');
					}
				elseif($province==false)
					{
						Session::set_flash('error', 'Select Province');
					}
				
				elseif($phone==false)
					{
						Session::set_flash('error', 'Invalid Mobile Number');
					}
				elseif($gender==false)
					{
						Session::set_flash('error', 'Pick a gender');
					}
				elseif($nat_id==false)
					{
						Session::set_flash('error', 'Wrong National id format');
					}
				
				elseif (isset($error)) 
				{
					
					Session::set_flash('error', $error->error());
				}
				
			}
				
		}
	
	//$this->template->set_global('structure',$structure);
	$this->template->title = "Users";
	$this->template->content = View::forge('user/create');

}

public function action_registerB()//registers business users
	{
		//is_null($groupid) and Response::redirect('user/wizard');
		$structure=Model_Structure::find("all");
		if (Input::method() == 'POST')
		{ 
		//Debug::dump(Input::post()); exit;
			
			$error='';
			$val = Model_User::validate('create');
			if(!$val->run())
				$error=$val; //loading error
			$val_structure = Model_Structure::validate('structure',FALSE);
			if(!$val_structure->run())
				$error=$val_structure;
			if ($error=='')
			try{
				$country='';
				$country_name=Input::post('country');
				$countrys=Model_Country::query()->where('country_name', $country_name)->get();
				
				foreach ($countrys as $item)
				{
					$country=$item;
				}
				$countryid=$country['id'];
				
				
				$district='';
				$district1=Input::post('district');
				$district2=Input::post('district2');
				if($district1!=''||$district1!=null)
				{
					$district=$district1;
				}
				else
				{
					$district=$district2;
				}
				//address
					$address = Model_Address::forge(array(
					'address' => Input::post('address'),
					'province' => Input::post('province'),
					'district' =>$district,
					'postal_code' => Input::post('postal_code'),
					'phone' => Input::post('phone'),
					'country_id'=>$countryid,
				
					));
					//company details
					$address->save();
					$company = Model_Company::forge(array(
					'name' => Input::post('companyName'),
					));
					$company->save();

				{
				$str = trim(Input::post('mobile'));
				//echo($str);die;
					$username = trim(str_replace("+","",Input::post('mobile')));
					
					$user =	Auth::create_user(
				    $username,
				    Input::post('password'),
				    Input::post('email'),
				    Input::post('type'),
				    array(
				       'first_name' => Input::post('first_name'),
					   'last_name' => Input::post('last_name'),
					   'address_id'=>$address->id,
					   'company'=>$company->id,
					   'company_contact'=>true,
					   'admin'=>TRUE,	
					   'enabled'=>1,   //when email validation is introduced enabled=>0;
				   	 	)
					);
	
					if($user)
						{	
					//adding automatic company role to the user		
					$data['user'] = Auth\Model\Auth_User::find($user);		
					$role=Auth\Model\Auth_Role::query()->where('name','Company')->get_one();
					$data['user']->roles[]=$role;
					$data['user']->save();
					/*now continuing with the other business--*/
							Session::set('userid',$user);		
							Session::set_flash('success', 'User account successfully registered! For number '
							.$str.'.'); //check your email for further details
							//Response::redirect('auth/job/'.Input::post('type'));
							Response::redirect(\Config::get('routes._root_'));
						}

						else
						{
							Session::set_flash('error', 'Could not save user.');
						}
				}
				}
				catch (\SimpleUserUpdateException $e)
			            {
			                // duplicate email address
			                if ($e->getCode() == 2)
			                {
			                   Session::set_flash('error',('login.email-already-exists'));
			                }

			                // duplicate username
			                elseif ($e->getCode() == 3)
			                {
			                    Session::set_flash('error',('login.username-already-exists'));
			                }

			                // this can't happen, but you'll never know...
			                else
			                {
			                    Session::set_flash('error',$e->getMessage());
			                }
			            }
						else
						{
							
							//Debug::dump($val_structure->error());die;
							Session::set_flash('error', $error->error());
						}
					}
		 // catch exceptions from the create_user() call
            
		//$this->template->set_global('structure',Auth\Model\Auth_Group::find('all'));
		$this->template->set_global('structure',$structure);
		$this->template->title = "Users";
		//$this->template->content = View::forge('user/createB');
		$this->template->content = View::forge('user/create_company');

	}
public function action_job($id)
	{
		$group=Auth\Model\Auth_Group::find($id);
		if (Input::method() == 'POST')
		{
			
				$data['user'] = Auth\Model\Auth_User::find(Session::get('userid'));
				$role=Auth\Model\Auth_Role::find(Input::post('role'));
				$data['user']->roles[Input::post('rolekey')]=$role;
				$data['user']->save();
		
			Session::set_flash('success','Successfully registered, you will me notified when enabled');
			Response::redirect(\Config::get('routes.login'));
		}
		//$data['selected_group']=$group;
		$data['roles'] =$group->roles;//  Auth\Model\Auth_Role::find('all');
		$this->template->title ='Roles ';
		$this->template->content = View::forge('user/userrole', $data);

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('branch');

		if ($branch = Model_Branch::find($id))
		{
			$branch->delete();

			Session::set_flash('success', 'Deleted branch #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete branch #'.$id);
		}

		Response::redirect('branches');

	}

}