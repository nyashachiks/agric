<?php
use Orm\Model;

class Model_Farm extends Model
{
	protected static $_properties = array(
		'id',
		'user_id',
		'name',
		'size',
		'units',
		'address_id',
		'longitude',
		'latitude',
		'created_at',
		'updated_at',
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
	protected static $_belongs_to = array(
	    
	    'address' => array(
	        'key_from' => 'address_id',
	        'model_to' => 'Model_Address',
	        'key_to' => 'id',
	        'cascade_save' => true,
	        'cascade_delete' => false,
	    )
	);
	/*
	protected static $_has_one = array(
		// in a Model_Farm which has one seasonfarming
		    'seasonfarming' => array(
		        'key_from' => 'id',
		        'model_to' => 'Model_Seasonfarming',
		        'key_to' => 'farm_id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    )
		);
		protected static $_has_many = array(
			
		     // in a Model_Farm which has many contractapplications
		    'contractapplications' => array(
		        'key_from' => 'id',
		        'model_to' => 'Model_Contractapplication',
		        'key_to' => 'farm_id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    ),
		    
		   );*/


	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		//$val->add_field('user_id', 'User Id', 'required|valid_string[numeric]');
		$val->add_field('name', 'Name', 'required|max_length[255]');
		$val->add_field('size', 'Size', 'required');
		$val->add_field('units', 'Units', 'required|max_length[255]');
		//$val->add_field('address_id', 'Address Id', 'required|valid_string[numeric]');

		return $val;
	}

}
