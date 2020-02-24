<?php
use Orm\Model;

class Model_Symptom extends Model
{
	protected static $_properties = array(
		'id',
		'description',
		'created_at',
		'updated_at',
	);

	protected static $_has_many = array(
			// in a Model_Symptom which has many diseasesymptoms
		    'diseasesymptoms' => array(
		        'key_from' => 'id',
		        'model_to' => 'Model_Diseasesymptom',
		        'key_to' => 'symptom_id',
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
		$val->add_field('description', 'Description', 'required|max_length[255]');
		//$val->add_field('disease_id', 'Disease Id', 'required|valid_string[numeric]');

		return $val;
	}

}
