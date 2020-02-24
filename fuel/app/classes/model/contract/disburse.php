<?php
use Orm\Model;

class Model_Contract_Disburse extends Model
{
	protected static $_properties = array(
		'id',
		'contractquantities_id',
		'userdisbursed',
		'date',
		'quantities',
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
		$val->add_field('contractquantities_id', 'Contractquantities Id', 'required|valid_string[numeric]');
		$val->add_field('userdisbursed', 'Userdisbursed', 'required|valid_string[numeric]');
		$val->add_field('date', 'Date', 'required');
		$val->add_field('quantities', 'Quantities', 'required');

		return $val;
	}

}
