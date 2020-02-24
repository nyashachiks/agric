<?php
use Orm\Model;

class Model_Contract extends Model
{
	protected static $_properties = array(
		'id',
		'contractapplication_id',
		'contractor_id',
		'loan_amount',
		'balance_brought_forward',
		'amount_paid',
		'balance_carried_forward',
		'date_paid',
		'status',
		'comment',
		'created_at',
		'updated_at',
	);
	protected static $_belongs_to = array(
			// in a Model_Contract which belongs to a seasonfarming
		    'contractapplication' => array(
		        'key_from' => 'contractapplication_id',
		        'model_to' => 'Model_Contractapplication',
		        'key_to' => 'id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    ),
		    // in a Model_Contract which belongs to a contractor
		    'contractor' => array(
		        'key_from' => 'contractor_id',
		        'model_to' => 'Model_User',
		        'key_to' => 'id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    ),
	  );
	protected static $_has_many = array(
	   // in a Model_Contract which has many stoporders
		    'stoporders' => array(
		        'key_from' => 'id',
		        'model_to' => 'Model_Stoporder',
		        'key_to' => 'contract_id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    ),
		    );
	protected static $_has_one = array(
	   // in a Model_Contract which has one seasonfarming
		    'seasonfarming' => array(
		        'key_from' => 'id',
		        'model_to' => 'Model_Seasonfarming',
		        'key_to' => 'contract_id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    ),
			
			'so' => array(
				'model_to' => 'Model_SO',
				'key_from' => 'id',
				'key_to' => 'contract_id',
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
		$val->add_field('contractapplication_id', 'Contractapplication Id', 'required|valid_string[numeric]');
		$val->add_field('contractor_id', 'Contractor Id', 'required|valid_string[numeric]');
		$val->add_field('loan_amount', 'Loan Amount', 'required');
		$val->add_field('balance_brought_forward', 'Balance Brought Forward', 'required');
		$val->add_field('amount_paid', 'Amount Paid', 'required');
		$val->add_field('balance_carried_forward', 'Balance Carried Forward', 'required');
		$val->add_field('date_paid', 'Date Paid', 'required');
		$val->add_field('status', 'Status', 'required|max_length[255]');
		$val->add_field('comment', 'Comment', 'required|max_length[255]');


		return $val;
	}

}
