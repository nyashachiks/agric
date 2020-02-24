<?php

class Model_Project_Stage_Task extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'project_stage_id',
		'task_id',
		'duration',
		'position',
		'prefix',
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

	protected static $_table_name = 'project_stage_tasks';
	protected static $_belongs_to = array(
    'task' => array(
        'key_from' => 'task_id',
        'model_to' => 'Model_Task',
        'key_to' => 'id',
        'cascade_save' => true,
        'cascade_delete' => false,
    ),
    'project_stage' => array(
        'key_from' => 'project_stage_id',
        'model_to' => 'Model_Project_Stage',
        'key_to' => 'id',
        'cascade_save' => true,
        'cascade_delete' => false,
    )
    
);
protected static $_has_many = array(
    'project_stages_tasks_variablecosts' => array( //loops thru variable costs
        'key_from' => 'id',
        'model_to' => 'Model_Project_Stage_Task_Variablecost',
        'key_to' => 'project_stage_task_id',
        'cascade_save' => true,
        'cascade_delete' => true,
    ),
    'contracttracker' => array( //loops thru variable costs
        'key_from' => 'id',
        'model_to' => 'Model_Contracttracker',
        'key_to' => 'project_stage_task_id',
        'cascade_save' => true,
        'cascade_delete' => true,
    )
    );

}
