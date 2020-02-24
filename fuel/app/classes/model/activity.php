<?php
use Orm\Model;

class Model_Activity extends Model
{
	protected static $_properties = array(
		'id',
		'name',
		'budget_id',
		'created_at',
		'updated_at',
	);
	protected static $_belongs_to = array(
			// in a Model_Actvity which belongs to a budget
		    'budget' => array(
		        'key_from' => 'budget_id',
		        'model_to' => 'Model_Budget',
		        'key_to' => 'id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    ),
	  );
	protected static $_has_many = array(
		// in a Model_Activity which has many inputs
		    'inputs' => array(
		        'key_from' => 'id',
		        'model_to' => 'Model_Input',
		        'key_to' => 'activity_id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    ),
		    // in a Model_Activity which has many farmguides
		    'farmguides' => array(
		        'key_from' => 'id',
		        'model_to' => 'Model_Farmguide',
		        'key_to' => 'activity_id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    )
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
		$val->add_field('budget_id', 'Budget Id', 'required|valid_string[numeric]');

		return $val;
	}

}
