<?php

class Model_Province extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'country_id',
		'name',
	);

	protected static $_table_name = 'provinces_list';
	
	
	//return an array of provinces for the selected country
	public static function list_given_country($country_id = null)
    {
    	$arr = array( 0 => '- Select province');
    	
        $query = Model_Province::query()->where('country_id', $country_id)->order_by('name','asc')->get();
        foreach($query as $item)
        {
                        $arr = $arr + array(trim($item['name']) => trim($item['name']));               
        }
        if(count($arr) === 1) return static::get_select_options('- Select province');
        return $arr;
    }
    
    // list of provinces
    public static function get_select_options($add_empty = null)
    {
        if(is_null($add_empty))
        {
                        $arr = array();
        }
        else
        {
                        $arr = array(0 => $add_empty);
        }
        
        return $arr;
                    
    }

}
