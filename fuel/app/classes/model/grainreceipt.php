<?php
use Orm\Model;

class Model_Grainreceipt extends Model
{
	protected static $_properties = array(
		'id',
		'farmer_id',
		'grain_id',
		'qty',
		'grade_id',
		'value',
		'received_by',
		'created_at',
		'updated_at',
	);
	
	protected static $_conditions = array(
		'order_by' => array(
			'id' => 'desc'
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
	
	protected static $_belongs_to = array(
		'grain' => array(
			'model_to' => 'Model_Grain',
			'key_to' => 'id',
			'key_from' => 'grain_id'
		),
		'grade' => array(
			'model_to' => 'Model_Grade',
			'key_to' => 'id',
			'key_from' => 'grade_id'
		),
		'grainreceiptdata' => array(
			'model_to' => 'Model_Grainreceiptsdatum',
			'key_from' => 'id',
			'key_to' => 'receipt_id'
		),
	);
	
	protected static $_has_many = array(
		'receiptdata' => array(
			'model_to' => 'Model_Grainreceiptsdatum',
			'key_from' => 'id',
			'key_to' => 'receipt_id'
		),
	);
	
	protected static $_eav = array(
		'receiptdata' => array(
			'model_to' => 'Model_Grainreceiptsdatum',
			'attribute' => 'key',
			'value'		=> 'value',
		),
	
	);
	
	

	public static function validate($factory)
	{
	
		$val = Validation::forge($factory);
		$val->add_callable('LibValidator');
		switch(strtolower($factory)){
			case 'create':
				$val->add_field('farmer_id', 'Farmer name' ,'valid_selection');
				$val->add_field('grain_id', 'Grain', 'valid_selection');
				$val->add_field('qty', 'Quantity', 'required|max_length[255]');
				$val->add_field('grade_id', 'Grade', 'valid_selection');
				$val->add_field('value', 'Value', 'required|max_length[255]');
			break ;
		
			case 'edit':
		
				$val->add_field('farmer_id', 'Farmer name', 'valid_selection');
				$val->add_field('grain_id', 'Grain', 'valid_selection');
				$val->add_field('qty', 'Quantity', 'required|max_length[255]');
				$val->add_field('grade_id', 'Grade', 'valid_selection');
				$val->add_field('value', 'Value', 'required|max_length[255]');
			break ;
		}
		return $val;
	}
}
