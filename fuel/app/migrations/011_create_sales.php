<?php

namespace Fuel\Migrations;

class Create_sales
{
	public function up()
	{
		\DBUtil::create_table('sales', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'productoffer_id' => array('constraint' => 11, 'type' => 'int'),
			'bid_id' => array('constraint' => 11, 'type' => 'int'),
			'status' => array('constraint' => 255, 'type' => 'varchar'),
			'amount' => array('type' => 'double'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('sales');
	}
}