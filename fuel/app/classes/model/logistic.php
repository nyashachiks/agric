<?php
use Orm\Model;

class Model_Logistic extends Model
{
	protected static $_properties = array(
		'id',
		'equipmentname',
		'capacity',
		'rateperhour',
		'description',
		'supplier_id',
		'created_at',
		'updated_at',
	);
	protected static $_conditions = array(
		'order_by' => array('id' => 'desc')
	);
	
	
	protected static $_belongs_to = array(
			// in a Model_Logistic which belongs to a supplier
		    'supplier' => array(
		        'key_from' => 'supplier_id',
		        'model_to' => 'Model_User',
		        'key_to' => 'id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
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

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('equipmentname', 'Equipmentname', 'required|max_length[255]');
		$val->add_field('capacity', 'Capacity', 'required');
		$val->add_field('rateperhour', 'Rateperhour', 'required');
		$val->add_field('description', 'Description', 'required|max_length[255]');
		$val->add_field('supplier_id', 'Supplier Id', 'required|valid_string[numeric]');

		return $val;
	}

}
