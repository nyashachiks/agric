<?php

namespace Fuel\Migrations;

class Create_project_stages
{
	public function up()
	{
			\DBUtil::create_table('project_stages', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 
			'unsigned' => true),
			'project_id' => array('constraint' => 11, 'type' => 'int'),
			'stage_id' => array('constraint' => 11, 'type' => 'int'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('project_stages');
	}
}