<?php

namespace Fuel\Migrations;

class Seed_loans
{
	public function up()
	{
		$sql = "
		CREATE TABLE IF NOT EXISTS `loans` (
  `loanid` int(11) NOT NULL AUTO_INCREMENT,
  `issue_date` varchar(20) NOT NULL,
  `agronomist` varchar(255) NOT NULL,
  `farmer` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`loanid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7013 ;

INSERT INTO `loans` (`loanid`, `issue_date`, `agronomist`, `farmer`, `amount`, `status`) VALUES
(7001, '2017-01-25', 'Cephas Magava', 'Svodesai Sithole', 4751.50, 'Paid up'),
(7002, '2016-10-30', 'Cephas Magava', 'Nongai Gahlana', 850.00, '1'),
(7003, '2016-10-30', 'Sifelani Mtetwa', 'Nongai Gahlana', 22100.00, '0'),
(7004, '2016-10-30', 'Cephas Magava', 'Petunia Mureyi', 725.50, '2'),
(7005, '2016-10-30', 'Cainos Mugari', 'Gareth Takanai', 3000.00, '1'),
(7006, '2016-10-30', 'Cephas Magava', 'Nongai Gahlana', 1200.00, '1'),
(7007, '2016-10-30', 'Cainos Mugari', 'Sibongile Charumbira', 1700.00, '-1'),
(7008, '2016-10-30', 'Cephas Magava', 'Oswald Chamuteru', 1500.00, '2'),
(7009, '2016-10-30', 'Sadaat Khan', 'Regina Mundondo', 930.00, '1'),
(7010, '2016-10-30', 'Cephas Magava', 'Nongai Gahlana', 1000.00, '2'),
(7011, '2016-10-30', 'Sadaat Khan', 'Nongai Gahlana', 812.00, '1'),
(7012, '2016-10-30', 'Cephas Magava', 'Nongai Gahlana', 9623.50, '1');
		";
		\DB::query($sql)->execute();
	}

	public function down()
	{
		\DBUtil::drop_table('loans');
	}
}