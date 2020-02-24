<?php abstract class Custom_Permissionutility
{
	
/*keywords used to indentify views*/
private static $reserved=array(
	'index',
	'view',
	'create',
	'delete',
	'edit',
	'assignrole',
	
	);
	//array used to associate view and action
public static $reservedFilter=array(
	'index'=>'view',
	'view'=>'view',
	'create'=>'add',
	'edit'=>'edit',
	'delete'=>'delete',
	'assignrole'=>'edit',
	);
private static $view='';	

	public static function HasMenuAccess($mainmenu,$dropdown)
	{	
		
		//getuser
		list(, $userid) = Auth::get_user_id();
		//echo($userid. 'pop');
		$user=Auth\Model\Auth_User::find($userid);
		//get roles attached 
		///Debug::dump($user);die;
		if(isset($user->roles))
		foreach($user->roles as $roles)
		{
			//echo 'role ';
			//inside roles, now move to permissions
			foreach($roles->permissions as $perm)
			{
				//echo 'per <br />';
				//inside permission, now looping through array action
				//echo $perm->area . ' ' . $perm->permission. ' <br /> ';
				if($perm->area==$mainmenu &&$perm->permission==$dropdown)
				{
					//echo ' if ';
					//Debug::dump($perm);die;
					foreach($perm->actions as $action)
					{
					//echo 'in';
					if($action=='view')
						return TRUE;
					}
				}
			}
			
		}
		return  false;
		//Debug::dump($user->roles[6]->permissions);die;
	}
	private static function BreakDownCurrentUri($view=null)
	{
		if($view!=null)
		{
			Custom_Permissionutility::$view=$view;
		}
		$arr=array('mainmenu'=>array(),'dropdown'=>array());
		//checks the current page
		$uriArray=Uri::segments();
		//create a string out of our uri segment,minus the get part
		$uriStr='';
		foreach($uriArray as $item)
		{
			if(!is_numeric($item))
			{
				$searchResult= Arr::search(Custom_Permissionutility::$reserved,$item,-1) ;//'. $item);
				//echo($searchResult . 'pop' .$item);
				if($searchResult !=-1)
				{
					//echo $searchResult.'tate';
					Custom_Permissionutility::$view=Custom_Permissionutility::$reserved[$searchResult];
				}
				else
				$uriStr.=$item.'/';
			}
			
		}
		//die;
		$uriStr=Str::sub($uriStr,0,strlen($uriStr)-1) ;
		//echo($uriStr);
		$menu=Model_Mainmenu::query()->where('url','like', $uriStr.'%')->get();
		if(count($menu)>0)
		{
			
			 foreach($menu as $m)
			 	$arr['mainmenu'][]=$m->id;
			 	$arr['dropdown'][]=-1;
			return $arr;
		}
		else//search in dropdown menu
		{
			$menu=Model_Dropdown ::query()->where('url','like',$uriStr.'%')->get();
			if(count($menu)>0)
			{
				
				 foreach($menu as $m)
				 	$arr['mainmenu'][]=$m->mainmenu_id;
				 	$arr['dropdown'][]=$m->id;
				return $arr;
			}
			else{
				return $arr=array(); //empty array means nothing was found in our menu database
			}
		}
		
	}
	public static function HasUriAccess($view =NULL)
	{	
	 	
		list(, $userid) = Auth::get_user_id();
		$user=Auth\Model\Auth_User::find($userid);
		
		//lets find out our current menu position
		$uriArray=Custom_Permissionutility::BreakDownCurrentUri($view);
		//Debug::dump($uriArray);
		//check if our uri is registered in our Database_Connection
		//Debug::dump(Custom_Permissionutility::$view);
		if(count($uriArray)==0)
		{
			//uri not registered in our database so lets return false
			return false;
		}
		
		//looping through our menu list array
		try
		{ 
			for($x=0;$x<count($uriArray) ;$x++)
			{
				
				$mainmenu=$uriArray['mainmenu'][$x];
				$dropdown=$uriArray['dropdown'][$x];
				//get roles attached 
				foreach($user->roles as $roles)
				{
			//echo 'role ';
			//inside roles, now move to permissions
				foreach($roles->permissions as $perm)
				{
				//echo 'per <br />';
				//inside permission, now looping through array action
				//echo $perm->area . ' ' . $perm->permission. ' <br /> ';
					if($perm->area==$mainmenu &&$perm->permission==$dropdown)
					{
					//echo ' if ';
					//Debug::dump($perm);die;
					foreach($perm->actions as $action)
					{
					
					if($action==Custom_Permissionutility::$reservedFilter[$view])
						{
						return true;
						}
					}
					//return false;
				}
				}
			
				}
			}
		}
		catch(Exception $e)
		{
		Log::error("Error occured permissionutility ". $e->getMessage() );
		}
		
		
		return false;
	}
}
