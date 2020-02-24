<?php
use Orm\Model;

class Model_Branch extends Model
{
	protected static $_properties = array(
		'id',
		'id',
		'branch_code',
		'bank_name',
		'bank_address',
		'bank_city',
		'branch_name',
		'swift_code',
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
		$val->add_field('branch_code', 'Branch Code', 'required|max_length[255]');
		$val->add_field('bank_name', 'Bank Name', 'required|max_length[255]');
		$val->add_field('bank_address', 'Bank Address', 'required|max_length[255]');
		$val->add_field('bank_city', 'Bank City', 'required|max_length[255]');
		$val->add_field('branch_name', 'Branch Name', 'required|max_length[255]');
		$val->add_field('swift_code', 'Swift Code', 'required|max_length[255]');

		return $val;
	}

}
