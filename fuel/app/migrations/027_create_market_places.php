<?php

namespace Fuel\Migrations;

class Create_market_places
{
	public function up()
	{
		\DB::query(
		"

CREATE TABLE IF NOT EXISTS `market_places` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `lat` float NOT NULL,
  `lon` float NOT NULL,
  `zoom` int(11) NOT NULL,
  `html` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `market_places`
--

INSERT INTO `market_places` (`id`, `title`, `lat`, `lon`, `zoom`, `html`) VALUES
(1, 'Mbare Musika', -17.8597, 31.0382, 14, '<h5>Mbare Musika</h5>'),
(2, 'Kudzanayi Market', -19.4514, 29.8152, 14, '<h5>Kudzanayi Market</h5>'),
(3, 'Emkambo', -20.1373, 28.5734, 14, '<h5>Emkambo</h5>'),
(4, 'Bindura Agriculture Market', -17.3013, 31.3198, 14, '<h5>Bindura Agriculture Market </h5>'),
(5, 'Market  Street', -20.1512, 28.5861, 14, '<h5>Market  Street </h5>'),
(6, 'Chegutu Roadside Market', -18.138, 30.1474, 14, '<h5>Chegutu Roadside Market</h5>'),
(7, 'Chinhoyi Agriculture Market', -17.3653, 30.1936, 14, '<h5>Chinhoyi Agriculture Market</h5>'),
(8, 'Chinhoyi Agriculture Market', -18.0198, 30.1936, 14, '<h5>Chinhoyi Agriculture Market</h5>'),
(9, 'Guzha Market Chikwanha', -18.0198, 31.0679, 14, '<h5>Guzha Market – Chikwanha </h5>'),
(10, 'Gokwe South Markets', -18.211, 28.4864, 14, '<h5>Bomba, Njelele, Machengere, Gawa and Munegiwa Markets </h5>'),
(11, 'Esigodini Market', -20.2907, 28.9383, 14, 'h5>Esigodini Market </h5>'),
(12, 'Highfield Lusaka Agriculture Market', -17.8817, 30.9819, 14, '<h5>Lusaka Agriculture Market</h5>'),
(13, 'Kwekwe Agriculture Market', -18.9201, 29.8237, 14, '<h5>Kwekwe Agriculture Market</h5>'),
(14, 'Sakubva Agriculture Market', -18.9767, 32.6693, 14, '<h5>Sakubva Agriculture Market</h5>'),
(15, 'Masvingo Markets', -20.0957, 31.6152, 14, '<h5>Bikita, Garikai, Nyika and Tafara Markets</h5>'),
(16, 'Zvishavane Markets', -20.3139, 30.055, 14, '<h5>Hama maoko and Mandava Agriculture Markets</h5>');

		"
		)->execute();
	}

	public function down()
	{
		\DB::query(
			"drop table market_places"
		)->execute();
	}
}