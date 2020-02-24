<?php

namespace Fuel\Migrations;

class Add_offerdesc_to_productoffer
{
	public function up()
	{
		\DB::query("ALTER TABLE  `productoffers` ADD  `offer_description` TEXT NOT NULL AFTER  `price`")->execute();
	}

	public function down()
	{
		\DB::query("alter table productoffers drop column offer_description;")->execute();
	}
}