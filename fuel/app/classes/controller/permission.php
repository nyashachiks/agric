<?php

class Controller_Permission extends Controller_Base
{
public function before()
{
	parent::before();
	View::set_global('view_legend','Permissions');
}

	public function action_index()
	{
		$data["permission"] = Auth\Model\Auth_Permission::find('all');
		$this->template->title = 'Permission &raquo; Index';
		$this->template->content = View::forge('permission/index', $data);
	}
	public function action_test()
	{		$p=Auth\Model\Auth_Permission::find(10);
			$u=Auth\Model\Auth_User::find(11);
			
					$u->permissions[]=$p;
					$u->save();
					die;
	}
	public function action_create()
	{
		$next=0;
		//$data=NULL;
		//$data=Model_Mainmenu::find('all');
		if(Input::method() == 'POST' && Input::post('next')==0)
		{
			$next=1;
			$data=Model_Mainmenu::find(Input::post('mainmenu'));
			
			if(isset($data->dropdowns))
			{
				if(count($data->dropdowns)>0)
					$next=2;
			}
		}
		
		elseif (Input::method() == 'POST')
		{
				
				$permission= Auth\Model\Auth_Permission::forge(array(
			     'area' =>Input::post('mainmenu'),
    			'permission' =>(Input::post('submenu')==NULL?-1:Input::post('submenu')),
			    'description' =>Input::post('description'),
			    'actions' => Input::post('action') ,
				));
				if($permission->save())
				{
					
					Session::set_flash('success','Record successfully saved!');
					Response::redirect('permission');
					
				}
				else{
					Session::set_flash('error','Record save failed');
				}
				
		}
		else{
			$data=Model_Mainmenu::find('all');
			$next=0;
		}
		//Debug::dump();die;
		//$data["subnav"] = array('index'=> 'active' );
		$this->template->set_global('mainmenu',$data);
		$this->template->set_global('next',$next);
		$this->template->title = 'Permission &raquo; Index';
		$this->template->content = View::forge('permission/create');
	}
}
