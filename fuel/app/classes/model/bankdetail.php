<?php
use Orm\Model;

class Model_Bankdetail extends Model
{
	protected static $_properties = array(
		'id',
		'farmer_id',
		'bank_name',
		'branch_name',
		'account_number',
		'account_name',
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
	    
	    'farmer' => array(
	        'key_from' => 'farmer_id',
	        'model_to' => 'Model_User',
	        'key_to' => 'id',
	        'cascade_save' => true,
	        'cascade_delete' => false,
	    )
	);

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		//$val->add_field('farmer_id', 'Farmer Id', 'required|valid_string[numeric]');
		//$val->add_field('bank_name', 'Bank Name', 'required|max_length[255]');
		//$val->add_field('branch_name', 'Branch Name', 'required|max_length[255]');

		//taking from hidden input text
		/*
		 $val->add_field('branch', 'Bank Branch Code', 'required|max_length[255]');
		$val->add_field('account_number', 'Account Number', 'required|max_length[255]');
		$val->add_field('account_name', 'Account Name', 'required|max_length[255]');

		*/

		return $val;
	}

	public static function get_bankdetails($id = null)
	{

		$bankdetails = Model_Bankdetail::find($id);
		$bank_details = $bankdetails->bank_name;
		return $bank_details;
		//Debug::dump($bank_details);die;
	}

}
