<?php
use Orm\Model;

class Model_Document extends Model
{
	protected static $_properties = array(
		'id',
		'user_id',
		'description',
		'saved_as',
		'actual_name',
		'created_at',
		'updated_at',
	);
	protected static $_belongs_to = array(
			// in a Model_Logistic which belongs to a supplier
		    'user' => array(
		        'key_from' => 'user_id',
		        'model_to' => 'Model_User',
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
		$val->add_field('user_id', 'User Id', 'required|valid_string[numeric]');
		$val->add_field('description', 'Description', 'required');
		//$val->add_field('saved_as', 'Saved As', 'required|max_length[255]');
		//$val->add_field('actual_name', 'Actual Name', 'required|max_length[255]');

		return $val;
	}

}
