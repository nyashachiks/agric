<?php

namespace Fuel\Migrations;

class Create_basicformulas
{
	public function up()
	{
		\DBUtil::create_table('basicformulas', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'product_variablecost_stage_id' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'product_variablecost_id'=>array('constraint' => 11, 'type' => 'int', 'null' => true),
			'expectedquantity'=> array('type' => 'double'),
			'unitprice' => array('type' => 'double'),
			'measurementunits' => array('constraint' => 255, 'type' => 'varchar'),
			'affectedbytargetyield' => array('type' => 'boolean'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('basicformulas');
	}
}