<?php
use Orm\Model;

class Model_Variablecost extends Model
{
	protected static $_properties = array(
		'id',
		'name',
		'unit', // this is the unit of measure
		'disbursed',
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
			// in a Model_Bid which belongs to a buyer
		    'units' => array(
		        'key_from' => 'unit',
		        'model_to' => 'Model_Unit',
		        'key_to' => 'id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    ));
	protected static $_many_many = array(
    'products' => array(
        'key_from' => 'id',
        'key_through_from' => 'variablecost_id', 
        'table_through' => 'product_variablecosts', // both models plural without prefix in alphabetical order
        'key_through_to' => 'product_id', // column 2 from the table in between, should match a users.id
        'model_to' => 'Model_Product',
        'key_to' => 'id',
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
