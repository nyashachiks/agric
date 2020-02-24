<?php
use Orm\Model;

class Model_Season extends Model
{
	protected static $_properties = array(
		'id',
		'name',
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

 	protected static $_has_many = array(
		// in a Model_Season which has many seasonfarmings
		    'seasonfarmings' => array(
		        'key_from' => 'id',
		        'model_to' => 'Model_Seasonfarming',
		        'key_to' => 'season_id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    ),
		    // in a Model_Season which has many contractapplications
		    'contractapplications' => array(
		        'key_from' => 'id',
		        'model_to' => 'Model_Contractapplication',
		        'key_to' => 'season_id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    )
		);
	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('name', 'Name', 'required|max_length[255]');

		return $val;
	}

}