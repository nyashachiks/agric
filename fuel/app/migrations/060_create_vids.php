<?php

namespace Fuel\Migrations;

class Create_vids
{
	public function up()
	{
		\DBUtil::create_table('vids', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'national_ID' => array('constraint' => 255, 'type' => 'varchar'),
			'Details' => array('constraint' => 255, 'type' => 'varchar'),
			'License_Type' => array('constraint' => 255, 'type' => 'varchar'),
			'amount' => array('type' => 'double'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('vids');
	}
}