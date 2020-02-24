<?php
use Orm\Model;

class Model_Seasonfarming extends Model
{
	protected static $_properties = array(
		'id',
		'contract_id',
		'expectedyield',
		'actualyield',
		'created_at',
		'updated_at',
	);
	
	protected static $_belongs_to = array(
			// in a Model_Seasonfarming which belongs to a contract
		    'contract' => array(
		        'key_from' => 'contract_id',
		        'model_to' => 'Model_Contract',
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
		$val->add_field('contract_id', 'Contract id', 'required|valid_string[numeric]');
		$val->add_field('expectedyield', 'Expected Yield', 'required');
		$val->add_field('actualyield', 'Actual Yield', 'required');
		$val->add_field('season_id', 'Season Id', 'required|valid_string[numeric]');

		return $val;
	}

}
