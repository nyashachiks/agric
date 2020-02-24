<?php

namespace Fuel\Migrations;

class Create_targetyields
{
	public function up()
	{
		\DBUtil::create_table('targetyields', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'value' => array('type' => 'double'),
			'units' => array('constraint' => 255, 'type' => 'varchar'),
			'sizein' => array('constraint' => 255, 'type' => 'varchar'),
			'land' => array('constraint' => 255, 'type' => 'varchar'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('targetyields');
	}
}