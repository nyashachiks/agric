<?php

namespace Fuel\Migrations;

class Create_project_variablecosts
{
	public function up()
	{
		\DBUtil::create_table('project_variablecosts', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'project_id' => array('constraint' => 11, 'type' => 'int'),
			'variable_id' => array('constraint' => 11, 'type' => 'int'),
			'stage_id' => array('constraint' => 11, 'type' => 'int'),
			'task_id'=> array('constraint' => 11, 'type' => 'int'),
			'unitprice' => array('type' => 'double'),
			'qty' => array('type' => 'double'),
			'pertonne' => array('type' => 'boolean'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('project_variablecosts');
	}
}