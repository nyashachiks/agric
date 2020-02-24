<?php

namespace Fuel\Migrations;

class Activated_users_mod
{
	public function up()
	{
		$sql = "
			ALTER TABLE  `users` ADD  `activated` TINYINT NOT NULL DEFAULT  '0' AFTER  `id`;
			update users set activated = 1;
		";
		\DB::query($sql)->execute();
	}

	public function down()
	{
		\DB::query("ALTER TABLE `users` DROP `activated`")->execute();
	}
}