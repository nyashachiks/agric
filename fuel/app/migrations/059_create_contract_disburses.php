<?php

namespace Fuel\Migrations;

class Create_contract_disburses
{
	public function up()
	{
		\DBUtil::create_table('contract_disburses', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'contractquantities_id' => array('constraint' => 11, 'type' => 'int'),
			'userdisbursed' => array('constraint' => 11, 'type' => 'int'),
			'date' => array('type' => 'date'),
			'quantities' => array('type' => 'double'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('contract_disburses');
	}
}