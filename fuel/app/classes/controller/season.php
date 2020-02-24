<?php
class Controller_Season extends Controller_Template
{

	public function action_index()
	{
		$data['seasons'] = Model_Season::find('all');
		$this->template->title = "Seasons";
		$this->template->content = View::forge('season/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('season');

		if ( ! $data['season'] = Model_Season::find($id))
		{
			Session::set_flash('error', 'Could not find season #'.$id);
			Response::redirect('season');
		}

		$this->template->title = "Season";
		$this->template->content = View::forge('season/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Season::validate('create');

			if ($val->run())
			{
				$season = Model_Season::forge(array(
					'name' => Input::post('name'),
				));

				if ($season and $season->save())
				{
					Session::set_flash('success', 'Added season #'.$season->id.'.');

					Response::redirect('season');
				}

				else
				{
					Session::set_flash('error', 'Could not save season.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Seasons";
		$this->template->content = View::forge('season/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('season');

		if ( ! $season = Model_Season::find($id))
		{
			Session::set_flash('error', 'Could not find season #'.$id);
			Response::redirect('season');
		}

		$val = Model_Season::validate('edit');

		if ($val->run())
		{
			$season->name = Input::post('name');

			if ($season->save())
			{
				Session::set_flash('success', 'Updated season #' . $id);

				Response::redirect('season');
			}

			else
			{
				Session::set_flash('error', 'Could not update season #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$season->name = $val->validated('name');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('season', $season, false);
		}

		$this->template->title = "Seasons";
		$this->template->content = View::forge('season/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('season');

		if ($season = Model_Season::find($id))
		{
			$season->delete();

			Session::set_flash('success', 'Deleted season #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete season #'.$id);
		}

		Response::redirect('season');

	}

}
