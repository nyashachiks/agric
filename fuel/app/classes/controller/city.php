<?php
class Controller_City extends Controller_Template
{

	public function action_index()
	{
		$data['cities'] = Model_City::find('all');
		$this->template->title = "Cities";
		$this->template->content = View::forge('city/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('city');

		if ( ! $data['city'] = Model_City::find($id))
		{
			Session::set_flash('error', 'Could not find city #'.$id);
			Response::redirect('city');
		}

		$this->template->title = "City";
		$this->template->content = View::forge('city/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_City::validate('create');

			if ($val->run())
			{
				$city = Model_City::forge(array(
					'city' => Input::post('city'),
				));

				if ($city and $city->save())
				{
					Session::set_flash('success', 'Added city #'.$city->id.'.');

					Response::redirect('city');
				}

				else
				{
					Session::set_flash('error', 'Could not save city.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Cities";
		$this->template->content = View::forge('city/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('city');

		if ( ! $city = Model_City::find($id))
		{
			Session::set_flash('error', 'Could not find city #'.$id);
			Response::redirect('city');
		}

		$val = Model_City::validate('edit');

		if ($val->run())
		{
			$city->city = Input::post('city');

			if ($city->save())
			{
				Session::set_flash('success', 'Updated city #' . $id);

				Response::redirect('city');
			}

			else
			{
				Session::set_flash('error', 'Could not update city #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$city->city = $val->validated('city');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('city', $city, false);
		}

		$this->template->title = "Cities";
		$this->template->content = View::forge('city/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('city');

		if ($city = Model_City::find($id))
		{
			$city->delete();

			Session::set_flash('success', 'Deleted city #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete city #'.$id);
		}

		Response::redirect('city');

	}

}
