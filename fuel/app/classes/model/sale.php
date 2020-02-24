<?php
use Orm\Model;

class Model_Sale extends Model
{
	protected static $_properties = array(
		'id',
		'productoffer_id',
		'bid_id',
		'status',
		'amount',
		'created_at',
		'updated_at',
	);

	protected static $_belongs_to = array(
			// in a Model_Sale which belongs to a bid
		    'bid' => array(
		        'key_from' => 'bid_id',
		        'model_to' => 'Model_Bid',
		        'key_to' => 'id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    ),
		    // in a Model_Sale which belongs to a productoffer
		    'productoffer' => array(
		        'key_from' => 'productoffer_id',
		        'model_to' => 'Model_Productoffer',
		        'key_to' => 'id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    )
	);
	
	protected static $_has_one = array(
		 // in a Model_Sale which has one transaction
		    'transaction' => array(
		        'key_from' => 'id',
		        'model_to' => 'Model_Transaction',
		        'key_to' => 'sale_id',
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
		$val->add_field('bid_id', 'Bid Id', 'required|valid_string[numeric]');
		$val->add_field('status', 'Status', 'required|max_length[255]');
		$val->add_field('amount', 'Amount', 'required');

		return $val;
	}

}
