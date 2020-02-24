<?php
use Orm\Model;

class Model_Grade extends Model
{
	protected static $_properties = array(
		'id',
		'name',
		'description',
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
	
	protected static $_has_many = array(
		'grainreceipts' => array(
			'model_to' => 'Model_Grainreceipt',
			'key_from' => 'id',
			'key_to' => 'grade_id',
		),
	);

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('name', 'Name', 'required|max_length[255]');
		$val->add_field('description', 'Description', 'required');
		return $val;
	}

	public static function get_select_options($add_empty = null)
    {
		if(is_null($add_empty))
		{
			$arr = array();
		}
		else
		{
			$arr = array(0 => $add_empty);
		}
		
		$query = Model_Grade::query()->order_by('name', 'asc')->get();
		
		foreach($query as $item)
		{
			$arr += array($item['id'] => $item['name']);
		}
		return $arr;
    }
}
