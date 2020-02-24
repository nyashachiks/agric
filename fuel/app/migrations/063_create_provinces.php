<?php

namespace Fuel\Migrations;

class Create_provinces
{
	public function up()
	{
		\DBUtil::create_table('provinces_list', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'country_id' => array('constraint' => 11, 'type' => 'int'),
			'name' => array('constraint' => 255, 'type' => 'varchar'),
		), array('id'));
		
		//seed data
		$ins =  "INSERT INTO `provinces_list` (`id`, `country_id`, `name`) VALUES
(2, 246, 'Bulawayo\r'),
(3, 246, 'Harare\r'),
(4, 246, 'Manicaland\r'),
(5, 246, 'Mashonaland Central\r'),
(6, 246, 'Mashonaland East\r'),
(7, 246, 'Mashonaland West\r'),
(8, 246, 'Masvingo\r'),
(9, 246, 'Matabeleland North\r'),
(10, 246, 'Matabeleland South\r'),
(11, 246, 'Midlands');";
		\DB::query($ins)->execute();
	}

	public function down()
	{
		\DBUtil::drop_table('provinces_list');
	}
}