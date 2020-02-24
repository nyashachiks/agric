
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

                        $str = trim($data[11]);
                    
                        $username = trim(str_replace("+","",$phone));


                        /*

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
                        */
                        
                        
                        
                        //$vendor_num=Custom_RFCUtility::create_vendor($firstname,$lastname,$address_id ,$city, $account_number, $account_name ,$branch , $province, $paymentterms, $id_number);
                        $vendor_num=$data[0];
                        if ($vendor_num == "") 
                        {
                            
                            
                    
                        }
                        
                        else
                        {   
                            $b = '';
                            for ($a = 0; $a <= 10; $a++)
                            {

                            

                                $b = 'testing$@kudzai.com'.$a;
                             }

                            $address->save();   


                            $user = Auth::create_user
                                        (
                                            $username,
                                           // Input::post('password'),
                                           12345,
                                    
                                            $b,
                                            1,
                                            array
                                                (
                                                    'first_name' => $data[4],
                                                    'last_name' => 'test',
                                                    'address_id'=>$address->id, 
                                                    'enabled'=>1,   //when email validation is introduced enabled=>0;
                                                )
                                        );
                            //create userprofile

                            if($user)
                            {
                                $user_profile = Model_User_Profile::forge(array(
                            
                                    'user_id' => $user,
                                    'national_id' => $nat_id,
                                    'gender' =>$gender,
                                    'date_of_birth' => $dob,
                                    'payment_term' =>$payterms,
                                    'vendor_number'=> $vendor_num,
                                    $paymentterms=Input::post('payment'),
                                
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
                                Session::set_flash('success', 'User account successfully registered! For number '.$str.'.'); //check your email for further details
                                Response::redirect('farmer/uploadUsers');
                            }
                            else 
                            {
                                Session::set_flash('error',('User could not be saved.'));
                            }
                            
                        }

                            }