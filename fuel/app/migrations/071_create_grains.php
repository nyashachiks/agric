<?php

namespace Fuel\Migrations;

class Create_grains
{
	public function up()
	{
		\DBUtil::create_table('grains', array(
			'id' => array('type' => 'int', 'unsigned' => true, 'null' => false, 'auto_increment' => true, 'constraint' => '11'),
			'name' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'description' => array('null' => false, 'type' => 'text'),
			'created_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'updated_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('grains');
	}
}