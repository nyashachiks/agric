<?php
use Orm\Model;

class Model_Grading extends Model
{
	protected static $_properties = array(
		'id',
		'inspection_lot',
		'material_id',
		'quality_score',
		'valuation_code',
		'date',
		'plant',
		'quantity',
		'vendor_number',
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
		$val->add_field('inspection_lot', 'Inspection Lot', 'required|max_length[255]');
		$val->add_field('material_id', 'Material Id', 'required|valid_string[numeric]');
		$val->add_field('quality_score', 'Quality Score', 'required|valid_string[numeric]');
		$val->add_field('valuation_code', 'Valuation Code', 'required|max_length[255]');
		$val->add_field('date', 'Date', 'required');
		$val->add_field('plant', 'Plant', 'required|max_length[255]');
		$val->add_field('quantity', 'Quantity', 'required');
		$val->add_field('vendor_number', 'Vendor Number', 'required|max_length[255]');

		return $val;
	}

}
