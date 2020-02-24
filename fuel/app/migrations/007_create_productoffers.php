<?php

namespace Fuel\Migrations;

class Create_productoffers
{
	public function up()
	{
		\DBUtil::create_table('productoffers', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'product_id' => array('constraint' => 11, 'type' => 'int'),
			'farmer_id' => array('constraint' => 11, 'type' => 'int'),
			'market_id' => array('constraint' => 11, 'type' => 'int'),
			'price' => array('type' => 'long'),
			'quanity' => array('type' => 'long'),
			'min_quantity' => array('type' => 'long'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('productoffers');
	}
}