<?php

namespace Fuel\Migrations;

class Create_project_soiltypes
{
	public function up()
	{
		\DBUtil::create_table('project_soiltypes', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'project_id' => array('constraint' => 11, 'type' => 'int'),
			'soiltype_id' => array('constraint' => 11, 'type' => 'int'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('project_soiltypes');
	}
}