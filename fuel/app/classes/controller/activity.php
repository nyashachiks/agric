<?php
class Controller_Activity extends Controller_Template
{

	public function action_index()
	{
		$data['activities'] = Model_Activity::find('all');
		$this->template->title = "Activities";
		$this->template->content = View::forge('activity/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('activity');

		if ( ! $data['activity'] = Model_Activity::find($id))
		{
			Session::set_flash('error', 'Could not find activity #'.$id);
			Response::redirect('activity');
		}

		$this->template->title = "Activity";
		$this->template->content = View::forge('activity/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Activity::validate('create');

			if ($val->run())
			{
				$activity = Model_Activity::forge(array(
					'name' => Input::post('name'),
					'budget_id' => Input::post('budget_id'),
				));

				if ($activity and $activity->save())
				{
					Session::set_flash('success', 'Added activity #'.$activity->id.'.');

					Response::redirect('activity');
				}

				else
				{
					Session::set_flash('error', 'Could not save activity.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Activities";
		$this->template->content = View::forge('activity/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('activity');

		if ( ! $activity = Model_Activity::find($id))
		{
			Session::set_flash('error', 'Could not find activity #'.$id);
			Response::redirect('activity');
		}

		$val = Model_Activity::validate('edit');

		if ($val->run())
		{
			$activity->name = Input::post('name');
			$activity->budget_id = Input::post('budget_id');

			if ($activity->save())
			{
				Session::set_flash('success', 'Updated activity #' . $id);

				Response::redirect('activity');
			}

			else
			{
				Session::set_flash('error', 'Could not update activity #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$activity->name = $val->validated('name');
				$activity->budget_id = $val->validated('budget_id');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('activity', $activity, false);
		}

		$this->template->title = "Activities";
		$this->template->content = View::forge('activity/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('activity');

		if ($activity = Model_Activity::find($id))
		{
			$activity->delete();

			Session::set_flash('success', 'Deleted activity #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete activity #'.$id);
		}

		Response::redirect('activity');

	}

}
