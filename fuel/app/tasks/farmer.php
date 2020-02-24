
<?php

namespace Fuel\Tasks;


class Farmer

{
	
	
	
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
                                                    input::post('password'),
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
            $this->template->content = View::forge('farmer/create');

        }

    public function csvtodb()
    {
        
        $file = DOCROOT.'/assets/docs/csv/farmers.csv';

    if (($handle = fopen($file, "r")) !== FALSE) {

    while (($data = fgetcsv($handle, 2000, ",")) !== FALSE)

    {

                 $num = count($data);

        $row++;

        for ($c=0; $c < $num; $c++)

        {
        
        //echo $c
             //echo $data[$c];


        }

        //echo '<br/>';


    }

    echo 'End '.+$row;

    fclose($handle);

}

    }
    public function action_uploadUsers()
    {
        $row=1;

        $file = DOCROOT.'/assets/docs/csv/farmers.csv';
        if (($handle = fopen($file, "r")) !== FALSE)
        {

            while (($data = fgetcsv($handle, 2000, ",")) !== FALSE)

            {

                try
                {
                    $num = count($data);

                    $row++;

                    $error = '';
                            
                    $nat_id= $data[2];
                        
                    $phone='';

                    if($data[11]=='')
                    {
                        $phone=$data[0];
                    }
                    else
                    {
                        $phone=$data[11];
                    }
                    $str = trim($phone);
                    $username = trim(str_replace("+","",$str));       
                    $gender= 'M';
                    $country='252';
                    $district='';
                    $ward = '';
                    $dob = '';
                    $payterms = '';

                    //address
                    $address = Model_Address::forge(array(

                            'address' => $data[9],
                            'province' =>  $data[6],
                            'district' =>$district,
                            'ward'=> $ward,
                            'postal_code' => '+263',
                            'phone' => $phone,
                            'country_id'=>$country,
                
                    ));
                    $name=str_replace(' ', '', $data[4]);
                    $vendor_num=$data[0];
                    $address->save();
                    $email=  $name.'@gmbfarmers.co.zw' ;
                    $user = Auth::create_user
                                (
                                    $username,
                                    '12345',
                                    $email,
                                    1,
                                    array
                                        (
                                            'first_name' => $data[4],
                                            'last_name' => 'farmer',
                                            'address_id'=>$address->id, 
                                            'enabled'=>1,   //when email validation is introduced enabled=>0;
                                        )
                                );


                    if($user)
                    {
                        //create userprofile
                        $user_profile = Model_User_Profile::forge(array(
                    
                                        'user_id' => $user,
                                        'national_id' => $nat_id,
                                        'gender' =>$gender,
                                        'date_of_birth' => $dob,
                                        'payment_term' =>$payterms,
                                        'vendor_number'=> $vendor_num,
                                                          
                                    ));
                                                
                        $user_profile->save();

                        //create bank details
                        $bank_details = Model_Bankdetail::forge(array(
                        
                                        'farmer_id' => $user,
                                        'bank_name' => $data[7],
                                        'branch_name' =>$data[5],
                                        'account_number' => $data[8],
                                        'account_name' => $data[7],
                                    
                                    ));
                        $bank_details ->save();
                        Session::set('userid',$user);       
                       
                       
                    }
           
                }
                catch (\SimpleUserUpdateException $e)
                {
                                // duplicate email address
                        if ($e->getCode() == 2)
                            {
                                Session::set_flash('error',('Email Address already exists'));
                            }
                        elseif ($e->getCode() == 3)
                            {
                                Session::set_flash('error',('Mobile Number already exists'));
                            }

                        else
                            {
                                Session::set_flash('error',$e->getMessage());
                            }

                }  
                
                    
            }

               
        }
        fclose($handle);
        Session::set_flash('success', 'End '.+$row .' rows have been updated in farmer tables'); //check your email for further details
            

       Response::redirect('user/allusers');

    }

    public function action_createuser()
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
                                
                                
                                
                                //$vendor_num=Custom_RFCUtility::create_vendor($firstname,$lastname,$address_id ,$city, $account_number, $account_name ,$branch , $province, $paymentterms, $id_number);
                                $vendor_num=Input::post('vendornum');
                                if ($vendor_num == "") 
                                {
                                    
                                    Session::set_flash('Failed', 'The SAP System is down, please contact your System Administrator'); 
                            
                                }
                                
                                else
                                {   
                                    $address->save();   
                                    $user = Auth::create_user
                                                (
                                                    $username,
                                                   // Input::post('password'),
                                                   12345,
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
            $this->template->content = View::forge('farmer/createusers');

        }

}








?>
