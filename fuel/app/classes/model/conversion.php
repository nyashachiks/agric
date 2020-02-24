<?php
use Orm\Model;

class Model_Conversion extends Model
{
	protected static $_properties = array(
		'id',
		'name',
		'quantity',
		'measurement_id',
		'created_at',
		'updated_at',
	);
	protected static $_belongs_to = array(
		// in a Model_Conversion which belongs to a measurement
		    'measurement' => array(
		        'key_from' => 'measurement_id',
		        'model_to' => 'Model_Measurement',
		        'key_to' => 'id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
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
	
	public static function get_select_options($product_id, $add_empty = null)
	{
		
		if(is_null($add_empty))
		{
			$teachers = array();
		}
		else
		{
			$teachers = array(-1 => $add_empty);
		}
		
		//then we get the measurement id
		$product = Model_Product::find($product_id);
		if(is_null($product)) return array();
		
		//then we get the conversions that are linked to the selected meaurement id
		$measurement_id =  $product->measurement_id;
		$query = Model_Conversion::query()
				 ->where('measurement_id', $measurement_id)
				 ->get();
		
		//boom, bap!
		foreach($query as $teacher)
		{
			$teachers = $teachers + array($teacher['quantity'] => $teacher['name']);
		}
		
		return $teachers;
	}

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('name', 'Name', 'required|max_length[255]');
		$val->add_field('quantity', 'Quantity', 'required');
		$val->add_field('measurement_id', 'Measurement Id', 'required|valid_string[numeric]');

		return $val;
	}

}
