<?php
use Orm\Model;

class Model_Correctivemeasure extends Model
{
	protected static $_properties = array(
		'id',
		'description',
		'disease_id',
		'created_at',
		'updated_at',
	);
	
	protected static $_belongs_to = array(
			// in a Model_Correctivemeasure which belongs to a disease
		    'disease' => array(
		        'key_from' => 'disease_id',
		        'model_to' => 'Model_Disease',
		        'key_to' => 'id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    ));

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
		$val->add_field('description', 'Description', 'required');
		$val->add_field('disease_id', 'Disease Id', 'required|valid_string[numeric]');

		return $val;
	}

}
