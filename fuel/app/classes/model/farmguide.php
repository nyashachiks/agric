<?php
use Orm\Model;

class Model_Farmguide extends Model
{
	protected static $_properties = array(
		'id',
		'activity_id',
		'description',
		'created_at',
		'updated_at',
	);
	
	protected static $_belongs_to = array(
			// in a Model_Farmguide which belongs to an activity
		    'activity' => array(
		        'key_from' => 'activity_id',
		        'model_to' => 'Model_Activity',
		        'key_to' => 'id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    ),
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
		$val->add_field('activity_id', 'Activity Id', 'required|valid_string[numeric]');
		$val->add_field('description', 'Description', 'required|max_length[255]');

		return $val;
	}

}
