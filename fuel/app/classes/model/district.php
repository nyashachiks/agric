<?php

class Model_District extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'province_id',
		'name',
	);

	protected static $_table_name = 'districts_list';
	
	//return an array of districts for the selected province
	public static function list_given_province($prov_name = null)
    {
    	$arr = array( 0 => '- Select district');

    	//get the province id from the given province name
    	$pro = Model_Province::query()->where('name',"like","%{$prov_name}%")->get_one();

    	$prov_id = $pro->id;
    	
        $query = Model_District::query()->where('province_id', $prov_id)->order_by('name','asc')->get();
        foreach($query as $item)
        {
                        $arr = $arr + array(trim($item['name']) => trim($item['name']));               
        }
        
        if(count($arr) === 1) return static::get_select_options('- Select district');
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
