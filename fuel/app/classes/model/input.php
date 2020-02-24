<?php
use Orm\Model;

class Model_Input extends Model
{
	protected static $_properties = array(
		'id',
		'name',
		'activity_id',
		'unit',
		'cost_per_unit',
		'quantity',
		'total_cost',
		'created_at',
		'updated_at',
	);
	protected static $_belongs_to = array(
			// in a Model_Input which belongs to an activity
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
		$val->add_field('name', 'Name', 'required|max_length[255]');
		$val->add_field('activity_id', 'Activity Id', 'required|valid_string[numeric]');
		$val->add_field('unit', 'Unit', 'required');
		$val->add_field('cost_per_unit', 'Cost Per Unit', 'required');
		$val->add_field('quantity', 'Quantity', 'required');
		$val->add_field('total_cost', 'Total Cost', 'required');

		return $val;
	}

}
