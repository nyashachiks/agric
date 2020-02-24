<?php
use Orm\Model;

class Model_Loan extends Model
{
	protected static $_table_name = "loans";
	protected static $_primary_key = array('loanid');
	
	protected static $_properties = array(
		'loanid',
		'issue_date',
		'agronomist',
		'farmer',
		'amount',
		'status'
	);
	
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
        
        $query = Model_Loan::query()->order_by('agronomist','asc')->get();
        foreach($query as $item)
        {
                        $arr = $arr + array($item['agronomist'] => $item['agronomist']);               
        }
        
        return $arr;
                    
    }
	
	
}
