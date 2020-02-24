<?php
use Orm\Model;

class Model_Vid extends Model
{
	protected static $_properties = array(
		'id',
		'national_id',
		'details',
		'license_type',
		'amount',
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
		$val->add_field('national_id', 'National Id', 'required|max_length[255]');
		$val->add_field('details', 'Details', 'required|max_length[255]');
		$val->add_field('license_type', 'License Type', 'required|max_length[255]');
		$val->add_field('amount', 'Amount', 'required');

		return $val;
	}

}
