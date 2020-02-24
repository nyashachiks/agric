<?php

namespace Fuel\Migrations;

class Add_comments_to_stoporders
{
	public function up()
	{
		\DB::query(
		"ALTER TABLE  `stoporders` ADD  `comment` TEXT NULL"
		)->execute();
	}

	public function down()
	{
		\DB::query(
			"ALTER TABLE `stoporders` DROP `comment`"
		)->execute();
	}
}