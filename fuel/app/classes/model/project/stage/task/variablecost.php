<?php

class Model_Project_Stage_Task_Variablecost extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'project_stage_task_id',
		'variablecost_id',
		'unitprice',
		'qty',
		'pertonner',
		'notes',
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

	protected static $_table_name = 'project_stage_task_variablecosts';
	protected static $_belongs_to = array(
    'variablecost' => array(
        'key_from' => 'variablecost_id',
        'model_to' => 'Model_Variablecost',
        'key_to' => 'id',
        'cascade_save' => true,
        'cascade_delete' => false,
    ),
    'project_stage_task' => array(
        'key_from' => 'project_stage_task_id',
        'model_to' => 'Model_Project_Stage_Task',
        'key_to' => 'id',
        'cascade_save' => true,
        'cascade_delete' => false,
    )
);

}
