<?php

class Model_Subscription extends \Orm\Model
{
	protected static $_properties = array(
		'user_id',
		'id',
		'type',
		'subscribed',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_update'),
			'mysql_timestamp' => false,
		),
	);

	protected static $_table_name = 'subscriptions';
	
	// check if user is subscribed to something ...
	public static function isSubscribed($item, $user_id = null)
	{
		if(is_null($user_id)) list(,$user_id) = Auth::get_user_id();
		
		$check = Model_Subscription::query()
				->where('user_id',$user_id)
				->where('type',trim($item))
				->order_by('created_at','desc')
				->get_one();
		
		if(!empty($check)){
			return true;
		} 
		return false;
	}

}
