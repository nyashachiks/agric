<?php

namespace Fuel\Migrations;

class Create_bids
{
	public function up()
	{
		\DBUtil::create_table('bids', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'productoffer_id' => array('constraint' => 11, 'type' => 'int'),
			'buyer_id' => array('constraint' => 11, 'type' => 'int'),
			'price' => array('type' => 'long'),
			'quantity' => array('type' => 'long'),
			'type' => array('constraint' => 255, 'type' => 'varchar'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('bids');
	}
}