<?php
use Orm\Model;

class Model_Region_Condition_Product extends Model
{
	protected static $_properties = array(
		'id',
		'region_id_condition_id',
		'product_id',
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
		$val->add_field('region_condition_id', 'Region Condition Id', 'required|valid_string[numeric]');
		$val->add_field('product_id', 'Product Id', 'required|valid_string[numeric]');

		return $val;
	}

}
