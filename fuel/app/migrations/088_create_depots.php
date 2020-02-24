<?php

namespace Fuel\Migrations;

class Create_depots
{
	public function up()
	{
		\DBUtil::create_table('depots', array(
			'id' => array('type' => 'int', 'unsigned' => true, 'null' => false, 'auto_increment' => true, 'constraint' => '11'),
			'plant' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'short_name' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'name' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'city' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'created_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'updated_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('depots');
	}
}