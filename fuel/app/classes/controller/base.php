<?php
class Controller_Base extends Controller_Template 
{
	
	private function isEnabled()
	{
		list(, $userid) = Auth::get_user_id();
		$users=Auth\Model\Auth_User::find($userid);
			  //getting metadata
			  foreach($users->metadata as $meta)
			  {
			  	if($meta->key=='enabled')
			  		if($meta->value==1)
			  			return true;	
			  } 
			return  false;
	}

	public function before()
	{
		parent::before();	
	
		//No back button.
		$response = new Response();	
	
		$response->set_header('Cache-Control', 'no-cache, no-store, max-age=0, must-revalidate');
		$response->set_header('Expires', 'Mon, 26 Jul 1997 05:00:00 GMT');
		$response->set_header('Pragma', 'no-cache');
	
		$response->send();
		
	 
		if(!Auth::check())
		{
			Session::set_flash('error', 'You must login first');
			Response::redirect(Config::get('routes.login'));
		}
		if(!$this->isEnabled())
		{
			Auth::logout();
			Session::set_flash('error', 'You are not yet enabled!');
			Response::redirect(Config::get('routes.login'));
		}
		/*if(!Custom_Permissionutility::HasUriAccess())
		{
			//Session::set_flash('error', 'You do not have permission to access the requested page');
			//Response::redirect(Config::get('routes.login'));
		}*/
		
	
	}
	
	
}
