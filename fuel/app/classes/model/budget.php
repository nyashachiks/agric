<?php
use Orm\Model;

class Model_Budget extends Model
{
	protected static $_properties = array(
		'id',
		'name',
		'product',
		'region',
		'soiltype',
		'user_id',
		'created_at',
		'updated_at',
	);
	protected static $_belongs_to = array(
			// in a Model_Budget which belongs to a user
		    'user' => array(
		        'key_from' => 'user_id',
		        'model_to' => 'Model_User',
		        'key_to' => 'id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    ),
	  );
	protected static $_has_many = array(
		// in a Model_Budget which has many activities
		    'activities' => array(
		        'key_from' => 'id',
		        'model_to' => 'Model_Activity',
		        'key_to' => 'budget_id',
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
		$val->add_field('product', 'Product', 'required|max_length[255]');
		$val->add_field('region', 'Region', 'required|max_length[255]');
		$val->add_field('soiltype', 'Soiltype', 'required|max_length[255]');
		$val->add_field('user_id', 'User Id', 'required|valid_string[numeric]');

		return $val;
	}

}
