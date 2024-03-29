<?php
use Orm\Model;

class Model_Region extends Model
{
	protected static $_properties = array(
		'id',
		'name',
		'description',
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
protected static $_many_many = array(
    'conditions' => array(
        'key_from' => 'id',
        'key_through_from' => 'region_id', 
        'table_through' => 'Region_Conditions', // both models plural without prefix in alphabetical order
        'key_through_to' => 'condition_id', // column 2 from the table in between, should match a users.id
        'model_to' => 'Model_Condtion',
        'key_to' => 'id',
        'cascade_save' => true,
        'cascade_delete' => false,
    )
);
	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('name', 'Name', 'required|max_length[255]');
		$val->add_field('description', 'Description', 'required');

		return $val;
	}

}
