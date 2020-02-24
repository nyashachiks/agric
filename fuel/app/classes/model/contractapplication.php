<?php
use Orm\Model;

class Model_Contractapplication extends Model
{
	protected static $_properties = array(
		'id',
		'farm_id',
		'farmer_id',
		'season_id',
		'year',
		'product_id',
		'project_id',
		'size',
		'measure_unit',
		'status',
		'created_at',
		'updated_at',
	);
	
	protected static $_conditions = array(
		'order_by' => array('id' => 'desc')
	);
	
	protected static $_belongs_to = array(
			// in a Model_Contractapplication which belongs to a season
		    'season' => array(
		        'key_from' => 'season_id',
		        'model_to' => 'Model_Season',
		        'key_to' => 'id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    ),
		    // in a Model_Contractapplication which belongs to a farm
		    'farm' => array(
		        'key_from' => 'farm_id',
		        'model_to' => 'Model_Farm',
		        'key_to' => 'id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    ),
		    // in a Model_Contractapplication which belongs to a farm
		    'farmer' => array(
		        'key_from' => 'farmer_id',
		        'model_to' => 'Model_User',
		        'key_to' => 'id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    ),
		    // in a Model_Contractapplication which belongs to a product
		    'product' => array(
		        'key_from' => 'product_id',
		        'model_to' => 'Model_Product',
		        'key_to' => 'id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    ),
	  );
	  
	  protected static $_has_one = array(
		  'contract' => array(
			        'key_from' => 'id',
			        'model_to' => 'Model_Contract',
		        'key_to' => 'contractapplication_id'
		    ),
		    'project' => array(
			        'key_from' => 'project_id',
			        'model_to' => 'Model_Project',
		        'key_to' => 'id'
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
		$val->add_callable('LibValidator');
		
		$val->add_field('farm_id', 'Farm', 'valid_selection');
		$val->add_field('farmer_id', 'Farmer Id', 'required|valid_string[numeric]');
		$val->add_field('season_id', 'Season', 'valid_selection');
		$val->add_field('year', 'Year', 'required');
		$val->add_field('product_id', 'Product', 'valid_selection');
		$val->add_field('size', 'Size', 'required');
		$val->add_field('measure_unit', 'Measure Unit', 'valid_selection');
		$val->add_field('status', 'Status', 'required|max_length[255]');

		return $val;
	}

}
