<?php
class Controller_Condtion extends Controller_Template
{

	public function action_index()
	{
		$data['condtions'] = Model_Condtion::find('all');
		$this->template->title = "Condtions";
		$this->template->content = View::forge('condtion/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('condtion');

		if ( ! $data['condtion'] = Model_Condtion::find($id))
		{
			Session::set_flash('error', 'Could not find condtion #'.$id);
			Response::redirect('condtion');
		}

		$this->template->title = "Condtion";
		$this->template->content = View::forge('condtion/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Condtion::validate('create');

			if ($val->run())
			{
				$condtion = Model_Condtion::forge(array(
					'name' => Input::post('name'),
					'description' => Input::post('description'),
				));

				if ($condtion and $condtion->save())
				{
					Session::set_flash('success', 'Added condtion #'.$condtion->id.'.');

					Response::redirect('condtion');
				}

				else
				{
					Session::set_flash('error', 'Could not save condtion.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Condtions";
		$this->template->content = View::forge('condtion/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('condtion');

		if ( ! $condtion = Model_Condtion::find($id))
		{
			Session::set_flash('error', 'Could not find condtion #'.$id);
			Response::redirect('condtion');
		}

		$val = Model_Condtion::validate('edit');

		if ($val->run())
		{
			$condtion->name = Input::post('name');
			$condtion->description = Input::post('description');

			if ($condtion->save())
			{
				Session::set_flash('success', 'Updated condtion #' . $id);

				Response::redirect('condtion');
			}

			else
			{
				Session::set_flash('error', 'Could not update condtion #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$condtion->name = $val->validated('name');
				$condtion->description = $val->validated('description');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('condtion', $condtion, false);
		}

		$this->template->title = "Condtions";
		$this->template->content = View::forge('condtion/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('condtion');

		if ($condtion = Model_Condtion::find($id))
		{
			$condtion->delete();

			Session::set_flash('success', 'Deleted condtion #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete condtion #'.$id);
		}

		Response::redirect('condtion');

	}

}
