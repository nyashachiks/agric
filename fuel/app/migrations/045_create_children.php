<?php

namespace Fuel\Migrations;

class Create_children
{
	public function up()
	{
		\DBUtil::create_table('children', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'mid' => array('constraint' => 11, 'type' => 'int'),
			'pid' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('children');
	}
}