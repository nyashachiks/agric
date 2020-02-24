<?php

class Model_Project_Variablecost extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'project_id',
		'variable_id',
		'stage_id',
		'task_id',
		'unitprice',
		'qty',
		'pertonne',
		'startdate',
		'enddate',
		'notes',
		'duration',
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

	protected static $_table_name = 'project_variablecosts';
	protected static $_belongs_to = array(
    'variablecost' => array(
        'key_from' => 'variable_id',
        'model_to' => 'Model_Variablecost',
        'key_to' => 'id',
        'cascade_save' => true,
        'cascade_delete' => false,
    ),
    'stage' => array(
        'key_from' => 'stage_id',
        'model_to' => 'Model_Stage',
        'key_to' => 'id',
        'cascade_save' => true,
        'cascade_delete' => false,
    ),
    'task' => array(
        'key_from' => 'task_id',
        'model_to' => 'Model_Task',
        'key_to' => 'id',
        'cascade_save' => true,
        'cascade_delete' => false,
    )
);


}
