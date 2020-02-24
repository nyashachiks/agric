<?php
class Controller_Agronomists extends Controller_Template
{
	public function action_index()
	{
		
		//$data['users'] = Model_User::find('all');
		$data['users'] = Auth\Model\Auth_User::find('all');
		
		$this->template->title = "List of agronomists";
		$this->template->content = View::forge('agronomists/index', $data);

	}
}
