<?php
use Orm\Model;

class Model_Product_Variablecost_Complexformula extends Model
{
	protected static $_properties = array(
		'id',
		'affectedhectars',
		'rate',
		'denominator',
		'price',
		'product_variablecost_id',
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
		$val->add_field('affectedhectars', 'Affectedhectars', 'required');
		$val->add_field('rate', 'Rate', 'required');
		$val->add_field('denominator', 'Denominator', 'required');
		$val->add_field('price', 'Price', 'required');
		$val->add_field('product_variablecost_id', 'Product Variablecost Id', 'required|valid_string[numeric]');

		return $val;
	}
	public static function getComplexFormula($product_variablecost_id)
	{
		return Model_Product_Variablecost_Complexformula::query()
		->where('product_variablecost_id',$product_variablecost_id)
		->get();
		
		
	}
}
