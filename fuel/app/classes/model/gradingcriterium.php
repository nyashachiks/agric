<?php
use Orm\Model;

class Model_Gradingcriterium extends Model
{
	protected static $_properties = array(
		'id',
		'crit_name',
		'short_name',
		'created_at',
		'updated_at',
	);
	
	protected static $_table_name = "gradingcriterias";

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
		$val->add_field('crit_name', 'Crit Name', 'required|max_length[255]');
		$val->add_field('short_name', 'Short Name', 'required|max_length[255]');

		return $val;
	}

}
