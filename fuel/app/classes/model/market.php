<?php
use Orm\Model;

class Model_Market extends Model
{
	protected static $_properties = array(
		'id',
		'name',
		'location',
		'address_id',
		'created_at',
		'updated_at',
	);

	 protected static $_has_one = array(
			// in a Model_Market which has one productoffer
		    'productoffer' => array(
		        'key_from' => 'id',
		        'model_to' => 'Model_Productoffer',
		        'key_to' => 'market_id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    )
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
		$val->add_field('name', 'Name', 'required|max_length[255]');
		$val->add_field('location', 'Location', 'required');
	  //  $val->add_field('address_id', 'Address Id', 'required|valid_string[numeric]');

		return $val;
	}
	
}	
