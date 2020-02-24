<?php

class Model_Project_Stage extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'project_id',
		'stage_id',
		'position',
		'prefix',
	);


	protected static $_table_name = 'project_stages';
	// in a Model_User which has one profile
protected static $_belongs_to = array(
    'stage' => array(
        'key_from' => 'stage_id',
        'model_to' => 'Model_Stage',
        'key_to' => 'id',
        'cascade_save' => true,
        'cascade_delete' => false,
    ),
     'project' => array(
        'key_from' => 'project_id',
        'model_to' => 'Model_Project',
        'key_to' => 'id',
        'cascade_save' => true,
        'cascade_delete' => false,
    )
);
protected static $_has_many = array(
    'project_stages_tasks' => array( //loops thru variable costs
        'key_from' => 'id',
        'model_to' => 'Model_Project_Stage_Task',
        'key_to' => 'project_stage_id',
        'cascade_save' => true,
        'cascade_delete' => TRUE,
        'conditions' => array(
            'order_by' => array(
                'position' => 'ASC',
                //'field2' => 'ASC',
            )
        ),
    ));
	// has many tasks
		protected static $_many_many = array(
    'tasks' => array(
        'key_from' => 'id',
        'key_through_from' =>'project_stage_id', // column 1 from the table in between, should match a posts.id
        'table_through' => 'project_stage_tasks', // both models plural without prefix in alphabetical order
        'key_through_to' => 'task_id', // column 2 from the table in between, should match a users.id
        'model_to' => 'Model_Task',
        'key_to' => 'id',
        'cascade_save' => true,
        'cascade_delete' => true,
    ));

}
