<?php
use Orm\Model;

class Model_Product_Variablecost extends Model
{
	protected static $_properties = array(
		'id',
		'product_id',
		'variablecost_id',
		'created_at',
		'updated_at',
	);
	protected static $_has_one = array(
		    'variablecost' => array(
		        'key_from' => 'variablecost_id',
		        'model_to' => 'Model_Variablecost',
		        'key_to' => 'id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    ),
		    'product' => array(
		        'key_from' => 'product_id',
		        'model_to' => 'Model_Product',
		        'key_to' => 'id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    )
		);
		 protected static $_has_many = array(
			// in a Model_Product which has many diseases
		    'Product_Variablecost_Stages' => array(
		        'key_from' => 'id',
		        'model_to' => 'Model_Product_Variablecost_Stage',
		        'key_to' => 'product_variablecost_id',
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
		$val->add_field('product_id', 'Product Id', 'required|valid_string[numeric]');
		$val->add_field('variablecost_id', 'Variablecost Id', 'required|valid_string[numeric]');

		return $val;
	}

}
