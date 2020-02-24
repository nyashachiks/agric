<?php

namespace Fuel\Migrations;

class Create_linktables
{
	public function up()
	{
		\DBUtil::create_table('linktables', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'product_id' => array('constraint' => 11, 'type' => 'int'),
			'region_id' => array('constraint' => 11, 'type' => 'int'),
			'condition_id' => array('constraint' => 11, 'type' => 'int'),
			'stage_id' => array('constraint' => 11, 'type' => 'int'),
			'soiltype' => array('constraint' => 11, 'type' => 'int'),
			'variablecost_id' => array('constraint' => 11, 'type' => 'int'),
			'unitprice' => array('type' => 'double'),
			'qty' => array('type' => 'double'),
			'affectedbytargetyield' => array('type' => 'boolean'),
			'todo' => array('type' => 'text'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('linktables');
	}
}