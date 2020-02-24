<?php
class Model_Testjo extends Model_Crud
{
	protected static $_table_name = 'testjos';
	
	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('name', 'Name', 'required|max_length[255]');
		$val->add_field('id', 'Id', 'required|valid_string[numeric]');
		$val->add_field('address', 'Address', 'required|max_length[255]');

		return $val;
	}

}
