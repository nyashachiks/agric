<?php
/**
* Please note a default value should be created in the id, with id 0,
* to represent that a company can list all the structures
*/
class Controller_Structure extends Controller_Base
{

	public function action_index()
	{
		$data['structures'] = Auth\Model\Auth_Structure::query()->where('id','>',0)->get();
		$this->template->title = "Structures";
		$this->template->content = View::forge('structure/index', $data);

	}
	public function action_selectorg($id)
	{	
		$structure=Auth\Model\Auth_Structure::find($id);
		if (Input::method() == 'POST')
		{
				
				//saving role for each group
				foreach(Input::post('select') as $item)
				{
					$structure_view= Auth\Model\Auth_Structure::find($item);
					$structure->structures[]=$structure_view;
					$structure->save();
				}
			Session::set_flash('success','Success!');
			Response::redirect('structure');
		}
		$data['struct_selected']=$structure;// Auth\Model\Auth_Structure::find($item);
		$data['structures'] = Auth\Model\Auth_Structure::query()->where('id','>',0)->get();// find('all',array('where'=>array('id',0)));
		$this->template->title =' Structure ' ;
		$this->template->content = View::forge('structure/structure_selection', $data);

	}
public function action_selectroles($id)
	{	
		$structure=Auth\Model\Auth_Structure::find($id);
		if (Input::method() == 'POST')
		{
				
				//saving role for each group
				foreach(Input::post('select') as $item)
				{
				$role=Auth\Model\Auth_Role::find($item);
				
				$structure->roles[]=$role;
				
				$structure->save();
					
				}
			Session::set_flash('success','Success!');
			Response::redirect('structure');
		}
		$data['struct_selected']=$structure;// Auth\Model\Auth_Structure::find($item);
		$data['roles'] = Auth\Model\Auth_Role::query()->get();//->where('id','>',0)->get();// find('all',array('where'=>array('id',0)));
		$this->template->title =' Structure ' ;
		$this->template->content = View::forge('structure/roles_selection', $data);

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
		$this->template->content = View::forge('structure/view', $data);

	}
	public function action_testr()
	{
		/*$str=Auth\Model\Auth_Structure::find(2);
		$role=Auth\Model\Auth_Rolestructure::find(3);
		$str->roles[]=$role;
		$str->save();*/
		$str=Auth\Model\Auth_Structure::find(2);
		$str2=Auth\Model\Auth_Structure::find(3);
		//$role=Auth\Model\Auth_Rolestructure::find(3);
		$str->structures[]=$str2;
		$str->save();
		//Debug::dump($role);die;
		
	}
	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			//$val = Model_Structure::validate('create');

				$structure =  Auth\Model\Auth_Structure::forge(array(
					'name' => Input::post('name'),
					'description' => Input::post('description'),
				));
				
				//Debug::dump($structure->save());die;
				if ($structure->save())
				{
					Session::set_flash('success', 'Added structure #'.$structure->id.'.');

					Response::redirect('structure');
				}

				else
				{
					Session::set_flash('error', 'Could not save structure.');
				}
			/*}
			else
			{
				Session::set_flash('error', $val->error());
			}*/
		}

		$this->template->title = "Structures";
		$this->template->content = View::forge('structure/create');

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
		$this->template->content = View::forge('structure/edit');

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

		Response::redirect('structure');

	}

}
