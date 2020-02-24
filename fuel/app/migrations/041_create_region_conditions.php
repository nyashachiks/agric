<?php

namespace Fuel\Migrations;

class Create_region_conditions
{
	public function up()
	{
		\DBUtil::create_table('region_conditions', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'region_id' => array('constraint' => 11, 'type' => 'int'),
			'condition_id' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('region_conditions');
	}
}