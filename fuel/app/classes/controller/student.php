<?php
class Controller_Student extends Controller_Template
{

	public function action_index()
	{
		$data['students'] = Model_Student::find('all');
		$this->template->title = "Students";
		$this->template->content = View::forge('student/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('student');

		if ( ! $data['student'] = Model_Student::find($id))
		{
			Session::set_flash('error', 'Could not find student #'.$id);
			Response::redirect('student');
		}

		$this->template->title = "Student";
		$this->template->content = View::forge('student/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Student::validate('create');

			if ($val->run())
			{
				$student = Model_Student::forge(array(
					'name' => Input::post('name'),
					'surname' => Input::post('surname'),
				));

				if ($student and $student->save())
				{
					Session::set_flash('success', 'Added student #'.$student->id.'.');

					Response::redirect('student');
				}

				else
				{
					Session::set_flash('error', 'Could not save student.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Students";
		$this->template->content = View::forge('student/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('student');

		if ( ! $student = Model_Student::find($id))
		{
			Session::set_flash('error', 'Could not find student #'.$id);
			Response::redirect('student');
		}

		$val = Model_Student::validate('edit');

		if ($val->run())
		{
			$student->name = Input::post('name');
			$student->surname = Input::post('surname');

			if ($student->save())
			{
				Session::set_flash('success', 'Updated student #' . $id);

				Response::redirect('student');
			}

			else
			{
				Session::set_flash('error', 'Could not update student #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$student->name = $val->validated('name');
				$student->surname = $val->validated('surname');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('student', $student, false);
		}

		$this->template->title = "Students";
		$this->template->content = View::forge('student/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('student');

		if ($student = Model_Student::find($id))
		{
			$student->delete();

			Session::set_flash('success', 'Deleted student #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete student #'.$id);
		}

		Response::redirect('student');

	}

}
