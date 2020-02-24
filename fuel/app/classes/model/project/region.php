<?php

class Model_Project_Region extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'project_id',
		'region_id',
	);


	protected static $_table_name = 'project_regions';

}
