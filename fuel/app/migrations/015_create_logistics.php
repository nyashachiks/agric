<?php

namespace Fuel\Migrations;

class Create_logistics
{
	public function up()
	{
		\DBUtil::create_table('logistics', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'equipmentname' => array('constraint' => 255, 'type' => 'varchar'),
			'capacity' => array('type' => 'double'),
			'rateperhour' => array('type' => 'double'),
			'description' => array('constraint' => 255, 'type' => 'varchar'),
			'supplier_id' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('logistics');
	}
}