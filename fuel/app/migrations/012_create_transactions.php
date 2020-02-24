<?php

namespace Fuel\Migrations;

class Create_transactions
{
	public function up()
	{
		\DBUtil::create_table('transactions', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'sale_id' => array('constraint' => 11, 'type' => 'int'),
			'amount' => array('type' => 'double'),
			'narrative' => array('type' => 'text'),
			'status' => array('constraint' => 255, 'type' => 'varchar'),
			'browseurl' => array('constraint' => 255, 'type' => 'varchar'),
			'pollurl' => array('constraint' => 255, 'type' => 'varchar'),
			'paynowRef' => array('constraint' => 255, 'type' => 'varchar'),
			'paymentStatus' => array('constraint' => 255, 'type' => 'varchar'),
			'mobile' => array('constraint' => 255, 'type' => 'varchar'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('transactions');
	}
}