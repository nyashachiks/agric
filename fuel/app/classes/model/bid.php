<?php
use Orm\Model;

class Model_Bid extends Model
{
	protected static $_properties = array(
		'id',
		'productoffer_id',
		'buyer_id',
		'price',
		'quantity',
		'total',
		'type',
		'created_at',
		'updated_at',
	);

	protected static $_has_many = array(
		// in a Model_Bid which has many sales
		    'sales' => array(
		        'key_from' => 'id',
		        'model_to' => 'Model_Sale',
		        'key_to' => 'bid_id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    )
		);
	
	protected static $_belongs_to = array(
			// in a Model_Bid which belongs to a buyer
		    'buyer' => array(
		        'key_from' => 'buyer_id',
		        'model_to' => 'Model_User',
		        'key_to' => 'id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    ),
		    // in a Model_Bid which belongs to a productoffer
		    'productoffer' => array(
		        'key_from' => 'productoffer_id',
		        'model_to' => 'Model_Productoffer',
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
		$val->add_field('productoffer_id', 'Productoffer Id', 'required|valid_string[numeric]');
		$val->add_field('buyer_id', 'Buyer Id', 'required|valid_string[numeric]');
		$val->add_field('price', 'Price', 'required');
		$val->add_field('quantity', 'Quantity', 'required');
		$val->add_field('total', 'Total', 'required');
		$val->add_field('type', 'Type', 'required|max_length[255]');

		return $val;
	}

}
