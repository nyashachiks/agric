<?php

class Controller_Role extends Controller_Base
{

	public function before()
{
	parent::before();
	View::set_global('view_legend','Roles');
}

	public function action_index($id=null)
	{
		$data["role"] =  Auth\Model\Auth_Role::find('all');
		$this->template->title = 'Role &raquo; Index';
		$this->template->content = View::forge('role/index', $data);
	}
		public function action_create($id=NULL)
	{
		if (Input::method() == 'POST')
		{
				
				$role=array(
					'name' => Input::post('name'),
				);
				 $role=new Auth\Model\Auth_Role($role);

				if ($role->save())
				{
					Session::set_flash('success', 'Added address #');

					Response::redirect('role');
				}

				else
				{
					Session::set_flash('error', 'Could not save address.');
				}
			
			
		}
		//$this->template->set_global('groupid',$id);
		$this->template->title = "Post";
		$this->template->content = View::forge('role/create');

	}
	public function action_create4()
	{
			//if (Input::method() == 'POST')
			//{
			$role=Model_Role::forge(array('name'=>'tate'))	;
			$role->save();die;			
			
		echo -1;die;
	}
public function action_createrolepermission()
	{
			if (Input::method() == 'POST')
			{			
				$group= Auth\Model\Auth_Role::find(Input::post('group'));
				$role= Auth\Model\Auth_Permission::find(Input::post('role'));
				//var_dump($role);die;
				//Debug::dump($role);die;
				$group->permissions[]=$role;
				$group->save();
				$str='';
				foreach($group->permissions as $item)
					$str .= $item->description. ' | '; 
					 //Custom_Permissionutility::getControllerList()[$item->permission].' , ';
				echo	Str::sub($str,0,strlen($str)-2) ;
				//	echo  $arr;
					die;
				
				
			}
		echo -1;die;
	}
public function action_deleterolepermission($id=NULL)
	{
		is_null($id) and Response::redirect('role');

			if (Input::method() == 'POST')
			{			
				$group= Auth\Model\Auth_Role::find(Input::post('group'));
				$role= Auth\Model\Auth_Permission::find(Input::post('role'));
				$group->permissions[]=$role;
				$group->save();
				$str='';
				foreach($group->permissions as $item)
					$str .= $item->description. ' | '; 
					 //Custom_Permissionutility::getControllerList()[$item->permission].' , ';
				echo	Str::sub($str,0,strlen($str)-2) ;
				//	echo  $arr;
					die;
				
				
			}
		//echo -1;die;
		$data["role"] =  Auth\Model\Auth_Role::find($id);
		$this->template->title = 'Role &raquo; Index';
		$this->template->content = View::forge('role/delete', $data);
	}
public function action_delete($id=NULL,$roleid=NULL)
	{
		is_null($roleid) and Response::redirect('role');
		is_null($id) and Response::redirect('role/deleterolepermission/'.$roleid);
		$role= Auth\Model\Auth_Role::find($roleid);
		unset($role->permissions[$id]);
		$role->save();
		Session::set_flash('success','Permission has been removed!');
		Response::redirect('role/deleterolepermission/'.$roleid);
	}
}
