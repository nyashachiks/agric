<?php
class Controller_Rest_Countrydynamics extends Controller_Rest
{
	
	//input = country
	public function get_provinces(){
		$target = isset($_GET['countryid'])  ? $_GET['countryid'] : "";
		$provinces = Model_Province::list_given_country($target);
		return $this->response($provinces);
	}
	
	//input = province
	public function get_districts(){
		$target = isset($_GET['provinceid'])  ? $_GET['provinceid'] : "";
		$districts = Model_District::list_given_province($target); 
		return $this->response($districts);
	}
	
}
