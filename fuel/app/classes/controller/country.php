<?php
class Controller_Country extends Controller_Template
{

	public function action_index()
	{
		$data['countries'] = Model_Country::find('all');
		$this->template->title = "Countries";
		$this->template->content = View::forge('country/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('country');

		if ( ! $data['country'] = Model_Country::find($id))
		{
			Session::set_flash('error', 'Could not find country #'.$id);
			Response::redirect('country');
		}

		$this->template->title = "Country";
		$this->template->content = View::forge('country/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Country::validate('create');

			if ($val->run())
			{
				$country = Model_Country::forge(array(
					'country_name' => Input::post('country_name'),
					'country_code' => Input::post('country_code'),
					
				));

				if ($country and $country->save())
				{
					Session::set_flash('success', 'Added country #'.$country->id.'.');

					Response::redirect('country');
				}

				else
				{
					Session::set_flash('error', 'Could not save country.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Countries";
		$this->template->content = View::forge('country/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('country');

		if ( ! $country = Model_Country::find($id))
		{
			Session::set_flash('error', 'Could not find country #'.$id);
			Response::redirect('country');
		}

		$val = Model_Country::validate('edit');

		if ($val->run())
		{
			$country->country_name = Input::post('country_name');
			$country->country_code = Input::post('country_code');

			if ($country->save())
			{
				Session::set_flash('success', 'Updated country #' . $id);

				Response::redirect('country');
			}

			else
			{
				Session::set_flash('error', 'Could not update country #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$country->country_name = $val->validated('country_name');
				$country->country_code = $val->validated('country_code');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('country', $country, false);
		}

		$this->template->title = "Countries";
		$this->template->content = View::forge('country/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('country');

		if ($country = Model_Country::find($id))
		{
			$country->delete();

			Session::set_flash('success', 'Deleted country #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete country #'.$id);
		}

		Response::redirect('country');

	}

}
