<?php
class Controller_Group extends Controller_Base
{
	public function action_index()
	{
		$data['structures'] = Auth\Model\Auth_Group::find('all');
		$this->template->title = "Structures";
		$this->template->content = View::forge('group/index', $data);

	}
	public function action_selectroles($id)
	{
		$group=Auth\Model\Auth_Group::find($id);
		if (Input::method() == 'POST')
		{
				
				//saving role for each group
				foreach(Input::post('select') as $item)
				{
					$role= Auth\Model\Auth_Role::find($item);
					$group->roles[]=$role;
					$group->save();
				}
			Session::set_flash('success','Organisations successfully added to placement');
			Response::redirect('group');
		}
		$data['selected_group']=$group;
		$data['roles'] = Auth\Model\Auth_Role::find('all');
		$this->template->title ='Roles ';
		$this->template->content = View::forge('group/role_selection', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('structure');

		if ( ! $data['structure'] = Model_Structure::find($id))
		{
			Session::set_flash('error', 'Could not find structure #'.$id);
			Response::redirect('structure');
		}

		$this->template->title = "Structure";
		$this->template->content = View::forge('group/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Structure::validate('create');
			
			
			
				$group= Auth\Model\Auth_Group::forge(array(
				'name'=> Input::post('name'),
				));
				
				$structure=Auth\Model\Auth_Structure::find(Input::post('type'));
				
				$group->structures[]=$structure;
				//$group->save();
			
				if ($group->save())
				{
					Session::set_flash('success', 'Added structure ');

					Response::redirect('structure');
				}

				else
				{
					Session::set_flash('error', 'Could not save structure.');
				}
			
		}
				
		$this->template->title = "Structures";
		$this->template->content = View::forge('group/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('structure');

		if ( ! $structure = Model_Structure::find($id))
		{
			Session::set_flash('error', 'Could not find structure #'.$id);
			Response::redirect('structure');
		}

		$val = Model_Structure::validate('edit');

		if ($val->run())
		{
			$structure->name = Input::post('name');
			$structure->type = Input::post('type');

			if ($structure->save())
			{
				Session::set_flash('success', 'Updated structure #' . $id);

				Response::redirect('structure');
			}

			else
			{
				Session::set_flash('error', 'Could not update structure #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$structure->name = $val->validated('name');
				$structure->type = $val->validated('type');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('structure', $structure, false);
		}

		$this->template->title = "Structures";
		$this->template->content = View::forge('group/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('structure');

		if ($structure = Model_Structure::find($id))
		{
			$structure->delete();

			Session::set_flash('success', 'Deleted structure #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete structure #'.$id);
		}

		Response::redirect('group');

	}

}
