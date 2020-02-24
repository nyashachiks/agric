<?php
use Orm\Model;

class Model_Stage extends Model
{
	protected static $_properties = array(
		'id',
		'name',
		'created_at',
		'updated_at',
	);
 protected static $_has_many = array(
			// in a Model_Product which has many diseases
		    'Product_Variablecost_Stages' => array(
		        'key_from' => 'id',
		        'model_to' => 'Model_Product_Variablecost_Stage',
		        'key_to' => 'stage_id',
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
		$val->add_field('name', 'Name', 'required');

		return $val;
	}

}
