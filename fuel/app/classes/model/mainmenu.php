<?php
use Orm\Model;

class Model_Mainmenu extends Model
{
	protected static $_properties = array(
		'id',
		'name',
		'url',
		'aligned',
		'position',
		'visible',
		'created_at',
		'updated_at',
		'icon' => array('null' => true)
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
	    'dropdowns' => array(
	        'key_from' => 'id',
	        'model_to' => 'Model_Dropdown',
	        'key_to' => 'mainmenu_id',
	        'cascade_save' => true,
	        'cascade_delete' => TRUE,
	    ),
	    );
	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('name', 'Name', 'required|max_length[255]');
		$val->add_field('url', 'Url', 'required');
		//$val->add_field('position', 'Position', 'required|max_length[255]');

		return $val;
	}

}
