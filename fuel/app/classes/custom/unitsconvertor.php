<?php
class Custom_Unitsconvertor
{
	public static function AcresToHectars($value,$unit) // returns hectars
	{
		if(Str::lower($unit)=='acres')
		{
			return round($value/2.47105,2); // 1ha = 2.47105acres
		}
		return round($value,2); 
	}
}
