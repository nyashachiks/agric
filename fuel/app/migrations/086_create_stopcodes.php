<?php

namespace Fuel\Migrations;

class Create_stopcodes
{
	public function up()
	{
		\DBUtil::create_table('stopcodes', array(
			'id' => array('type' => 'int', 'unsigned' => true, 'null' => false, 'auto_increment' => true, 'constraint' => '11'),
			'code' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'vendor' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'company_code' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'vendor_name' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'deduction_rate' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'created_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'updated_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('stopcodes');
	}
}