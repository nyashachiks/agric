<?php

namespace Fuel\Migrations;

class Create_districts
{
	public function up()
	{
		\DBUtil::create_table('districts_list', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'province_id' => array('constraint' => 11, 'type' => 'int'),
			'name' => array('constraint' => 255, 'type' => 'varchar'),

		), array('id'));
		
		$ins = "
INSERT INTO `districts_list` (`id`, `province_id`, `name`) VALUES
(16, 4, 'Buhera'),
(17, 4, 'Chimanimani'),
(18, 4, 'Chipinge'),
(19, 4, 'Makoni'),
(20, 4, 'Mutare'),
(21, 4, 'Mutasa'),
(22, 4, 'Nyanga'),
(23, 5, 'Bindura'),
(24, 5, 'Guruve'),
(25, 5, 'Mazowe'),
(26, 5, 'Mbire'),
(27, 5, 'Mukumbura'),
(28, 5, 'Muzarabani'),
(29, 5, 'Rushinga'),
(30, 5, 'Shambva'),
(31, 6, 'Chikomba'),
(32, 6, 'Groromonzi, Hwedza'),
(33, 6, 'Marondera'),
(34, 6, 'Mudzi'),
(35, 6, 'Murehwa'),
(36, 6, 'Mutoko'),
(37, 6, 'Seke'),
(38, 6, 'Uzumba-Maramaba-Pfungwe'),
(39, 7, 'Chegutu'),
(40, 7, 'Hurungwe'),
(41, 7, 'Kadoma'),
(42, 7, 'Kariba'),
(43, 7, 'Makonde'),
(44, 7, 'Zvimba'),
(45, 8, 'Bikita'),
(46, 8, 'Chiredzi'),
(47, 8, 'Chivi'),
(48, 8, 'Gutu'),
(49, 8, 'Masvingo'),
(50, 8, 'Mwenezi'),
(51, 8, 'Zaka'),
(52, 9, 'Binga'),
(53, 9, 'Bubi'),
(54, 9, 'Hwange'),
(55, 9, 'Lupane'),
(56, 9, 'Nkayi'),
(57, 9, 'Tsholotsho'),
(58, 9, 'Umguza'),
(59, 10, 'Beitbridge'),
(60, 10, 'Bulilimamangwe'),
(61, 10, 'Gwanda'),
(62, 10, 'Insiza'),
(63, 10, 'Matobo'),
(64, 10, 'Umzingwane'),
(65, 11, 'Chirumanzu'),
(66, 11, 'Gokwe North'),
(67, 11, 'Gokwe South'),
(68, 11, 'Gweru'),
(69, 11, 'Kwekwe'),
(70, 11, 'Mberengwa'),
(71, 11, 'Shurugwi'),
(72, 11, 'Zvishavane'),
(73, 3, 'Harare'),
(74, 2, 'Bulawayo');";

\DB::query($ins)->execute();
		
	}

	public function down()
	{
		\DBUtil::drop_table('districts_list');
	}
}