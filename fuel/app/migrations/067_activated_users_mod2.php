<?php

namespace Fuel\Migrations;

class Activated_users_mod2
{
	public function up()
	{
		$sql = "
						CREATE TABLE IF NOT EXISTS `activation_codes` (
			  
			  `user_id` int(11) NOT NULL,
			  `activated_by_uid` int(11) NOT NULL,
			  `receipt_no` varchar(30) NOT NULL
			) ENGINE=InnoDB DEFAULT CHARSET=latin1;
		";
		\DB::query($sql)->execute();
	}

	public function down()
	{
		\DB::query("drop table `activation_codes` ")->execute();
	}
}