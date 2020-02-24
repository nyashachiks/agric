<?php
class Model_Stoporder extends Model_Crud
{
	protected static $_table_name = 'stoporders';
	
	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('company_code', 'Company Code', 'required|max_length[255]');
		//$val->add_field('stop_order_number', 'Stop Order Number', 'required|max_length[255]');
		$val->add_field('code', 'Code', 'required|max_length[255]');
		$val->add_field('farmer_name', 'Farmer Name', 'required|max_length[255]');
		$val->add_field('farmer_number', 'Farmer Number', 'required|max_length[255]');
		$val->add_field('farmer_id', 'Farmer Id', 'required|max_length[255]');
		$val->add_field('material_number', 'Material Number', 'required|max_length[255]');
		$val->add_field('max_amount', 'Max Amount', 'required');

		return $val;
	}

}
