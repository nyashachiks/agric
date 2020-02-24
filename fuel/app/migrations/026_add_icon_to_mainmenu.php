<?php

namespace Fuel\Migrations;

class Add_icon_to_mainmenu
{
	public function up()
	{
		\DB::query(
		"ALTER TABLE  `mainmenus` ADD  `icon` VARCHAR( 100 ) NOT NULL DEFAULT  'fa-home'"
		)->execute();
	}

	public function down()
	{
		\DB::query(
			"ALTER TABLE `mainmenus` DROP `icon`"
		)->execute();
	}
}