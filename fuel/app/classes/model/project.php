<?php

class Model_Project extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'product_id',
		'name',
		'expected_yield',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_update'),
			'mysql_timestamp' => false,
		),
	);

	protected static $_table_name = 'projects';
	 	protected static $_many_many = array(
    'regions' => array(
        'key_from' => 'id',
        'key_through_from' => 'project_id', // column 1 from the table in between, should match a posts.id
        'table_through' => 'project_regions', // both models plural without prefix in alphabetical order
        'key_through_to' => 'region_id', // column 2 from the table in between, should match a users.id
        'model_to' => 'Model_Region',
        'key_to' => 'id',
        'cascade_save' => true,
        'cascade_delete' => false,
    ),
     'conditions' => array(
        'key_from' => 'id',
        'key_through_from' => 'project_id', // column 1 from the table in between, should match a posts.id
        'table_through' => 'project_conditions', // both models plural without prefix in alphabetical order
        'key_through_to' => 'condition_id', // column 2 from the table in between, should match a users.id
        'model_to' => 'Model_Condtion',
        'key_to' => 'id',
        'cascade_save' => true,
        'cascade_delete' => false,
    ),
    'stages' => array(
        'key_from' => 'id',
        'key_through_from' => 'project_id', // column 1 from the table in between, should match a posts.id
        'table_through' => 'project_stages', // both models plural without prefix in alphabetical order
        'key_through_to' => 'stage_id', // column 2 from the table in between, should match a users.id
        'model_to' => 'Model_Stage',
        'key_to' => 'id',
        'cascade_save' => true,
        'cascade_delete' => FALSE,
    ),
    'soiltypes' => array(
        'key_from' => 'id',
        'key_through_from' => 'project_id', // column 1 from the table in between, should match a posts.id
        'table_through' => 'project_soiltypes', // both models plural without prefix in alphabetical order
        'key_through_to' => 'soiltype_id', // column 2 from the table in between, should match a users.id
        'model_to' => 'Model_Soiltype',
        'key_to' => 'id',
        'cascade_save' => true,
        'cascade_delete' => FALSE,
    )
);
protected static $_has_many = array(
    'costs' => array( //loops thru variable costs
        'key_from' => 'id',
        'model_to' => 'Model_Project_Variablecost',
        'key_to' => 'project_id',
        'cascade_save' => true,
        'cascade_delete' => true,
    ),
    'project_stages' => array( //loops thru variable costs
        'key_from' => 'id',
        'model_to' => 'Model_Project_Stage',
        'key_to' => 'project_id',
        'cascade_save' => true,
        'cascade_delete' => true,
        'conditions' => array(
            'order_by' => array(
                'position' => 'ASC',
            )
        ),
    ),
);
protected static $_belongs_to = array(
    'product' => array(
        'key_from' => 'product_id',
        'model_to' => 'Model_Product',
        'key_to' => 'id',
        'cascade_save' => true,
        'cascade_delete' => false,
    )
);
}
