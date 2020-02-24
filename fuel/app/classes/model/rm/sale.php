<?php
use Orm\Model;

class Model_Rm_Sale extends Model
{
	protected static $_properties = array(
		'id',
		'rm_offer_id',
		'buyer_id',
		'price',
		'quantity',
		'total',
		'created_at',
		'updated_at',
	);
	protected static $_belongs_to = array(
			
		    // in a Model_Rm_Sale which belongs to a rawmaterial_offer
		    'rawmaterial_offer' => array(
		        'key_from' => 'rm_offer_id',
		        'model_to' => 'Model_Rawmaterial_Offer',
		        'key_to' => 'id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    ),
		     // in a Model_Rm_Sale which belongs to a buyer
		    'buyer' => array(
		        'key_from' => 'buyer_id',
		        'model_to' => 'Model_User',
		        'key_to' => 'id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    )
	);
	protected static $_has_one = array(
		 // in a Model_Rm_Sale which has one rm_transaction
		    'rm_transaction' => array(
		        'key_from' => 'id',
		        'model_to' => 'Model_Rm_Transaction',
		        'key_to' => 'rm_sale_id',
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
		$val->add_field('rm_offer_id', 'Rm Offer Id', 'required|valid_string[numeric]');
		$val->add_field('buyer_id', 'Buyer Id', 'required|valid_string[numeric]');
		$val->add_field('price', 'Price', 'required');
		$val->add_field('quantity', 'Quantity', 'required');
		$val->add_field('total', 'Total', 'required');

		return $val;
	}

}
