<?php

class Model_Project_Condition extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'project_id',
		'condition_id',
	);


	protected static $_table_name = 'project_conditions';

}
