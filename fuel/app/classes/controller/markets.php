<?php
class Controller_Markets extends Controller_Template
{
	public function before()
	{
		parent::before();
		View::set_global('view_legend','Markets');
	}
	
	// shows location of markets on a google map
	public function action_geo()
	{
		$data['symptoms'] = Model_Symptom::find('all');
		$this->template->title = "Location of markets";
		$this->template->content = View::forge('dash/markets', $data);

	}
}
