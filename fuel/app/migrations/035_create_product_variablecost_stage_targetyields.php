<?php

namespace Fuel\Migrations;

class Create_product_variablecost_stage_targetyields
{
	public function up()
	{
		\DBUtil::create_table('product_variablecost_stage_targetyields', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'value' => array('type' => 'double'),
			'targetyield_id' => array('constraint' => 11, 'type' => 'int'),
			'product_variablecost_stage_id' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('product_variablecost_stage_targetyields');
	}
}