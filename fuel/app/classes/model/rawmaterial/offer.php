<?php
use Orm\Model;

class Model_Rawmaterial_Offer extends Model
{
	protected static $_properties = array(
		'id',
		'raw_material_id',
		'seller_id',
		'brand_name',
		'price',
		'offer_dscription',
		'quantity',
		'quantity_left',
		'status',
		'raw_matrial_status',
		'count',
		'image_name',
		'created_at',
		'updated_at',
	);
	protected static $_conditions = array(
		'order_by' => array('id' => 'desc')
	);
	protected static $_belongs_to = array(
			// in a Model_Rawmaterial_Offer which belongs to a raw_material
		    'raw_material' => array(
		        'key_from' => 'raw_material_id',
		        'model_to' => 'Model_Raw_Material',
		        'key_to' => 'id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    ),
		    // in a Model_Rawmaterial_Offer which belongs to a seller
		    'seller' => array(
		        'key_from' => 'seller_id',
		        'model_to' => 'Model_User',
		        'key_to' => 'id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    )
	);
	protected static $_has_many = array(
		 // in a Model_Rawmaterial_Offer which has many rm_sales
		    'rm_sales' => array(
		        'key_from' => 'id',
		        'model_to' => 'Model_Rm_Sale',
		        'key_to' => 'rm_offer_id',
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
				$val->add_field('raw_material_id', 'Raw Material Id', 'required|valid_string[numeric]');
				$val->add_field('seller_id', 'Seller Id', 'required|valid_string[numeric]');
				$val->add_field('brand_name', 'Brand Name', 'required|max_length[255]');
				$val->add_field('price', 'Price', 'required');
				$val->add_field('offer_dscription', 'Offer Dscription', 'required');
				$val->add_field('quantity', 'Quantity', 'required');
				//$val->add_field('quantity_left', 'Quantity Left', 'required');
				$val->add_field('status', 'Status', 'max_length[255]');
				$val->add_field('raw_matrial_status', 'Raw Material Status', 'max_length[255]');
				$val->add_field('count', 'Count', 'required|valid_string[numeric]');
				$val->add_field('image_name', 'Image Name', 'required|max_length[255]');

				return $val;
						
			break;
			
			case 'edit':
				$val->add_field('raw_material_id', 'Raw Material Id', 'required|valid_string[numeric]');
				$val->add_field('seller_id', 'Seller Id', 'required|valid_string[numeric]');
				$val->add_field('brand_name', 'Brand Name', 'required|max_length[255]');
				$val->add_field('price', 'Price', 'required');
				//$val->add_field('offer_dscription', 'Offer Dscription', 'required');
				$val->add_field('quantity', 'Quantity', 'required');
				//$val->add_field('quantity_left', 'Quantity Left', 'required');
				$val->add_field('status', 'Status', 'max_length[255]');
				$val->add_field('raw_matrial_status', 'Raw Material Status', 'max_length[255]');
				$val->add_field('count', 'Count', 'required|valid_string[numeric]');
				$val->add_field('image_name', 'Image Name', 'required|max_length[255]');
				return $val;
			break;
			
			default:
				$val->add_field('raw_material_id', 'Raw Material Id', 'required|valid_string[numeric]');
				$val->add_field('seller_id', 'Seller Id', 'required|valid_string[numeric]');
				$val->add_field('brand_name', 'Brand Name', 'required|max_length[255]');
				$val->add_field('price', 'Price', 'required');
				$val->add_field('offer_dscription', 'Offer Dscription', 'required');
				//$val->add_field('quantity', 'Quantity', 'required');
				//$val->add_field('quantity_left', 'Quantity Left', 'required');
				$val->add_field('status', 'Status', 'max_length[255]');
				$val->add_field('raw_matrial_status', 'Raw Material Status', 'max_length[255]');
				$val->add_field('count', 'Count', 'required|valid_string[numeric]');
				$val->add_field('image_name', 'Image Name', 'required|max_length[255]');
			
				return $val;
			
		}
	}

}
