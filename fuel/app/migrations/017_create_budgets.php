<?php

namespace Fuel\Migrations;

class Create_budgets
{
	public function up()
	{
		\DBUtil::create_table('budgets', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'name' => array('constraint' => 255, 'type' => 'varchar'),
			'product' => array('constraint' => 255, 'type' => 'varchar'),
			'region' => array('constraint' => 255, 'type' => 'varchar'),
			'soiltype' => array('constraint' => 255, 'type' => 'varchar'),
			'user_id' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('budgets');
	}
}