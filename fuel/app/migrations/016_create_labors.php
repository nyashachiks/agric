<?php

namespace Fuel\Migrations;

class Create_labors
{
	public function up()
	{
		\DBUtil::create_table('labors', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'skill_name' => array('constraint' => 255, 'type' => 'varchar'),
			'rate' => array('type' => 'double'),
			'description' => array('constraint' => 255, 'type' => 'varchar'),
			'laborer_id' => array('constraint' => 11, 'type' => 'int'),
			'destination' => array('constraint' => 255, 'type' => 'varchar'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('labors');
	}
}