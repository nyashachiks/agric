<?php
class Controller_Task extends Controller_Template
{

	public function action_index()
	{
		$data['Tasks'] = Model_Task::find('all');
		$this->template->title = "Tasks";
		$this->template->content = View::forge('task/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('task');

		if ( ! $data['Task'] = Model_Task::find($id))
		{
			Session::set_flash('error', 'Could not find Task #'.$id);
			Response::redirect('task');
		}

		$this->template->title = "Task";
		$this->template->content = View::forge('task/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Task::validate('create');

			if ($val->run())
			{
				$Task = Model_Task::forge(array(
					'name' => Input::post('name'),
					'description' => Input::post('description'),
				));

				if ($Task and $Task->save())
				{
					Session::set_flash('success', 'Added Task #'.$Task->id.'.');

					Response::redirect('task');
				}

				else
				{
					Session::set_flash('error', 'Could not save Task.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Tasks";
		$this->template->content = View::forge('task/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('task');

		if ( ! $Task = Model_Task::find($id))
		{
			Session::set_flash('error', 'Could not find Task #'.$id);
			Response::redirect('task');
		}

		$val = Model_Task::validate('edit');

		if ($val->run())
		{
			$Task->name = Input::post('name');
			$Task->description = Input::post('description');

			if ($Task->save())
			{
				Session::set_flash('success', 'Updated Task #' . $id);

				Response::redirect('task');
			}

			else
			{
				Session::set_flash('error', 'Could not update Task #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$Task->name = $val->validated('name');
				$Task->description = $val->validated('description');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('Task', $Task, false);
		}

		$this->template->title = "Tasks";
		$this->template->content = View::forge('task/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('task');

		if ($Task = Model_Task::find($id))
		{
			$Task->delete();

			Session::set_flash('success', 'Deleted Task #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete Task #'.$id);
		}

		Response::redirect('task');

	}

}
