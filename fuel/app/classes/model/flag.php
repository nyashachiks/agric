<?php
use Orm\Model;
 class Model_Flag extends Model
{
	public static function getAllFlags()
	{
		return DB::select('*')->from('flags')->order_by('id', 'desc')->execute()->as_array();
		
	}
}