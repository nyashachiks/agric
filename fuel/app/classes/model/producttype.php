<?php
use Orm\Model;

class Model_Producttype extends Model
{
	protected static $_properties = array(
		'id',
		'name',
		'description',
		'created_at',
		'updated_at',
	);
	// in a Model_Producttype which has one product
		protected static $_has_one = array(
		    'product' => array(
		        'key_from' => 'id',
		        'model_to' => 'Model_Product',
		        'key_to' => 'producttype_id',
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
		$val->add_field('description', 'Description', 'required');

		return $val;
	}

}
