<?php
/*
	author: 	Liberty Mataruse
	version: 	1.2
*/

class LibValidator 
{

	//function to Validate empty input
	public static function _validate_null_input($val) {


		if(Input::post('address') == '')
		{
			return false;
		}
		else 
		{
			return true;
		}
	}
	
	//------------------------------------------------------------//
	//Function to validate a user name. No digits allowed!!
	//------------------------------------------------------------//
    public static function _validation_valid_name($str)
    {
		$valid = TRUE;
		$nameArray = str_split($str,1);

		foreach($nameArray as $value){
			if(ctype_digit($value)){
				$valid = FALSE;
			}
		}
		return $valid;
    }
    
    public static function _validation_isreserved($val){
		
		if(strpos(Input::post('username'),'-admin') === false){
		   	return true;
		}
		return false;
	}
    
	
	public static function _validation_atleast_one($val)
	{
		$bool = false;
		foreach($val as $item)
		{
			if(!empty($item)){
				$bool = true;
				break;
			}
		}
		
		if($bool) return true;
		\Validation::active()->set_message('atleast_one', 'At least 1 :label is required');
		return false;
	}
	
	//Select boxes
	public static function _validation_valid_selection($val)
	{
		if(($val == 0 )  and is_numeric($val))
		{
			return false;
		}
		else
		{
			return true;
		}
	}
	
	public static function _validation_valid_tenant($val)
	{
		if(($val == -1)  and is_numeric($val))
		{
			return false;
		}
		else
		{
			return true;
		}
	}
	   
	//------------------------------------------------------------//
	//Function to check if a given date is valid
	//Note that the format for date should be yyyy-mm-dd 
	//including the - character otherwise it will be  invalid
	//------------------------------------------------------------//
	public static function _validation_valid_date($date)
	{
		$date_parts = preg_split("/[\s-]+/", $date);
		
		if(count($date_parts) != 3)
		return false;
		
		if(checkdate((int)$date_parts[1],(int)$date_parts[2],(int)$date_parts[0])){
			return true; 
		}else{
			return false; 
		}
		
	}
	
	//------------------------------------------------------------//
	//Function to validate a Zimbabwe style cell phone number.
	// Phone no shld be eg, 0774609218 or 774609218 No spaces!!
	//------------------------------------------------------------//
	public static function _validation_valid_cellphone($arg)
	{
		$phone = trim($arg);
		if(is_numeric($phone)){
			$phone = (string)$phone;
			if(strlen($phone)== 10 || strlen($phone) == 9)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;
		}
	}
	
	//------------------------------------------------------------//
	//Function to validate a Zimbabwe style National ID number
	// It shld be in format like 22-234884-B-22 (including the - )
	//------------------------------------------------------------//
	public static function _validation_valid_natid($arg){
		$id_Parts = explode("-",$arg);
		
		if(count($id_Parts) != 4)
		return false;
		
		$idCheck =FALSE;
		if(is_numeric($id_Parts[0]) && strlen($id_Parts[0]) == 2){
			if(is_numeric($id_Parts[1]) && strlen($id_Parts[1]) == 6){
				if(ctype_alpha($id_Parts[2]) && strlen($id_Parts[2]) == 1){
					if(is_numeric($id_Parts[3]) && strlen($id_Parts[3]) == 2){
						$idCheck = TRUE;
					}
				}
			}
		}
		return $idCheck;
	}
	
	//------------------------------------------------------------//
	//Function to check if a given value is a number
	//------------------------------------------------------------//
	public static function _validation_valid_number($val)
	{
		if(is_numeric($val))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	//-------------------------------------------------------------------//
	//Function to check if an entry is duplicate in a DB table (ON CREATE)
	//--------------------------------------------------------------------//
	public static function _validation_is_duplicate($value, $column, $table)
	{	
	
		$t_id = Session::get('tenant_id');
		
		$sql = 	DB::query("select $column from $table where $column = '$value' and tenant_id = '$t_id' ")
			->execute()
			->as_array();
		
		if(count($sql) > 0)
		{
			return false;
		}
		else
		{
			return true;
			
		}
	}
	
	public static function _validation_is_duplicate_email($value, $column, $table)
	{	
	
		$sql = 	DB::query("select $column from $table where $column = '$value' ")
			->execute()
			->as_array();
		
		if(count($sql) > 0)
		{
			return false;
		}
		else
		{
			return true;
			
		}
	}
	
	public static function _validation_is_duplicate_uname($value, $column, $table)
	{	
	
		$sql = 	DB::query("select $column from $table where $column = '$value' ")
			->execute()
			->as_array();
		
		if(count($sql) > 0)
		{
			return false;
		}
		else
		{
			return true;
			
		}
	}
	
	//-------------------------------------------------------------------//
	//Function to check if an entry is duplicate in a DB table (ON EDIT!!)
	//--------------------------------------------------------------------//
	public static function _validation_is_duplicate_edit($value, $column, $table)
	{	
		$t_id 	= Session::get('tenant_id');
		$sql 	= DB::query("select $column from $table where $column = '$value' and tenant_id = '$t_id' ")
				->execute()
				->as_array();
		
		if(count($sql) > 1)
		{
			return false;
		}
		else
		{
			return true;
			
		}
	}
}
