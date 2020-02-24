<?php
use Orm\Model;

class Model_Cocode extends Model
{
	protected static $_properties = array(
		'id',
		'id',
		'co_code',
		'co_name',
		'city',
		'currency',
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
		$val->add_field('id', 'Id', 'required|valid_string[numeric]');
		$val->add_field('co_code', 'Co Code', 'required|max_length[255]');
		$val->add_field('co_name', 'Co Name', 'required|max_length[255]');
		$val->add_field('city', 'City', 'required|max_length[255]');
		$val->add_field('currency', 'Currency', 'required|max_length[255]');

		return $val;
	}

}
