<?php
use Orm\Model;

class Model_Raw_Material extends Model
{
	protected static $_properties = array(
		'id',
		'name',
		'description',
		'measurement_id',
		'created_at',
		'updated_at',
	);

protected static $_belongs_to = array(
			
		    // in a Model_Raw_Material which belongs to a measurement
		    'measurement' => array(
		        'key_from' => 'measurement_id',
		        'model_to' => 'Model_Measurement',
		        'key_to' => 'id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    )
	    );
protected static $_has_one = array(
			// in a Model_Raw_Material which has one rawmaterial_offer
		    'rawmaterial_offer' => array(
		        'key_from' => 'id',
		        'model_to' => 'Model_Rawmaterial_Offer',
		        'key_to' => 'raw_material_id',
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
		$val->add_field('description', 'Description', 'required');
		$val->add_field('measurement_id', 'Measurement Id', 'required|valid_string[numeric]');

		return $val;
	}

}
