<?php
use Orm\Model;

class Model_User_Profile extends Model
{
	protected static $_properties = array(
		'id',
		'user_id',
		'national_id',
		'gender',
		'date_of_birth',
		'vendor_number',
		'payment_term',
		'created_at',
		'updated_at',
		
	);
	protected static $_belongs_to = array(
	    
	    'user' => array(
	        'key_from' => 'user_id',
	        'model_to' => 'Model_User',
	        'key_to' => 'id',
	        'cascade_save' => true,
	        'cascade_delete' => false,
	    )
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
		
		//$val->add_field('user_id', 'User Id', 'required|valid_string[numeric]');
		//$val->add_field('national_id', 'National Id', 'required|max_length[255]');
		//$val->add_field('gender', 'Gender', 'required|max_length[255]');
	//	$val->add_field('date_of_birth', 'Date Of Birth', 'required');  //
		//$val->add_field('payment_term', 'Payment Term', 'required');

		return $val;
	}

}
