<?php

namespace Fuel\Migrations;

class Add_doc_name_to_stoporders
{
	public function up()
	{
		\DB::query(
		"ALTER TABLE  `stoporders` ADD  `doc_name` TEXT NULL"
		)->execute();
	}

	public function down()
	{
		\DB::query(
			"ALTER TABLE `stoporders` DROP `doc_name`"
		)->execute();
	}
}