<?php
use Orm\Model;

class Model_Product extends Model
{
	protected static $_properties = array(
		'id',
		'name',
		'measurement_id',
		'producttype_id',
		'created_at',
		'updated_at',
	);
	
		protected static $_belongs_to = array(
			// in a Model_Product which belongs to a producttype
		    'producttype' => array(
		        'key_from' => 'producttype_id',
		        'model_to' => 'Model_Producttype',
		        'key_to' => 'id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    ),
		    // in a Model_Product which belongs to a measurement
		    'measurement' => array(
		        'key_from' => 'measurement_id',
		        'model_to' => 'Model_Measurement',
		        'key_to' => 'id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    )
	    );
	    
	    protected static $_has_one = array(
			// in a Model_Product which has one productoffer
		    'productoffer' => array(
		        'key_from' => 'id',
		        'model_to' => 'Model_Productoffer',
		        'key_to' => 'product_id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    ),
			// in a Model_Product which has one farm
		    'farm' => array(
		        'key_from' => 'id',
		        'model_to' => 'Model_Farm',
		        'key_to' => 'product_id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    )
		);
		 protected static $_has_many = array(
			// in a Model_Product which has many diseases
		    'diseases' => array(
		        'key_from' => 'id',
		        'model_to' => 'Model_Disease',
		        'key_to' => 'product_id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    ),
		    
		    'products' => array(
		    	'key_from' => 'id',
		        'model_to' => 'Model_Productoffer',
		        'key_to' => 'product_id',
		    ),
		// in a Model_Product which has many seasonfarmings
		    'seasonfarmings' => array(
		        'key_from' => 'id',
		        'model_to' => 'Model_Seasonfarming',
		        'key_to' => 'product_id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    ),
		     // in a Model_Product which has many contractapplications
		    'contractapplications' => array(
		        'key_from' => 'id',
		        'model_to' => 'Model_Contractapplication',
		        'key_to' => 'product_id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
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
		$val->add_field('name', 'Name', 'required|max_length[255]');
		$val->add_field('measurement_id', 'Measurement Id', 'required|valid_string[numeric]');
		$val->add_field('producttype_id', 'Producttype Id', 'required|valid_string[numeric]');

		return $val;
	}
	
	public static function get_product_name($id = null)
	{
		if(is_null($id)) return "";
		
		//get the product name
		$prod = Model_Product::find($id);
		if(empty($prod)) return "";
		return $prod->name;
	}
	public static function getTotalQuantityBidded($productname)
	{
		$query=DB::select()->from('view_gettotalquantitybidded')->order_by('bidmonth')
		->where('name','like',$productname.'%')
		->execute()->as_array();
		// query('select * from view_gettotalquantitybidded')->execute()->as_array();
		return $query;
		
	}
	public static function getProductCount()
	{
		$query=DB::query('select distinct name from view_gettotalquantitybidded')
		->execute()->as_array();
		
		return count($query);
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
        
        $query = Model_Product::query()->order_by('name','asc')->get();
        foreach($query as $item)
        {
                        $arr = $arr + array($item['id'] => $item['name']);               
        }
        
        return $arr;
                    
    }

}
