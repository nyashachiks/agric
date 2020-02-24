<?php
class Controller_Farmguide extends Controller_Template
{

	public function action_index()
	{
		$data['farmguides'] = Model_Farmguide::find('all');
		$this->template->title = "Farmguides";
		$this->template->content = View::forge('farmguide/index', $data);

	}
	
	public function action_indexview()
	{
		$data['farmguides'] = Model_Farmguide::find('all');
		$this->template->title = "Farmguides";
		$this->template->content = View::forge('farmguide/indexview', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('farmguide');

		if ( ! $data['farmguide'] = Model_Farmguide::find($id))
		{
			Session::set_flash('error', 'Could not find farmguide #'.$id);
			Response::redirect('farmguide');
		}

		$this->template->title = "Farmguide";
		$this->template->content = View::forge('farmguide/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Farmguide::validate('create');

			if ($val->run())
			{
				$farmguide = Model_Farmguide::forge(array(
					'activity_id' => Input::post('activity_id'),
					'description' => Input::post('description'),
				));

				if ($farmguide and $farmguide->save())
				{
					Session::set_flash('success', 'Added farmguide #'.$farmguide->id.'.');

					Response::redirect('farmguide');
				}

				else
				{
					Session::set_flash('error', 'Could not save farmguide.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Farmguides";
		$this->template->content = View::forge('farmguide/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('farmguide');

		if ( ! $farmguide = Model_Farmguide::find($id))
		{
			Session::set_flash('error', 'Could not find farmguide #'.$id);
			Response::redirect('farmguide');
		}

		$val = Model_Farmguide::validate('edit');

		if ($val->run())
		{
			$farmguide->activity_id = Input::post('activity_id');
			$farmguide->description = Input::post('description');

			if ($farmguide->save())
			{
				Session::set_flash('success', 'Updated farmguide #' . $id);

				Response::redirect('farmguide');
			}

			else
			{
				Session::set_flash('error', 'Could not update farmguide #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$farmguide->activity_id = $val->validated('activity_id');
				$farmguide->description = $val->validated('description');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('farmguide', $farmguide, false);
		}

		$this->template->title = "Farmguides";
		$this->template->content = View::forge('farmguide/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('farmguide');

		if ($farmguide = Model_Farmguide::find($id))
		{
			$farmguide->delete();

			Session::set_flash('success', 'Deleted farmguide #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete farmguide #'.$id);
		}

		Response::redirect('farmguide');

	}

}
