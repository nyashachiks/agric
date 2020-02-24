<?php

namespace Fuel\Migrations;

class Create_stakeholder_products
{
	public function up()
	{
		\DBUtil::create_table('stakeholder_products', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'name' => array('constraint' => 255, 'type' => 'varchar'),
			'description' => array('type' => 'text'),
			'pic' => array('constraint' => 255, 'type' => 'varchar'),
			'additional_details' => array('type' => 'text'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('stakeholder_products');
	}
}