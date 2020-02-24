<?php
use Orm\Model;

class Model_Measurement extends Model
{
	protected static $_properties = array(
		'id',
		'name',
		'unit',
		'created_at',
		'updated_at',
	);
	
		
		protected static $_has_one = array(
			// in a Model_Measurement which has one product
		    'product' => array(
		        'key_from' => 'id',
		        'model_to' => 'Model_Product',
		        'key_to' => 'measurement_id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    ),
		    // in a Model_Measurement which has one conversion
		    'conversion' => array(
		        'key_from' => 'id',
		        'model_to' => 'Model_Conversion',
		        'key_to' => 'measurement_id',
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
		$val->add_field('unit', 'Unit', 'required|max_length[255]');

		return $val;
	}

}
