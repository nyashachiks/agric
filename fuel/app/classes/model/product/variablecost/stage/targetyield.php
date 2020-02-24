<?php
use Orm\Model;

class Model_Product_Variablecost_Stage_Targetyield extends Model
{
	protected static $_properties = array(
		'id',
		'value',
		'targetyield_id',
		'product_variablecost_stage_id',
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

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('value', 'Value', 'required');
		$val->add_field('targetyield_id', 'Targetyield Id', 'required|valid_string[numeric]');
		$val->add_field('product_variablecost_stage_id', 'Product Variablecost Stage Id', 'required|valid_string[numeric]');

		return $val;
	}

}
