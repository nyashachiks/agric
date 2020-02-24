<?php

namespace Fuel\Migrations;

class Create_branches
{
	public function up()
	{
		\DBUtil::create_table('branches', array(
			'id' => array('type' => 'int', 'unsigned' => true, 'null' => false, 'auto_increment' => true, 'constraint' => '11'),
			'branch_code' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'bank_name' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'bank_address' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'bank_city' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'branch_name' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'swift_code' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'created_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'updated_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('branches');
	}
}