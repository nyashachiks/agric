<?php
use Orm\Model;

class Model_Sap_Bp extends Model
{
	protected static $_properties = array(
		'id',
		'bp_num',
		'firstname',
		'lastname',
		'street',
		'housenumber',
		'city',
		'region',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('firstname', 'Firstname', 'required|max_length[255]');
		$val->add_field('lastname', 'Lastname', 'required|max_length[255]');
		$val->add_field('street', 'Street', 'required|max_length[255]');
		$val->add_field('housenumber', 'Housenumber', 'required|max_length[255]');
		$val->add_field('city', 'City', 'required|max_length[255]');
		$val->add_field('region', 'Region', 'required|max_length[255]');

		return $val;
	}

}
