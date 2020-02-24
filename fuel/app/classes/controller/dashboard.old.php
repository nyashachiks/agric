<?php
class Controller_Dashboard extends Controller_Base
{

	public function action_index()
	{
		
		$this->template->title = "Dashboard";
		$this->template->content = View::forge('dashboard/dashboard');

	}
	
}