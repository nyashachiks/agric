<?php

// stats for the various KPI's
class Kpi
{
	
	public function countMarketPlaces()
	{
		$markets = Model_Marketplace::find('all');
		return count($markets);
	}

	public function countFarmers()
	{
		//get role id for farmer
		$farmer = "select id from users_roles where name = 'Farmer' ";
		$f =  DB::query($farmer)->execute()->as_array();
		$f_id =  @$f[0]['id']; 
		
		//got it, lets proceed
		if(!is_null($f_id)){
			
			//lets count number of users subscribed to the farmer role
			$pple =  "select count(distinct(user_id)) as tmpvar from users_user_roles
where role_id = $f_id ";

			$tmp 	= DB::query($pple)->execute()->as_array();
			$fcount =  @$tmp[0]['tmpvar'];
			return $fcount;
		}
		return 0;
	}	

	public function countProductsOnSale()
	{
		$sql = "select count(distinct(product_id)) as tmp_var from productoffers where quantity_left > 0";
		$offers =  DB::query($sql)->execute()->as_array();
		return $offers[0]['tmp_var'];
	}

	public function countContractors()
	{

		//get role id for contractor
		$farmer = "select id from users_roles where name = 'Contractor' ";
		$f =  DB::query($farmer)->execute()->as_array();
		$f_id =  @$f[0]['id']; 
		
		//got it, lets proceed
		if(!is_null($f_id)){
			
			//lets count number of users subscribed to the contractor role
			$pple =  "select count(distinct(user_id)) as tmpvar from users_user_roles
where role_id = $f_id ";

			$tmp 	= DB::query($pple)->execute()->as_array();
			$fcount =  @$tmp[0]['tmpvar'];
			return $fcount;
		}
		return 0;
	
		
	}
	
	public function countAgritax()
	{

		//get role id for contractor
		$farmer = "select id from users_roles where name = 'agritax' ";
		$f =  DB::query($farmer)->execute()->as_array();
		$f_id =  @$f[0]['id']; 
		
		//got it, lets proceed
		if(!is_null($f_id)){
			
			//lets count number of users subscribed to the contractor role
			$pple =  "select count(distinct(user_id)) as tmpvar from users_user_roles
where role_id = $f_id ";

			$tmp 	= DB::query($pple)->execute()->as_array();
			$fcount =  @$tmp[0]['tmpvar'];
			return $fcount;
		}
		return 0;
	
		
	}
	
}
