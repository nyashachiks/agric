<?php
use Orm\Model;

class Model_Productoffer extends Model
{
	protected static $_properties = array(
		'id',
		'product_id',
		'farmer_id',
		'market_id',
		'price',
		'offer_description',
		'quanity',
		'min_quantity',
		'quantity_left',
		'status',
		'product_status',
		'count',
		'created_at',
		'updated_at',
		'image_name',
	);
	
	protected static $_conditions = array(
		'order_by' => array('id' => 'desc')
	);
	
	protected static $_belongs_to = array(
			// in a Model_Productoffer which belongs to a product
		    'product' => array(
		        'key_from' => 'product_id',
		        'model_to' => 'Model_Product',
		        'key_to' => 'id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    ),
		    // in a Model_Productoffer which belongs to a farmer
		    'farmer' => array(
		        'key_from' => 'farmer_id',
		        'model_to' => 'Model_User',
		        'key_to' => 'id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    ),
		    // in a Model_Productoffer which belongs to a market
		    'market' => array(
		        'key_from' => 'market_id',
		        'model_to' => 'Model_Market',
		        'key_to' => 'id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    )
	);
	
	protected static $_has_many = array(
		 // in a Model_Productoffer which has many sales
		    'sales' => array(
		        'key_from' => 'id',
		        'model_to' => 'Model_Sale',
		        'key_to' => 'productoffer_id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    ),
		    // in a Model_Productoffer which has many bids
		    'bids' => array(
		        'key_from' => 'id',
		        'model_to' => 'Model_Bid',
		        'key_to' => 'productoffer_id',
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
		$val->add_callable('LibValidator');
		
		switch($factory){
			
			case 'create':
				$val->add_field('product_id', 'Product', 'valid_selection');
				$val->add_field('farmer_id', 'Farmer Id', 'required|valid_string[numeric]');
				$val->add_field('market_id', 'Market', 'valid_selection');
				$val->add_field('price', 'Price', 'required|valid_number');
				$val->add_field('offer_description', 'Offer description', 'required|min_length[10]');
				$val->add_field('quanity', 'Quantity', 'required|valid_string[numeric]');
				//$val->add_field('min_quantity', 'Min Quantity', 'required|valid_string[numeric]');
				//$val->add_field('quantity_left', 'Quantity Left', 'required');
				$val->add_field('status', 'Status', 'required');
				$val->add_field('product_status', 'Status', 'required');
				$val->add_field('count', 'Count', 'required');
				$val->add_field('pic_chosen', 'Product picture', 'required');
				return $val;
			break;
			
			case 'edit':
				$val->add_field('product_id', 'Product', 'valid_selection');
				$val->add_field('farmer_id', 'Farmer Id', 'required|valid_string[numeric]');
				$val->add_field('market_id', 'Market', 'valid_selection');
				$val->add_field('price', 'Price', 'required|valid_number');
				//$val->add_field('offer_description', 'Offer description', 'required|min_length[10]');
				$val->add_field('quanity', 'Quantity', 'required|valid_string[numeric]');
				//$val->add_field('min_quantity', 'Min Quantity', 'required|valid_string[numeric]');
				//$val->add_field('quantity_left', 'Quantity Left', 'required');
				$val->add_field('status', 'Status', 'required');
				$val->add_field('product_status', 'Status', 'required');
				$val->add_field('count', 'Count', 'required');
				return $val;
			break;
			
			default:
				$val->add_field('product_id', 'Product Id', 'required|valid_string[numeric]');
				$val->add_field('farmer_id', 'Farmer Id', 'required|valid_string[numeric]');
				$val->add_field('market_id', 'Market Id', 'required|valid_string[numeric]');
				$val->add_field('price', 'Price', 'required|valid_number');
				$val->add_field('offer_description', 'Offer description', 'required|min_length[10]');
				//$val->add_field('quanity', 'Quanity', 'required|valid_string[numeric]');
				//$val->add_field('min_quantity', 'Min Quantity', 'required|valid_string[numeric]');
				//$val->add_field('quantity_left', 'Quantity Left', 'required');
				$val->add_field('status', 'Status', 'required');
				$val->add_field('product_status', 'Status', 'required');
				$val->add_field('count', 'Count', 'required');
				return $val;
			
		}
	}
}
