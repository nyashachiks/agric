<?php
use Orm\Model;

class Model_Sm extends Model
{
	protected static $_properties = array(
		'id',
		'username',
		'sender_id',
		'recipients',
		'body',
		'sending_number',
		'message_id',
		'created_at',
		'updated_at',
	);
	
	protected static $_belongs_to = array(
	    'sender' => array(
	        'key_from' => 'sender_id',
	        'model_to' => 'Model_User',
	        'key_to' => 'id',
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
		$val->add_field('username', 'Username', 'required|max_length[255]');
		$val->add_field('sender_id', 'Sender Id', 'required|valid_string[numeric]');
		$val->add_field('recipients', 'Recipients', 'required');
		$val->add_field('body', 'Body', 'required');
		$val->add_field('sending_number', 'Sending Number', 'required|max_length[255]');
		$val->add_field('message_id', 'Message Id', 'required|max_length[255]');

		return $val;
	}

}
