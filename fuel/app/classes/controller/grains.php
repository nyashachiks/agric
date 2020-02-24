<?php
class Controller_Grains extends Controller_Template
{

	public function action_index()
	{
		$data['grains'] = Model_Grain::find('all');
		$this->template->title = "Grains";
		$this->template->content = View::forge('grains/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('grains');

		if ( ! $data['grain'] = Model_Grain::find($id))
		{
			Session::set_flash('error', 'Could not find grain #'.$id);
			Response::redirect('grains');
		}

		$this->template->title = "Grain";
		$this->template->content = View::forge('grains/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Grain::validate('create');

			if ($val->run())
			{
				$grain = Model_Grain::forge(array(
					'name' => Input::post('name'),
					'description' => Input::post('description'),
				));

				if ($grain and $grain->save())
				{
					Session::set_flash('success', 'Added grain #'.$grain->id.'.');

					Response::redirect('grains');
				}

				else
				{
					Session::set_flash('error', 'Could not save grain.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Grains";
		$this->template->content = View::forge('grains/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('grains');

		if ( ! $grain = Model_Grain::find($id))
		{
			Session::set_flash('error', 'Could not find grain #'.$id);
			Response::redirect('grains');
		}

		$val = Model_Grain::validate('edit');

		if ($val->run())
		{
			$grain->name = Input::post('name');
			$grain->description = Input::post('description');

			if ($grain->save())
			{
				Session::set_flash('success', 'Updated grain #' . $id);

				Response::redirect('grains');
			}

			else
			{
				Session::set_flash('error', 'Could not update grain #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$grain->name = $val->validated('name');
				$grain->description = $val->validated('description');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('grain', $grain, false);
		}

		$this->template->title = "Grains";
		$this->template->content = View::forge('grains/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('grains');

		if ($grain = Model_Grain::find($id))
		{
			$grain->delete();

			Session::set_flash('success', 'Deleted grain #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete grain #'.$id);
		}

		Response::redirect('grains');

	}

}
