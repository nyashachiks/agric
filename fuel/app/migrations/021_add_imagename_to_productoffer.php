<?php

namespace Fuel\Migrations;

class Add_imagename_to_productoffer
{
	public function up()
	{
		\DB::query("ALTER TABLE  `productoffers` ADD  `image_name` VARCHAR( 256 ) NULL")->execute();
	}

	public function down()
	{
		\DB::query("alter table productoffers drop column image_name;")->execute();
	}
}