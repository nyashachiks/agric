<?php
use Orm\Model;

class Model_Address extends Model
{
	protected static $_properties = array(
		'id',
		'address',
		'province',
		'district',
		'phone',
		'country_id',
		'created_at',
		'updated_at',
	);
	// in a Model_Address which belong to a city
	protected static $_belongs_to = array(
	    'city' => array(
	        'key_from' => 'country_id',
	        'model_to' => 'Model_Address',
	        'key_to' => 'id',
	        'cascade_save' => true,
	        'cascade_delete' => false,
	    ),
	    'country' => array(
	        'key_from' => 'country_id',
	        'model_to' => 'Model_Country',
	        'key_to' => 'id',
	        'cascade_save' => true,
	        'cascade_delete' => false,
	    )
	);
	protected static $_has_one = array(
	    'market' => array(
	        'key_from' => 'id',
	        'model_to' => 'Model_Market',
	        'key_to' => 'address_id',
	        'cascade_save' => true,
	        'cascade_delete' => false,
	    ),
	    );
	// in a Model_Address which has many users
	protected static $_has_many = array(
	    
	    'farms' => array(
	        'key_from' => 'id',
	        'model_to' => 'Model_Farm',
	        'key_to' => 'address_id',
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

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		//$val->add_field('address', 'Address', 'required');//


		//$val->add_field('province', 'Province','valid_string','required');
		//$val->add_field('district', 'District', 'valid_string|max_length[255]');
		//$val->add_field('postal_code', 'Postal Code', 'required|max_length[255]');
		//$val->add_field('mobile', 'Mobile Number', 'required|max_length[255]');

		return $val;
	}
	
	public static function get_districts($add_empty = null)
	{
		
		if(is_null($add_empty))
		{
			$districts = array();
		}
		else
		{
			$districts = array(-1 => $add_empty);
		}
		
		$sql = "select distinct district from addresses order by district asc ";
		$rs = \DB::query($sql)->execute()->as_array();
		
		if(count($rs)){
			foreach($rs as $key => $val){
				if(empty($val['district'])) continue;
				$districts[$val['district']] = $val['district'];
			}
		}
		return $districts;
	}
	public static function get_country($id = null)
	{
		$country = Model_Country::find($id);
		$country_name = $country->country_name;
		return $country_name;
		
		
	}

}
