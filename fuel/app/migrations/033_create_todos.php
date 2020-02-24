<?php

namespace Fuel\Migrations;

class Create_todos
{
	public function up()
	{
		\DBUtil::create_table('todos', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'notes' => array('type' => 'text'),
			'duration' => array('type' => 'double'),
			'units' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
			'Model_Product_Variablecost_Stage_id' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('todos');
	}
}