<?php
use Orm\Model;

class Model_Disease extends Model
{
	protected static $_properties = array(
		'id',
		'name',
		'description',
		'product_id',
		'image_name',
		'created_at',
		'updated_at',
	);

	protected static $_belongs_to = array(
			// in a Model_Disease which belongs to a product
		    'product' => array(
		        'key_from' => 'product_id',
		        'model_to' => 'Model_Product',
		        'key_to' => 'id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    ));
	 protected static $_has_many = array(
			// in a Model_Symptom which has many diseasesymptoms
		    'diseasesymptoms' => array(
		        'key_from' => 'id',
		        'model_to' => 'Model_Diseasesymptom',
		        'key_to' => 'disease_id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    ),
		    // in a Model_Correctivemeasure which has many symptoms
		    'correctivemeasures' => array(
		        'key_from' => 'id',
		        'model_to' => 'Model_Correctivemeasure',
		        'key_to' => 'disease_id',
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
		$val->add_field('name', 'Name', 'required|max_length[255]');
		$val->add_field('description', 'Description', 'required|max_length[255]');
		$val->add_field('product_id', 'Product Id', 'required|valid_string[numeric]');
		$val->add_field('image_name', 'Image Name', 'required|max_length[255]');
		return $val;
	}

}
