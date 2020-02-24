<?php
use Orm\Model;

class Model_City extends Model
{
	protected static $_properties = array(
		'id',
		'city',
		'country_id',
		'created_at',
		'updated_at',
	);
	// in a Model_City which belong to a country
	protected static $_belongs_to = array(
	    'country' => array(
	        'key_from' => 'country_id',
	        'model_to' => 'Model_Country',
	        'key_to' => 'id',
	        'cascade_save' => true,
	        'cascade_delete' => false,
	    )
	);
	
	// in a Model_City which has many addresses
	protected static $_has_many = array(
	    'addresses' => array(
	        'key_from' => 'id',
	        'model_to' => 'Model_Address',
	        'key_to' => 'city_id',
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
		$val->add_field('city', 'City', 'required|max_length[255]');

		return $val;
	}

}
