<?php
use Orm\Model;

class Model_Permit extends Model
{
	protected static $_properties = array(
		'id',
		'applicant_id',
		'doc_name',
		'status',
		'commodity',
		'comment',
		'certification',
		'qty_applied',
		'qty_approved',
		'approv_date',
		'approv_user_id',
		'measurement_id',
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
	
	protected static $_conditions = array(
		'order_by' => array('id' => 'desc')
	);
	
	protected static $_belongs_to = array(
		'user' => array(
			'model_to' => 'Model_User',
			'key_from' => 'applicant_id',
			'key_to' => 'id' 
		),
		'measurement' => array(
			'model_to' => 'Model_Measurement',
			'key_from' => 'measurement_id',
			'key_to' => 'id'
		)
	);

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_callable('LibValidator');
		
		switch($factory)
		{
			case 'create':
				$val->add_field('commodity', 'Commodity', 'required|max_length[100]');
				$val->add_field('qty_applied', 'Quantity applied for', 'required|valid_number');
				$val->add_field('measurement_id', 'Measurement unit', 'valid_selection');
				$val->add_field('certification', 'Certification', 'valid_selection');
			break;
			
			case 'edit':
				$val->add_field('measurement_id', 'Measurement unit', 'valid_selection');
			break;
			
			case 'approv':
				$val->add_field('comment', 'Comment', 'required');
				$val->add_field('qty_approved', 'Quantity approved', 'required|valid_number');
				$val->add_field('status', 'Approval status', 'valid_selection');
			break;
			
			default:
				$val->add_field('doc_hash', 'Doc Hash', 'required|max_length[100]');
			
		}
		return $val;
	}

}
