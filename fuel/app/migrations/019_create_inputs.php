<?php

namespace Fuel\Migrations;

class Create_inputs
{
	public function up()
	{
		\DBUtil::create_table('inputs', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'name' => array('constraint' => 255, 'type' => 'varchar'),
			'activity_id' => array('constraint' => 11, 'type' => 'int'),
			'cost_per_unit' => array('type' => 'long'),
			'quantity' => array('type' => 'long'),
			'total_cost' => array('type' => 'long'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('inputs');
	}
}