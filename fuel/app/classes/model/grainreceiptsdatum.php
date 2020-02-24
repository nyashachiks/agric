<?php

class Model_Grainreceiptsdatum extends \Orm\Model
{
	protected static $_properties = array(
		"id" => array(
			"label" => "Id",
			"data_type" => "int",
		),
		"receipt_id" => array(
			"label" => "Receipt id",
			"data_type" => "int",
		),
		"key" => array(
			"label" => "Key",
			"data_type" => "varchar",
		),
		"value" => array(
			"label" => "Value",
			"data_type" => "varchar",
		),
		"created_at" => array(
			"label" => "Created at",
			"data_type" => "int",
		),
		"updated_at" => array(
			"label" => "Updated at",
			"data_type" => "int",
		),
	);
	
	protected static $_table_name = "grainreceiptsdata";

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'property' => 'created_at',
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_update'),
			'property' => 'updated_at',
			'mysql_timestamp' => false,
		),
	);

	protected static $_primary_key = array('id');

	protected static $_many_many = array(
	);

	protected static $_has_one = array(
	);

	protected static $_belongs_to = array(
	
		'receipt' => array(
			'model_to' => "Model_Grainreceipt",
			'key_from' => 'receipt_id',
			'key_to' => 'id'
		),
	);

}
