<?php
use Orm\Model;

class Model_Country extends Model
{
	protected static $_properties = array(
		'id',
		'country_code',
		'country_name',
		'created_at',
		'updated_at',
	);
	// in a Model_Country which has many cities
	protected static $_has_many = array(
	    'cities' => array(
	        'key_from' => 'id',
	        'model_to' => 'Model_Address',
	        'key_to' => 'country_id',
	        'cascade_save' => true,
	        'cascade_delete' => false,
	    ),
	   
	    'addresses' => array(
	        'key_from' => 'id',
	        'model_to' => 'Model_Address',
	        'key_to' => 'country_id',
	        'cascade_save' => true,
	        'cascade_delete' => false,
	    )
	);
	
	protected static $_has_one = array(
		'address' => array(
			'model_to' => 'Model_Address',
			'key_from' => 'id',
			'key_to' => 'country_id'
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
		$val->add_field('country_name', 'Country', 'required|max_length[255]');
		$val->add_field('country_code', 'Country', 'required|max_length[255]');

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
        
        $query = Model_Country::query()->order_by('country_name','asc')->get();
        foreach($query as $item)
        {
                        $arr = $arr + array($item['id'] => $item['country_name']);               
        }
        
        return $arr;
                    
    }

}
