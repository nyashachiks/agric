<?php

// class for Geolocation stuff
class Controller_Geo extends Controller_Rest
{
	// method to locate a user
	public function action_locate()
	{
		$lat 		= Input::post('lat');	
		$lon 		= Input::post('lon');	
		$city_name  = Input::post('cit');	

		// lets save this stuff in session
		Session::set('geo.lat', $lat);
		Session::set('geo.lon', $lon);
		Session::set('geo.city', $city_name);
	}
}
