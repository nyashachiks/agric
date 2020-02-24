<?php
use Orm\Model;

class Model_Dropdown extends Model
{
	protected static $_properties = array(
		'id',
		'name',
		'url',
		'mainmenu_id',
		'visible',
		'position',
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
protected static $_belongs_to = array(
	    'mainmenu' => array(
	        'key_from' => 'mainmenu_id',
	        'model_to' => 'Model_Mainmenu',
	        'key_to' => 'id',
	        'cascade_save' => true,
	        'cascade_delete' => false,
	    )
	);
	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('name', 'Name', 'required|max_length[255]');
		$val->add_field('url', 'Url', 'required');

		return $val;
	}

}
