<?php
use Orm\Model;

class Model_Stakeholder_Product extends Model
{
	protected static $_properties = array(
		'id',
		'tradingname',
		'name',
		'description',
		'pic',
		'userid',
		'additional_details',
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
		$val->add_field('name', 'Name', 'required|max_length[255]');
		$val->add_field('description', 'Description', 'required');
		//$val->add_field('pic', 'Pic', 'required|max_length[255]');
		$val->add_field('additional_details', 'Additional Details', 'required');

		return $val;
	}

}
