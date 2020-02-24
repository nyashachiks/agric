<?php class Custom_Helper
{
	public static function isChecked($id,$collectionToCheckFrom)
	{
		
		$check=FALSE;
		if($collectionToCheckFrom=='')
			return FALSE;
		foreach($collectionToCheckFrom as $item)
		{
			if($item->id==$id)
				{
					$check=TRUE;
					break;
				}
		}
		return $check;
	}
	public static function convertor($size,$units)
	{
		if(Str::lower($units)=='hectares')
		{
			return round($size/0.404686,3);
		}
		if(Str::lower($units)=='square kilometers')
		{
			return round($size*247.105,3);
		}
		return $size;//returns acres
	}
	public static function UnixToTimeStamp($unix,$timezone="Africa/Harare")
	{
		if(!empty($unix))
			return Date::forge($unix)->set_timezone($timezone)->format("%m/%d/%Y %H:%M");
		else
			return ""; // return an empty string		
	}
}