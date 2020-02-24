<?php
use Orm\Model;

class Model_Rm_Transaction extends Model
{
	protected static $_properties = array(
		'id',
		'rm_sale_id',
		'amount',
		'narrative',
		'status',
		'browse_url',
		'poll_url',
		'paynow_ref',
		'payment_status',
		'mobile',
		'created_at',
		'updated_at',
	);

	protected static $_belongs_to = array(
			// in a Model_Rm_Transaction which belongs to a rm_sale
		    'rm_sale' => array(
		        'key_from' => 'rm_sale_id',
		        'model_to' => 'Model_Rm_Sale',
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
		$val->add_field('rm_sale_id', 'Rm Sale Id', 'required|valid_string[numeric]');
		$val->add_field('amount', 'Amount', 'required');
		$val->add_field('narrative', 'Narrative', 'required');
		$val->add_field('status', 'Status', 'required|max_length[255]');
		$val->add_field('browse_url', 'Browse Url', 'required|max_length[255]');
		$val->add_field('poll_url', 'Poll Url', 'required|max_length[255]');
		$val->add_field('paynow_ref', 'Paynow Ref', 'required|max_length[255]');
		$val->add_field('payment_status', 'Payment Status', 'required|max_length[255]');
		$val->add_field('mobile', 'Mobile', 'required|max_length[255]');

		return $val;
	}

}
