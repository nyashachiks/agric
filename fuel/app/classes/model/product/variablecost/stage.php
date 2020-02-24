<?php
use Orm\Model;

class Model_Product_Variablecost_Stage extends Model
{
	protected static $_properties = array(
		'id',
		'product_variablecost_id',
		'stage_id',
		'created_at',
		'updated_at',
	);
protected static $_has_one = array(
		    'stage' => array(
		        'key_from' => 'stage_id',
		        'model_to' => 'Model_Stage',
		        'key_to' => 'id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    ),
		    'Product_Variablecost' => array(
		        'key_from' => 'product_variablecost_id',
		        'model_to' => 'Model_Product_Variablecost',
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
		$val->add_field('product_variablecost_id', 'Product Variablecost Id', 'required|valid_string[numeric]');
		$val->add_field('stage_id', 'Stage Id', 'required|valid_string[numeric]');

		return $val;
	}

}
