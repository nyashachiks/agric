<?php

class Controller_Reports_Farm_Bydistrict extends Controller_Template
{
	public function before()
	{
		parent::before();
		View::set_global('view_legend','Reports');
	}
	
	public function action_index()
	{
		$data = array();
		
		if(Input::method() == 'POST'){
			
			$district =  Input::post('district');
			
			//lets get the farms that belong to this district
			$sql = "SELECT f.id as f_id,
					name, size, units
					,address,district,province,phone
					from farms f join addresses ad on f.address_id = ad.id
					where ad.district = '{$district}' ";

			$data['farms'] 	  = DB::query($sql)->execute();
			$data['district'] =  $district;
		}
		
		$this->template->content =  View::forge('reports/farm_by_district', $data);
		$this->template->title = "Farm by district report";
	}
	
}