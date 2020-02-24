<?php
use Orm\Model;

class Model_SO extends Model
{
	protected static $_table_name = "stoporders";
	
	protected static $_properties = array(
		'id',
		'applied_by',
		'request_date',
		'contract_id',
		'approval_status',
		'processed_by',
		'approval_date',
		'created_at',
		'updated_at',
		'comment' => array('null' => true),
		'doc_name' => array('null' => true)
	);
	
	protected static $_belongs_to = array(
		'contract' => array(
			'model_to' => 'Model_Contract',
			'key_from' => 'contract_id',
			'key_to' => 'id',
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
	
}
