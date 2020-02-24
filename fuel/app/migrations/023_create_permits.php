<?php

namespace Fuel\Migrations;

class Create_permits
{
	public function up()
	{
		\DBUtil::create_table('permits', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'applicant_id' => array('constraint' => 11, 'type' => 'int'),
			'doc_name' => array('constraint' => 100, 'type' => 'varchar'),
			'status' => array('constraint' => 11, 'type' => 'int'),
			'commodity' => array('constraint' => 255, 'type' => 'varchar'),
			'certification' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
			'comment' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
			'qty_applied' => array('constraint' => 11, 'type' => 'int'),
			'qty_approved' => array('constraint' => 11, 'type' => 'int'),
			'approv_date' => array('constraint' => 255, 'type' => 'varchar'),
			'approv_user_id' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'measurement_id' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('permits');
	}
}