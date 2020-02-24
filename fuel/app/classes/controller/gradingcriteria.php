<?php
class Controller_Gradingcriteria extends Controller_Template
{

	public function action_index()
	{
		$data['gradingcriteria'] = Model_Gradingcriterium::find('all');
		$this->template->title = "Gradingcriteria";
		$this->template->content = View::forge('gradingcriteria/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('gradingcriteria');

		if ( ! $data['gradingcriterium'] = Model_Gradingcriterium::find($id))
		{
			Session::set_flash('error', 'Could not find gradingcriterium #'.$id);
			Response::redirect('gradingcriteria');
		}

		$this->template->title = "Gradingcriterium";
		$this->template->content = View::forge('gradingcriteria/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Gradingcriterium::validate('create');

			if ($val->run())
			{
				$gradingcriterium = Model_Gradingcriterium::forge(array(
					'crit_name' => Input::post('crit_name'),
					'short_name' => Input::post('short_name'),
				));

				if ($gradingcriterium and $gradingcriterium->save())
				{
					Session::set_flash('success', 'Added gradingcriterium #'.$gradingcriterium->id.'.');

					Response::redirect('gradingcriteria');
				}

				else
				{
					Session::set_flash('error', 'Could not save gradingcriterium.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Gradingcriteria";
		$this->template->content = View::forge('gradingcriteria/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('gradingcriteria');

		if ( ! $gradingcriterium = Model_Gradingcriterium::find($id))
		{
			Session::set_flash('error', 'Could not find gradingcriterium #'.$id);
			Response::redirect('gradingcriteria');
		}

		$val = Model_Gradingcriterium::validate('edit');

		if ($val->run())
		{
			$gradingcriterium->crit_name = Input::post('crit_name');
			$gradingcriterium->short_name = Input::post('short_name');

			if ($gradingcriterium->save())
			{
				Session::set_flash('success', 'Updated gradingcriterium #' . $id);

				Response::redirect('gradingcriteria');
			}

			else
			{
				Session::set_flash('error', 'Could not update gradingcriterium #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$gradingcriterium->crit_name = $val->validated('crit_name');
				$gradingcriterium->short_name = $val->validated('short_name');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('gradingcriterium', $gradingcriterium, false);
		}

		$this->template->title = "Gradingcriteria";
		$this->template->content = View::forge('gradingcriteria/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('gradingcriteria');

		if ($gradingcriterium = Model_Gradingcriterium::find($id))
		{
			$gradingcriterium->delete();

			Session::set_flash('success', 'Deleted gradingcriterium #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete gradingcriterium #'.$id);
		}

		Response::redirect('gradingcriteria');

	}

}
