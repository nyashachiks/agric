<?php

namespace Fuel\Migrations;

class Create_product_variablecost_complexformulas
{
	public function up()
	{
		\DBUtil::create_table('product_variablecost_complexformulas', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'affectedhectars' => array('type' => 'double'),
			'rate' => array('type' => 'double'),
			'denominator' => array('type' => 'double'),
			'price' => array('type' => 'double'),
			'product_variablecost_id' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('product_variablecost_complexformulas');
	}
}