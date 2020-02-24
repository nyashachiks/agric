<?php
use Orm\Model;

class Model_Labor extends Model
{
	protected static $_properties = array(
		'id',
		'skill_name',
		'rate',
		'rate_time',
		'description',
		'laborer_id',
		'saved_as',
		'actual_name',
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
	protected static $_belongs_to = array(
			// in a Model_Labor which belongs to a laborer
		    'laborer' => array(
		        'key_from' => 'laborer_id',
		        'model_to' => 'Model_User',
		        'key_to' => 'id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    ),
	  );

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('skill_name', 'Skill Name', 'required|max_length[255]');
		$val->add_field('rate', 'Rate', 'required|valid_string[numeric]');
		$val->add_field('rate_time', 'Rate Time', 'required');
		$val->add_field('saved_as', 'Saved As', 'max_length[255]');
		$val->add_field('actual_name', 'Actual Name', 'max_length[255]');
		$val->add_field('laborer_id', 'Laborer Id', 'required|valid_string[numeric]');
		$val->add_field('description', 'Description', 'required|max_length[255]');

		return $val;
	}

}
