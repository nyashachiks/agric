<?php
class Controller_Grades extends Controller_Template
{

	public function action_index()
	{
		$data['grades'] = Model_Grade::find('all');
		$this->template->title = "Grades";
		$this->template->content = View::forge('grades/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('grades');

		if ( ! $data['grade'] = Model_Grade::find($id))
		{
			Session::set_flash('error', 'Could not find grade #'.$id);
			Response::redirect('grades');
		}

		$this->template->title = "Grade";
		$this->template->content = View::forge('grades/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Grade::validate('create');

			if ($val->run())
			{
				$grade = Model_Grade::forge(array(
					'name' => Input::post('name'),
					'description' => Input::post('description'),
				));

				if ($grade and $grade->save())
				{
					Session::set_flash('success', 'Added grade #'.$grade->id.'.');

					Response::redirect('grades');
				}

				else
				{
					Session::set_flash('error', 'Could not save grade.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Grades";
		$this->template->content = View::forge('grades/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('grades');

		if ( ! $grade = Model_Grade::find($id))
		{
			Session::set_flash('error', 'Could not find grade #'.$id);
			Response::redirect('grades');
		}

		$val = Model_Grade::validate('edit');

		if ($val->run())
		{
			$grade->name = Input::post('name');
			$grade->description = Input::post('description');

			if ($grade->save())
			{
				Session::set_flash('success', 'Updated grade #' . $id);

				Response::redirect('grades');
			}

			else
			{
				Session::set_flash('error', 'Could not update grade #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$grade->name = $val->validated('name');
				$grade->description = $val->validated('description');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('grade', $grade, false);
		}

		$this->template->title = "Grades";
		$this->template->content = View::forge('grades/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('grades');

		if ($grade = Model_Grade::find($id))
		{
			$grade->delete();

			Session::set_flash('success', 'Deleted grade #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete grade #'.$id);
		}

		Response::redirect('grades');

	}

}
