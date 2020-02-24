<?php
class Controller_User extends Controller_Base
{
	
	public function action_wizard()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Structure::validate('create',FALSE);
			if($val->run())
			{
				Response::redirect('user/create/'. Input::post('type'));
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
			
		}
		$data['structure']=Model_Structure::find('all');
		$this->template->title = "User Wizard";
		$this->template->content = View::forge('user/registrationwizard',$data);
	}
	public function action_farmers()
	{
		$role=Auth\Model\Auth_Role::query()->where('name','farmer')->get();
		/*there is only one farmer role, so looping in it to extract users*/
		$data['users']='';
		foreach($role as $item)
		{
			$data['users']=($item->users);
			break;
			
		}
		
		$this->template->title = "Users";
		$this->template->content = View::forge('user/farmers', $data);

	}
	
	public function action_buyers()
	{
		$role=Auth\Model\Auth_Role::query()->where('name','buyer')->get();
		/*there is only one farmer role, so looping in it to extract users*/
		$data['users']='';
		foreach($role as $item)
		{
			$data['users']=($item->users);
			break;
			
		}
		
		$this->template->title = "Users";
		$this->template->content = View::forge('user/buyers', $data);

	}
	public function action_contractors()
	{
		$role=Auth\Model\Auth_Role::query()->where('name','contractor')->get();
		/*there is only one farmer role, so looping in it to extract users*/
		$data['users']='';
		foreach($role as $item)
		{
			$data['users']=($item->users);
			break;
			
		}
		$this->template->title = "Contractor";
		$this->template->content = View::forge('user/contractors', $data);

	}
	public function action_enable($id = null,$status)
	{
		is_null($id) and Response::redirect('user');

		if ($user =Auth\Model\Auth_User::find($id))
		{
			
			Auth::update_user(
    			array(
        			'enabled' => $status,  
    				),$user->username
				);
			//$user->delete();

			Session::set_flash('success',($status==0?' Successfully disabled user':'Successfully enabled user'));
		}

		else
		{
			Session::set_flash('error', 'Could not delete user #'.$id);
		}

		Response::redirect('user');

	}
	public function action_allusers()
	{
		//getting id of logged in user
		list(, $userid) = Auth::get_user_id(); 
		//returning all users except the logged in user
		$data['users'] = Auth\Model\Auth_User::find('all', array('where' => array(array('id','!=', $userid))));
		
		$this->template->title = "Delete Users";
		$this->template->content = View::forge('user/allusers', $data);

	}

	
	public function action_index()
	{
		if(Input::post())
		{
			$users=Auth\Model\Auth_User::find(Input::post('userid'));
			$role=Auth\Model\Auth_Role::find(Input::post('role'));
			$users->roles[]=$role;
			$users->save();
			Session	::set_flash('success','User has been successfully placed');
			
		}
		list($driver,$group) = Auth::get_groups()[0];
		$data['users'] = Auth\Model\Auth_User::find('all');//,array('where'=>array(array('group_id',$group->id)))); 
		$this->template->title = "Users";
		$this->template->content = View::forge('user/index', $data);

	}
	public  function action_updatePassword()
	{
		
		if (Input::method() == 'POST')
		{
			if(Input::post('new')==Input::post('confirm'))//we can now talk
				{
				if(Auth::change_password(Input::post('current'),Input::post('new'))) 
					Session::set_flash("success", "Password successfully updated!");
				else 
					Session::set_flash("error", "Current password is invalid!");
			
				}
			else
				Session::set_flash("error", "New password and passord confirm should be equal!");
		}
		Response::redirect('user/edit');
	}
	public function action_companyUsers()
	{
		$data['meta']=Auth\Model\Auth_Metadata::query()
			->where('key','company')
			->where('value',Auth::get('company')) //pulling company related info
			->get(); 
		 
		$this->template->title = "Users";
		$this->template->content = View::forge('user/company_index', $data);

	}
	public function action_assignrole($id = null)
	{
		
		is_null($id) and Response::redirect('user');

		if ( ! $data['user'] = Auth\Model\Auth_User::find($id))
		{
			Session::set_flash('error', 'Could not find user #'.$id);
			Response::redirect('user');
		}
		if (Input::method() == 'POST')
			{
				$role=Auth\Model\Auth_Role::find(Input::post('role'));
				$data['user']->roles[Input::post('rolekey')]=$role;
				$data['user']->save();
			}
		
		$this->template->title = "User";
		$this->template->content = View::forge('user/userrole', $data);

	}
	

	public function action_view($id = null)
	{
		
		list(, $userid) = Auth::get_user_id(); 
		if ( ! $data['user'] = Auth\Model\Auth_User::find($userid))
		{
			Session::set_flash('error', 'Could not find user #'.$id);
			Response::redirect('user');
		}
		$this->template->title = "User";
		$this->template->content = View::forge('user/view', $data);

	}
	
	public function action_edit($id = null)
	{
		if(is_null($id))
		list(,$id)=Auth::get_user_id(); // edit for current user
		//is_null($id) and Response::redirect('user');

		if ( ! $user = Auth\Model\Auth_User::find($id))
		{
			Session::set_flash('error', 'Could not find user #'.$id);
			Response::redirect('user');
		}

		$val = Model_User::validate('edit'); 
		/*updating user details below--*/
		if ($val->run())
		{
			$user->first_name = Input::post('first_name');
			$user->last_name = Input::post('last_name');
			$user->email = Input::post('email');
			$user->address_id = Input::post('address_id');
			//$user->active = Input::post('active');

			if ($user->save())
			{
				Session::set_flash('success', 'Updated user #' .$user->first_name);

				Response::redirect('user/edit');
			}

			else
			{
				Session::set_flash('error', 'Could not update user #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$user->first_name = $val->validated('first_name');
				$user->last_name = $val->validated('last_name');
				$user->email = $val->validated('email');
				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('user', $user, false);
		}

		$this->template->title = "Users";
		$this->template->content = View::forge('user/edit');

	}

	public function action_delete($id = null)
	{

		is_null($id) and Response::redirect('user/allusers');



		if ($user = Auth\Model\Auth_User::find($id))
			{
				
				$user_id = $user->id;
				$address_id = "";
				$address="";
				$bank_details="";
				$banks="";
				$userprofile="";
				$user_profile="";
				$users = "";
				$user1 = "";


				
				
				//get and delete bank_details
				

				
				if($banks = Model_Bankdetail::find('all', array('where' => array(array('farmer_id',$user_id)))))
					{
						foreach ($banks as $bank) 
							{
								$bank_details=$bank;
							}
							$bank_details->delete();
						 
							
					}

				else
					{

						
					}


				
				//get and delete address


				foreach($user->metadata as $meta)
					{

						if($meta->key=='address_id'){
							$address_id=$meta->value;
						}
					}

				if($address= Model_Address::find($address_id))
					{

						
						
						$address->delete();
						
						
					}

				else
					{

					}


						
				//get and delete user profile

				

				
				if($userprofile= Model_User_Profile::find('all', array('where' => array(array('user_id',$user_id)))))
					{

						foreach ($userprofile as $user1) 
							{
								$user_profile=$user1;
							}
							
							
							$user_profile->delete();
							
					}

				else
					{
						

					}


					


				//delete  user 
				
				if($user)
					{
						
					$user->delete();
					
					}

				else
					{
						
					}


				Session::set_flash('success', 'Deleted user #'.$id);
			}

		else
			{
				Session::set_flash('error', 'Could not delete user #'.$id);
			}

		Response::redirect('user/allusers');

	}

	public function action_addCompanyUser()
	{

		if (Input::method() == 'POST')
		{	Debug::dump(Input::post());die;	
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
					   'address_id'=>Auth::get('address_id'), //placing according to the company address
					   'company'=>Auth::get('company'),//setting company id
					   'company_contact'=>Input::post('companyContact'),
					   'admin'=>Input::post('administrator'),	
					   'enabled'=>1,   //when email validation is introduced enabled=>0;
				   	 	)
					);
		
					if($user)
					{
						Session::set_flash('success', 'Successfully added user '. Input::post('first_name').
						' '.Input::post('last_name') );
						Response::redirect('user/');
						
					}
		}
		$this->template->title = "Users";
		$this->template->content = View::forge('user/creatCompany');
		
	}
}
