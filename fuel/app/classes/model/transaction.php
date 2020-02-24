<?php
use Orm\Model;

class Model_Transaction extends Model
{
	protected static $_properties = array(
		'id',
		'sale_id',
		'amount',
		'narrative',
		'status',
		'browseurl',
		'pollurl',
		'paynowref',
		'paymentstatus',
		'mobile',
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
			// in a Model_Transaction which belongs to a sale
		    'sale' => array(
		        'key_from' => 'sale_id',
		        'model_to' => 'Model_Sale',
		        'key_to' => 'id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    )
	);
	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('sale_id', 'Sale Id', 'required|valid_string[numeric]');
		$val->add_field('amount', 'Amount', 'required');
		$val->add_field('narrative', 'Narrative', 'required');
		$val->add_field('status', 'Status', 'required|max_length[255]');
		$val->add_field('browseurl', 'Browseurl', 'required|max_length[255]');
		$val->add_field('pollurl', 'Pollurl', 'required|max_length[255]');
		$val->add_field('paynowref', 'Paynowref', 'required|max_length[255]');
		$val->add_field('paymentstatus', 'Paymentstatus', 'required|max_length[255]');
		$val->add_field('mobile', 'Mobile', 'required|max_length[255]');

		return $val;
	}

}
