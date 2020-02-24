<?php

class Controller_Subscriptions extends Controller_Template
{

	// method to subscribe a user as a specified role, eg farmer, contractor
	public function action_dosub($role = null)
	{
		$role = trim($role);
		
		// a user should click on given URLs
		is_null($role) and Response::redirect(Input::referrer());
		
		list(,$uid) = Auth::get_user_id(); 
		
		$sub = Model_Subscription::query()
				->where('user_id', $uid)
				->where('subscribed', 1)
				->where('type',strtolower($role))
				->get();
		
		if(!empty($sub))
		{
			//Session::set_flash('error','You are already subscribed for this role');
			Response::redirect(Input::referrer());
		}
		
		$props = array(
			'type' 		=> $role,
			'subscribed' => 1,
			'user_id' => $uid
		);
		
		$insert =  Model_Subscription::forge($props);
		if($insert and $insert->save())
		{
			// now we actually link the user type to menu configs
		  	// 1st grab the role id for 'Contractor', then we insert a record into users_user_roles: user_id|role_id
		  	
		  	$role_grabber = "select id from `users_roles` where name = '$role' limit 1 ";
		  	$rs = DB::query($role_grabber)->execute(); 
		  	
		  	$role_id = null;
		  	if(count($rs))
		  	{
				$role_id = $rs[0]['id'];
			}
		  	$ins_role = "insert into `users_user_roles` values($uid,$role_id)";
		  	DB::query($ins_role)->execute();
			
			//Session::set_flash('success','You are have successfully subscribed for the role : '. strtoupper($role));
		}
		else
		{
			//Session::set_flash('error','Role subscription failed. Please try again');
		}
		Response::redirect(Input::referrer());
	}

	// unsubscribe as a contractor
	public function action_unsub($role = null)
	{
		
		$role = trim($role);
		
		// a user should click on given URLs
		is_null($role) and Response::redirect(Input::referrer());
		
		list(,$uid) = Auth::get_user_id(); 
		
		$sub = Model_Subscription::query()
				->where('user_id', $uid)
				->where('subscribed', 1)
				->where('type',strtolower($role))
				->get_one();
		
		if(empty($sub))
		{
			Session::set_flash('error','You were not subscribed for this role, in the first place!');
			Response::redirect(Input::referrer());
		}
		
		
		if(DB::query("delete from subscriptions where user_id = '$uid' and type = '$role'")->execute())
		{
			// delete from users_user_roles table so that the menus wil disapear as well		  	
		  	$role_grabber = "select id from `users_roles` where name = '$role' limit 1 ";
		  	$rs = DB::query($role_grabber)->execute();
		  	
		  	$role_id = null;
		  	if(count($rs))
		  	{
				$role_id = $rs[0]['id'];
			}
		  	
		  	$ins_role = "delete from `users_user_roles` where user_id = $uid and role_id = $role_id ";
		  	DB::query($ins_role)->execute();
			// Session::set_flash('success','You unsubscribed for the role : '. strtoupper($role));
		}
		else
		{
			Session::set_flash('error','Role unsubscription failed. Please try again');
		}
		Response::redirect(Input::referrer());
	}

}
