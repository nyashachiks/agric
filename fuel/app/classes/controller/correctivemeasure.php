<?php
class Controller_Correctivemeasure extends Controller_Template
{

	public function action_index()
	{
		$data['correctivemeasures'] = Model_Correctivemeasure::find('all');
		$this->template->title = "Correctivemeasures";
		$this->template->content = View::forge('correctivemeasure/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('correctivemeasure');

		if ( ! $data['correctivemeasure'] = Model_Correctivemeasure::find($id))
		{
			Session::set_flash('error', 'Could not find correctivemeasure #'.$id);
			Response::redirect('correctivemeasure');
		}

		$this->template->title = "Correctivemeasure";
		$this->template->content = View::forge('correctivemeasure/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Correctivemeasure::validate('create');

			if ($val->run())
			{
				$correctivemeasure = Model_Correctivemeasure::forge(array(
					'description' => Input::post('description'),
					'disease_id' => Input::post('disease_id'),
				));

				if ($correctivemeasure and $correctivemeasure->save())
				{
					Session::set_flash('success', 'Added correctivemeasure #'.$correctivemeasure->id.'.');

					Response::redirect('correctivemeasure');
				}

				else
				{
					Session::set_flash('error', 'Could not save correctivemeasure.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Correctivemeasures";
		$this->template->content = View::forge('correctivemeasure/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('correctivemeasure');

		if ( ! $correctivemeasure = Model_Correctivemeasure::find($id))
		{
			Session::set_flash('error', 'Could not find correctivemeasure #'.$id);
			Response::redirect('correctivemeasure');
		}

		$val = Model_Correctivemeasure::validate('edit');

		if ($val->run())
		{
			$correctivemeasure->description = Input::post('description');
			$correctivemeasure->disease_id = Input::post('disease_id');

			if ($correctivemeasure->save())
			{
				Session::set_flash('success', 'Updated correctivemeasure #' . $id);

				Response::redirect('correctivemeasure');
			}

			else
			{
				Session::set_flash('error', 'Could not update correctivemeasure #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$correctivemeasure->description = $val->validated('description');
				$correctivemeasure->disease_id = $val->validated('disease_id');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('correctivemeasure', $correctivemeasure, false);
		}

		$this->template->title = "Correctivemeasures";
		$this->template->content = View::forge('correctivemeasure/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('correctivemeasure');

		if ($correctivemeasure = Model_Correctivemeasure::find($id))
		{
			$correctivemeasure->delete();

			Session::set_flash('success', 'Deleted correctivemeasure #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete correctivemeasure #'.$id);
		}

		Response::redirect('correctivemeasure');

	}

}
