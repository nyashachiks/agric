<?php
class Controller_User_Profile extends Controller_Template
{

	public function action_index()
	{
		$data['user_profiles'] = Model_User_Profile::find('all');
		$this->template->title = "User_profiles";
		$this->template->content = View::forge('user/profile/index', $data);

	}

	/*public function action_view($id = null)
	{
		is_null($id) and Response::redirect('user/profile');

		if ( ! $data['user_profile'] = Model_User_Profile::find($id))
		{
			Session::set_flash('error', 'Could not find user_profile #'.$id);
			Response::redirect('user/profile');
		}

		$this->template->title = "User_profile";
		$this->template->content = View::forge('user/profile/view', $data);

	}
	*/
	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_User_Profile::validate('create');

			if ($val->run())
			{
				$user_profile = Model_User_Profile::forge(array(
					'user_id' => Input::post('user_id'),
					'national_id' => Input::post('national_id'),
					'gender' => Input::post('gender'),
					'date_of_birth' => Input::post('date_of_birth'),
				));

				if ($user_profile and $user_profile->save())
				{
					Session::set_flash('success', 'Added user_profile #'.$user_profile->id.'.');

					Response::redirect('user/profile');
				}

				else
				{
					Session::set_flash('error', 'Could not save user_profile.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "User_Profiles";
		$this->template->content = View::forge('user/profile/create');

	}

	/*public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('user/profile');

		if ( ! $user_profile = Model_User_Profile::find($id))
		{
			Session::set_flash('error', 'Could not find user_profile #'.$id);
			Response::redirect('user/profile');
		}

		$val = Model_User_Profile::validate('edit');

		if ($val->run())
		{
			$user_profile->user_id = Input::post('user_id');
			$user_profile->national_id = Input::post('national_id');
			$user_profile->gender = Input::post('gender');
			$user_profile->date_of_birth = Input::post('date_of_birth');

			if ($user_profile->save())
			{
				Session::set_flash('success', 'Updated user_profile #' . $id);

				Response::redirect('user/profile');
			}

			else
			{
				Session::set_flash('error', 'Could not update user_profile #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$user_profile->user_id = $val->validated('user_id');
				$user_profile->national_id = $val->validated('national_id');
				$user_profile->gender = $val->validated('gender');
				$user_profile->date_of_birth = $val->validated('date_of_birth');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('user_profile', $user_profile, false);
		}

		$this->template->title = "User_profiles";
		$this->template->content = View::forge('user/profile/edit');

	}*/
	 public function action_edit($id = null)
        {

			is_null($id) and Response::redirect('user/profile');

			if ( ! $user_profile = Model_User_Profile::find($id))
			{
				Session::set_flash('error', 'Could not find user_profile #'.$id);
				Response::redirect('user/profile');
			}
			
			$user = Model_User::find($user_profile->user_id);
			//Debug::dump($user_profile);die;
			$address = Model_User::get_address($user_profile->user_id);
			$banks = Model_Bankdetail::find('all', array('where' => array(array('farmer_id',$user_profile->id))));
			//Debug::dump($bank);die;
			foreach ($banks as $aBank) {
				$bank = $aBank ;

			}


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
                                'ward'=> Input::post('ward'),
                                'postal_code' => Input::post('postal_code'),
                                'phone' => Input::post('mobile'),
                                'country_id'=>$countryid,
                            
                                ));
                                $str = trim(Input::post('mobile'));
                            
                                $username = trim(str_replace("+","",Input::post('mobile')));
                                //call to RFC and return vendor number
                                $firstname = Input::post('first_name');	
                                $lastname = Input::post('last_name');
                                $address_id = Input::post('address');
                                $paymentterms=Input::post('payment');
                               // $district = Input::post('district');
                                $account_number= Input::post('account_number');
                                $account_name = Input::post('account_name') ;
                                $branch = Input::post('branch');
                                $province = Input::post('province');
                                $id_number=Input::post('nat_id');
                                $city = Input::post('district');
                                
                                
                                
                                $vendor_num=Custom_RFCUtility::create_vendor($firstname,$lastname,$address_id ,$city, $account_number, $account_name ,$branch , $province, $paymentterms, $id_number);
                                
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
                                            'payment_term' =>Input::post('payment'),
                                            'vendor_number'=> $vendor_num,
                                            $paymentterms=Input::post('payment'),
                                        
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
                                        Response::redirect('user_profile');
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
                                    Session::set_flash('error',('Email Address already exists'));
                                }

                                // duplicate username
                                elseif ($e->getCode() == 3)
                                {
                                    Session::set_flash('error',('Mobile Number already exists'));
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
            $this->template->title = "Farmers";
            $this->template->set_global('user_profile', $user_profile, false);
            $this->template->set_global('bank', $bank, false);
            $this->template->set_global('address', $address, false);

            $this->template->set_global('user', $user, false);
            $this->template->content = View::forge('farmer/edit');
            

        }

     public function action_viewfarmer($id = null)
        {

			is_null($id) and Response::redirect('user/profile');

			if ( ! $user_profile = Model_User_Profile::find($id))
			{
				Session::set_flash('error', 'Could not find user_profile #'.$id);
				Response::redirect('user/profile');
			}
			
			$user = Model_User::find($user_profile->user_id);
			//Debug::dump($user_profile);die;
			$address = Model_Address::find('province');
			$banks = Model_Bankdetail::find('all', array('where' => array(array('farmer_id',$user_profile->id))));
			//Debug::dump($bank);die;
			foreach ($banks as $aBank) {
				$bank = $aBank ;

			}

            
            
            //$this->template->set_global('structure',$structure);
            $this->template->title = "Farmers";
            $this->template->set_global('user_profile', $user_profile, false);
            $this->template->set_global('bank', $bank, false);
            $this->template->set_global('address', $address, false);

            $this->template->set_global('user', $user, false);
            $this->template->content = View::forge('farmer/view');
            

        }
    public function action_view($id = null)
        {

            is_null($id) and Response::redirect('user/profile');

            if ( ! $user_profile = Model_User_Profile::find($id))
            {
                Session::set_flash('error', 'Could not find user_profile #'.$id);
                Response::redirect('user/profile');
            }
            
            $user = Model_User::find($user_profile->user_id);
            //Debug::dump($user_profile);die;
            $address = Model_Address::find('province');
            $banks = Model_Bankdetail::find('all', array('where' => array(array('farmer_id',$user_profile->id))));
            //Debug::dump($bank);die;
            foreach ($banks as $aBank) {
                $bank = $aBank ;

            }

            
            
            //$this->template->set_global('structure',$structure);
            $this->template->title = "Farmers";
            $this->template->set_global('user_profile', $user_profile, false);
            $this->template->set_global('bank', $bank, false);
            $this->template->set_global('address', $address, false);

            $this->template->set_global('user', $user, false);
            $this->template->content = View::forge('farmer/view');
            

        }
	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('user/profile');

		if ($user_profile = Model_User_Profile::find($id))
		{
			$user_profile->delete();

			Session::set_flash('success', 'Deleted user_profile #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete user_profile #'.$id);
		}

		Response::redirect('user/profile');

	}

}
