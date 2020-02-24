<?php

namespace Fuel\Migrations;

class Create_stoporders
{
	public function up()
	{
		\DBUtil::create_table('stoporders', array(
			'id' => array('type' => 'int', 'unsigned' => true, 'null' => false, 'auto_increment' => true, 'constraint' => '11'),
			'company_code' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'stop_order_code' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'farmer_id' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'vendor_number' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'vendor_name' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'material_group' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'maximum_amount' => array('null' => false, 'type' => 'double'),
			'start_date' => array('null' => false, 'type' => 'date'),
			'general_stop_order' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'entry_date' => array('null' => false, 'type' => 'date'),
			'entered_by' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'changed_on' => array('null' => false, 'type' => 'date'),
			'changed_by' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'created_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'updated_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('stoporders');
	}
}