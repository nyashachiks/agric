<?php
use Orm\Model;

class Model_Marketplace extends Model
{
	protected static $_table_name =  "market_places";
	
	protected static $_properties = array(
		'id',
		'title',
		'lat',
		'lon',
		'zoom',
		'html',
	);
	
		
}
