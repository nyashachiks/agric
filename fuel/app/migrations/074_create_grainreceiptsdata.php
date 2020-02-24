<?php

namespace Fuel\Migrations;

class Create_grainreceiptsdata
{
	public function up()
	{
		\DBUtil::create_table('grainreceiptsdata', array(
			'id' => array('type' => 'int', 'unsigned' => true, 'null' => false, 'auto_increment' => true, 'constraint' => 11),
			'receipt_id' => array('constraint' => 11, 'null' => false, 'type' => 'int'),
			'key' => array('constraint' => 255, 'null' => false, 'type' => 'varchar'),
			'value' => array('constraint' => 255, 'null' => false, 'type' => 'varchar'),
			'created_at' => array('constraint' => 11, 'null' => true, 'type' => 'int', 'unsigned' => true),
			'updated_at' => array('constraint' => 11, 'null' => true, 'type' => 'int', 'unsigned' => true),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('grainreceiptsdata');
	}
}