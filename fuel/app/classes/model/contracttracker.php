<?php
use Orm\Model;

class Model_Contracttracker extends Model
{
	protected static $_properties = array(
		'id',
		'project_stage_task_id',
		'enddate',
		'notes',
		'picture',
		'picture_saved_as',
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
		//$val->add_field('contract_id', 'Contract Id', 'required|valid_string[numeric]');
		//$val->add_field('enddate', 'Enddate', 'required|valid_string[numeric]');
		$val->add_field('notes', 'Notes', 'required');
		//$val->add_field('picture', 'Picture', 'required|max_length[255]');

		return $val;
	}

}
