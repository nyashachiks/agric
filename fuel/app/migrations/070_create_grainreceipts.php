<?php

namespace Fuel\Migrations;

class Create_grainreceipts
{
	public function up()
	{
		\DBUtil::create_table('grainreceipts', array(
			'id' => array('type' => 'int', 'unsigned' => true, 'null' => false, 'auto_increment' => true, 'constraint' => '11'),
			'farmer_id' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'grain_id' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'qty' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'grade_id' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'value' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'received_by' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'created_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'updated_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('grainreceipts');
	}
}