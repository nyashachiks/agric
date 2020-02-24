<?php

namespace Fuel\Migrations;

class Create_addresses
{
	public function up()
	{
		\DBUtil::create_table('addresses', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'address' => array('type' => 'text'),
			'address2' => array('type' => 'text'),
			'district' => array('constraint' => 255, 'type' => 'varchar'),
			'postal_code' => array('constraint' => 255, 'type' => 'varchar'),
			'phone' => array('constraint' => 255, 'type' => 'varchar'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('addresses');
	}
}