<?php
use Orm\Model;

class Model_Structure extends Model
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
	// in a Model_Address which belong to a city
	protected static $_belongs_to = array(
	    'city' => array(
	        'key_from' => 'city_id',
	        'model_to' => 'Model_City',
	        'key_to' => 'id',
	        'cascade_save' => true,
	        'cascade_delete' => false,
	    )
	);
	
	/*protected static $_belongs_to = array(
    'groups' => array(
        'key_from' => 'type',
        'model_to' => 'Auth\Model\Auth_Group',
        'key_to' => 'id',
        'cascade_save' => FALSE,
        'cascade_delete' => false,
    )
);*/
	
public static $structure= array(
		-100=>"--Please select--",
		100=> "Head Office",
		90=> "Provincial Office",
		80=>"District Office",
		70=>"School",
		);
	public static function validate($factory,$all=TRUE)
	{
		$val = Validation::forge($factory);
		//$val->add_field('type', 'Type', 'required|numeric_min[0]|valid_string[numeric]');
		//$val->set_message('numeric_min', "Please select Organisation!");
		if(!$all)
		{
			return $val; //means validation has ended at this stage
		}
		$val->add_field('name', 'Name', 'required|max_length[255]');
		
		
		return $val;
	}


}
