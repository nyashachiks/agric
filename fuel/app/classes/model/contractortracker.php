<?php
use Orm\Model;

class Model_Contractortracker extends Model
{
	protected static $_properties = array(
		'id',
		'contracttracker_id',
		'notes',
		'date',
		'status',
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
		$val->add_field('contracttracker_id', 'Contracttracker Id', 'required|valid_string[numeric]');
		$val->add_field('notes', 'Notes', 'required');
		//$val->add_field('date', 'Date', 'required|valid_string[numeric]');
		$val->add_field('status', 'Status', 'required|max_length[255]');

		return $val;
	}

}
