<?php
use Orm\Model;

class Model_User extends Model
{
	protected static $_properties = array(
		'id',
		'username',
		//'first_name',
		//'last_name',
		//'profile_fields',
		'email',
		//'address_id',
		//'active',
		'created_at',
		'updated_at',
	);

	// in a Model_User which belong to a address
	protected static $_belongs_to = array(
	    'address' => array(
	        'key_from' => 'address_id',
	        'model_to' => 'Model_Address',
	        'key_to' => 'id',
	        'cascade_save' => true,
	        'cascade_delete' => false,
	    )
	);
	
	protected static $_has_one = array(
			// in a Model_User which has one productoffer
		    'productoffer' => array(
		        'key_from' => 'id',
		        'model_to' => 'Model_Productoffer',
		        'key_to' => 'farmer_id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    ),
		    // in a Model_User which has one bid
		    'bid' => array(
		        'key_from' => 'id',
		        'model_to' => 'Model_Bid',
		        'key_to' => 'buyer_id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    ),
		   
		   
		    // in a Model_User which has one registration
		    'registration' => array(
		        'key_from' => 'id',
		        'model_to' => 'Model_Registration',
		        'key_to' => 'user_id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    ) ,
		    // in a Model_User which has one sms
		    'sms' => array(
		        'key_from' => 'id',
		        'model_to' => 'Model_Sm',
		        'key_to' => 'sender_id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    ) ,
			// in a Model_User which has one user_profile
		    'user_profile' => array(
		        'key_from' => 'id',
		        'model_to' => 'Model_User_profile',
		        'key_to' => 'user_id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    ),
		     // in a Model_User which has one bankdetail
		    'bankdetail' => array(
		        'key_from' => 'id',
		        'model_to' => 'Model_Bankdetail',
		        'key_to' => 'farmer_id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    ),
		    
		);	
	protected static $_has_many = array(
		// in a Model_User which has many budgets
		    'budgets' => array(
		        'key_from' => 'id',
		        'model_to' => 'Model_Budget',
		        'key_to' => 'user_id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    ),
		   
		// in a Model_User which has many contractapplications
		    'contractapplications' => array(
		        'key_from' => 'id',
		        'model_to' => 'Model_Contractapplication',
		        'key_to' => 'farmer_id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    ),

		// in a Model_User which has many logistics
		    'logistics' => array(
		        'key_from' => 'id',
		        'model_to' => 'Model_Logistic',
		        'key_to' => 'supplier_id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    ),
		 // in a Model_User which has many documents
		    'documents' => array(
		        'key_from' => 'id',
		        'model_to' => 'Model_Document',
		        'key_to' => 'user_id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    ),
		// in a Model_User which has many contracts
		    'contracts' => array(
		        'key_from' => 'id',
		        'model_to' => 'Model_Contract',
		        'key_to' => 'contractor_id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    ),
		    

		
		);
	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		/*$val->add_field('first_name', 'First Name', 'required|max_length[255]');
		$val->add_field('last_name', 'Last Name', 'required|max_length[255]');
		$val->add_field('email', 'Email', 'required|valid_email|max_length[255]');
		$val->add_field('password', 'Password', 'min_length[5]');
		$val->add_field('password2', 'Confirm Password', 'match_field[password]');*/

		return $val;
	}
	
	// checks if the currently logged in user is AMA person
	public static function is_AMA()
	{
		list(,$uid) = Auth::get_user_id();
		
		$find =  "	SELECT * FROM `users_roles` ur join users_user_roles uur on ur.id = uur.role_id  WHERE 
					ur.id = uur.role_id and uur.user_id = $uid
					and ur.name = 'AMA Officer'";
		
		$rs =  DB::query($find)->execute()->as_array();
		if(count($rs)) return true;
		return false;
	}
	
	// checks if the currently logged in user is a contractor
	public static function is_CONTRACTOR()
	{
		list(,$uid) = Auth::get_user_id();
		
		
		$find =  "	SELECT * FROM `users_roles` ur join users_user_roles uur on ur.id = uur.role_id  WHERE 
					ur.id = uur.role_id and uur.user_id = $uid
					and ur.name = 'Contractor'";
		
		$rs =  DB::query($find)->execute()->as_array();
		if(count($rs)) return true;
		return false;
	}
	
	
	
	//returns full name of user given their user id, eg Liberty Mataruse
	public static function get_full_name($uid = null)
	{
		if(empty($uid)){
			list(,$uid) = Auth::get_user_id();
		}
		
		$full_name = "";
		$cfirstname = "";
		$clastname = "";
		$user = Auth\Model\Auth_User::find($uid);

		foreach($user->metadata as $meta)
		{
			if($meta->key=='first_name')
				$cfirstname=$meta->value;
				
			if($meta->key=='last_name')
				$clastname=$meta->value;
		}			
			$full_name =  $cfirstname." ".$clastname;
		
		return $full_name;
	}


	//returns address of user given their user id, 

	
	public static function get_address($uid = null)
	{
		if(empty($uid)){
			list(,$uid) = Auth::get_user_id();
		}
		
		$address="";
		$address_id="";
		$user = Auth\Model\Auth_User::find($uid);

		foreach($user->metadata as $meta)
		{
			if($meta->key=='address_id')
				$address_id=$meta->value;
				
		}			
		$address= Model_Address::find($address_id);
		
		return $address;
	}
	public static function get_first_name($uid = null)
	{
		if(empty($uid)){
			list(,$uid) = Auth::get_user_id();
		}
		
		
		$cfirstname = "";
		
		$user = Auth\Model\Auth_User::find($uid);

		foreach($user->metadata as $meta)
		{
			if($meta->key=='first_name')
				$cfirstname=$meta->value;
				
			
		}			
			
		
		return $cfirstname;
	}
	public static function get_last_name($uid = null)
	{
		if(empty($uid)){
			list(,$uid) = Auth::get_user_id();
		}
		
		
		$clastname = "";
		$user = Auth\Model\Auth_User::find($uid);

		foreach($user->metadata as $meta)
		{
				
			if($meta->key=='last_name')
				$clastname=$meta->value;
		}			
		
		
		return $clastname;
	}
	public static function get_userid($add_empty = null)
	{
		
		if(is_null($add_empty))
		{
			$districts = array();
		}
		else
		{
			$districts = array(-1 => $add_empty);
		}
		if(is_null($add_empty))
		{
			$full_name = array();
		}
		else
		{
			$full_name = array(-1 => $add_empty);
		}
		//$full_name = array();
		$cfirstname = "";
$clastname = "";
		//$sql = "select distinct id from users where group_id = 0 order by id asc ";
		
		//list(,$uid) = Auth::get_user_id();
		
		
		$find =  "SELECT distinct uur.user_id as id  FROM `users_roles` ur join users_user_roles uur on ur.id = uur.role_id  WHERE 
                ur.id = uur.role_id 
                and ur.name = 'Contractor'";
	
		$rs =  DB::query($find)->execute()->as_array();
		//$rs = \DB::query($sql)->execute()->as_array();
			// Debug::dump($rs);
			// exit;
		if(count($rs)){
			foreach($rs as $key => $val){
				$districts[$val['id']] = $val['id'];
				
				$user = Auth\Model\Auth_User::find($val['id']);

		foreach($user->metadata as $meta)
	  {
		if($meta->key=='first_name')
			$cfirstname=$meta->value;
		
		if($meta->key=='last_name')
			$clastname=$meta->value;
			
	 }	
		$full_name[$val['id']] = $cfirstname." ".$clastname;
	 	// Debug::dump($full_name);
		// exit;
 
			}
		}
	 //$full_name =  $cfirstname." ".$clastname;
		


		// Debug::dump($full_name);
		// exit;
		return $full_name;
		
	}
	
	public static function get_userFarmerid($add_empty = null)
	{
		
		if(is_null($add_empty))
		{
			$districts = array();
		}
		else
		{
			$districts = array(-1 => $add_empty);
		}
		if(is_null($add_empty))
		{
			$full_name = array();
		}
		else
		{
			$full_name = array(-1 => $add_empty);
		}
		//$full_name = array();
		$cfirstname = "";
$clastname = "";
		//$sql = "select distinct id from users where group_id = 0 order by id asc ";
		
		//list(,$uid) = Auth::get_user_id();
		
		
		$find =  "SELECT distinct uur.user_id as id  FROM `users_roles` ur join users_user_roles uur on ur.id = uur.role_id  WHERE 
                ur.id = uur.role_id 
                and ur.name = 'Farmer'";
	
		$rs =  DB::query($find)->execute()->as_array();
		//$rs = \DB::query($sql)->execute()->as_array();
			// Debug::dump($rs);
			// exit;
		if(count($rs)){
			foreach($rs as $key => $val){
				$districts[$val['id']] = $val['id'];
				
				$user = Auth\Model\Auth_User::find($val['id']);

		foreach($user->metadata as $meta)
	  {
		if($meta->key=='first_name')
			$cfirstname=$meta->value;
		
		if($meta->key=='last_name')
			$clastname=$meta->value;
			
	 }	
		$full_name[$val['id']] = $cfirstname." ".$clastname;
	 	// Debug::dump($full_name);
		// exit;
 
			}
		}
	 //$full_name =  $cfirstname." ".$clastname;
		


		// Debug::dump($full_name);
		// exit;
		return $full_name;
		
	}
	
		public static function get_userContractorName($val)
	{
		
		// if(is_null($add_empty))
		// {
			$cts = array();
			$cts['id'] = $val;
			 // Debug::dump($cts['id']);
			 // exit;
		// }
		// else
		// {
			// $districts = array(-1 => $add_empty);
		// }
		// if(is_null($add_empty))
		// {
			// $full_name = array();
		// }
		// else
		// {
			// $full_name = array(-1 => $add_empty);
		// }
		// //$full_name = array();
		// $cfirstname = "";
// $clastname = "";
		// //$sql = "select distinct id from users where group_id = 0 order by id asc ";
		
		// //list(,$uid) = Auth::get_user_id();
		
		
		// $find =  "SELECT distinct uur.user_id as id  FROM `users_roles` ur join users_user_roles uur on ur.id = uur.role_id  WHERE 
                // ur.id = uur.role_id 
                // and ur.name = 'Farmer'";
	
		// $rs =  DB::query($find)->execute()->as_array();
		// //$rs = \DB::query($sql)->execute()->as_array();
			// // Debug::dump($rs);
			// // exit;
		// if(count($rs)){
			// foreach($rs as $key => $val){
			// Debug::dump($val);
			// exit;
				//$districts[$val['id']] = $val;
				
				$user = Auth\Model\Auth_User::find($cts['id']);

		foreach($user->metadata as $meta)
	  {
		if($meta->key=='first_name')
			$cfirstname=$meta->value;
		
		if($meta->key=='last_name')
			$clastname=$meta->value;
			
	 }	
		$full_name[$val] = $cfirstname." ".$clastname;
	 	// Debug::dump($full_name);
		// exit;
 
			// }
		// }
	 //$full_name =  $cfirstname." ".$clastname;
		


		// Debug::dump($full_name);
		// exit;
		return $full_name;
		
	}
	/*public static function get_first_name($uid = null)
	{
		if(empty($uid))
		{
			list(,$uid) = Auth::get_user_id();
		}
		
		$user = Auth\Model\Auth_User::find($uid);

		if ($user != "")
		{

			foreach($user->metadata as $meta)
			{
				if($meta->key=='first_name')
					$cfirstname=$meta->value;
			}			
			
			return $cfirstname;
		}
		else
		{
			Session::set_flash('error','You must login first');
			Response::redirect(\Config::get('routes.login'));	
		}
	}*/
	
	// checks if the currently logged in user is a contractor
	public static function is_ADMIN()
	{
		list(,$uid) = Auth::get_user_id();
		
		$find =  "	SELECT * FROM `users_roles` ur join users_user_roles uur on ur.id = uur.role_id  WHERE 
					ur.id = uur.role_id and uur.user_id = $uid
					and ur.name = 'super user'";
		
		$rs =  DB::query($find)->execute()->as_array();
		if(count($rs)) return true;
		return false;
	}
	
	// checks if the currently logged in user is a FARMER
	public static function is_FARMER()
	{
		list(,$uid) = Auth::get_user_id();
		
		$find =  "	SELECT * FROM `users_roles` ur join users_user_roles uur on ur.id = uur.role_id  WHERE 
					ur.id = uur.role_id and uur.user_id = $uid
					and ur.name = 'Farmer'";
		
		$rs =  DB::query($find)->execute()->as_array();
		if(count($rs)) return true;
		return false;
	}
	
	
	//method to get a URL for the profile pic of a specified user
	public static function get_user_profile_pic_url($user_id = null)
	{
		//if not specified, we find the one for current user
		if(is_null($user_id)){
			list(,$user_id) = Auth::get_user_id();
		}
		
		//default
		$url = Uri::base(false).'assets/img/users/default.jpg';
		
		//otherwise, lets find out
		$find = Model_Profilepic::query()->where('user_id', $user_id)->order_by('id','desc')->get_one();
		if(!empty($find)){
			$filename = trim($find->saved_as);
			$url = Uri::base(false).'assets/img/profilepics/'.$filename;
		}
				
		return $url;
	}
	
	
	//returns address, email, and phone number for a target user
	public static function get_contact_details($uid = null,$address_part = null)
	{
		//return "263777000777 munya@gmail.com 10 Townsend Road,Suburbs";
		if(is_null($uid)) return false;
		
		$address = $email = $phone = "";
		
		$u_qry =  "select address from addresses
 					where 
					id = (select distinct `value`  from users_metadata 
					where `key` =  'address_id' and user_id = $uid limit 1) ";
		
		$rs =  \DB::query($u_qry)->execute()->as_array();
		if(count($rs)){
			$address =  $rs[0]['address'];
		}
		
		$user = Model_User::find($uid);
		if(!empty($user)){
			$email = $user->email;
			$phone = $user->username;
		}
		
		switch(strtolower(trim($address_part)))
		{
			//email alone
			case 'email':
				return $email;
			break;
			
			//phone number alone
			case 'phone':
				return $phone;
			break;
			
			//address alone
			case 'address':
				return $address;
			break;
			
			//we return everything
			default:
			$full_contact = $phone." ".$email." ".$address;
			return $full_contact;
		}
	}
	
	public static function get_farmers_list()
	{
		//get a list of farmers
		$SQL = "SELECT DISTINCT ur.user_id FROM `users_roles` ur join users_user_roles uur on ur.id = uur.role_id  WHERE 
					ur.id = uur.role_id
					and ur.name = 'Farmer'";
		
		$rs = DB::query($SQL)->execute()->as_array();
		
		$farmers = array(0=>'select a farmer');
		
		foreach($rs as $key)
		{
			foreach ($key as $farmer_id)
			{
				$farmer_name = static::get_full_name($farmer_id);
				
				$farmers = $farmers + array($farmer_id =>$farmer_name );
				
			}
			
		}
		return $farmers;
	}
}
