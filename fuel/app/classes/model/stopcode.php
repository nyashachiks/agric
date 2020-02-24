<?php
use Orm\Model;

class Model_Stopcode extends Model
{
	protected static $_properties = array(
		'id',
		'code',
		'vendor',
		'company_code',
		'vendor_name',
		'deduction_rate',
		'description',
		'commission',
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

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('code', 'Code', 'required|max_length[255]');
		$val->add_field('vendor', 'Vendor', 'required|max_length[255]');
		$val->add_field('company_code', 'Company Code', 'required|max_length[255]');
		$val->add_field('vendor_name', 'Vendor Name', 'required|max_length[255]');
		$val->add_field('deduction_rate', 'Deduction Rate', 'required|max_length[255]');
		$val->add_field('description', 'Description', 'required|max_length[255]');
		$val->add_field('commission', 'Commission', 'required|max_length[255]');
		


		return $val;
	}

}
