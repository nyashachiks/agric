<?php

namespace Fuel\Migrations;

class Create_stoporders
{
	public function up()
	{
		\DBUtil::create_table('stoporders', array(
			'id' => array('type' => 'int', 'unsigned' => true, 'null' => false, 'auto_increment' => true, 'constraint' => '11'),
			'company_code' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'stop_order_number' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'code' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'farmer_name' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'farmer_number' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'farmer_id' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'material_number' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'max_amount' => array('null' => false, 'type' => 'double'),
			'created_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'updated_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('stoporders');
	}
}