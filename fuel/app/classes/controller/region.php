<?php
class Controller_Region extends Controller_Template
{

	public function action_index()
	{
		$data['regions'] = Model_Region::find('all');
		$this->template->title = "Regions";
		$this->template->content = View::forge('region/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('region');

		if ( ! $data['region'] = Model_Region::find($id))
		{
			Session::set_flash('error', 'Could not find region #'.$id);
			Response::redirect('region');
		}

		$this->template->title = "Region";
		$this->template->content = View::forge('region/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Region::validate('create');

			if ($val->run())
			{
				$region = Model_Region::forge(array(
					'name' => Input::post('name'),
					'description' => Input::post('description'),
				));

				if ($region and $region->save())
				{
					Session::set_flash('success', 'Added region #'.$region->id.'.');

					Response::redirect('region');
				}

				else
				{
					Session::set_flash('error', 'Could not save region.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Regions";
		$this->template->content = View::forge('region/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('region');

		if ( ! $region = Model_Region::find($id))
		{
			Session::set_flash('error', 'Could not find region #'.$id);
			Response::redirect('region');
		}

		$val = Model_Region::validate('edit');

		if ($val->run())
		{
			$region->name = Input::post('name');
			$region->description = Input::post('description');

			if ($region->save())
			{
				Session::set_flash('success', 'Updated region #' . $id);

				Response::redirect('region');
			}

			else
			{
				Session::set_flash('error', 'Could not update region #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$region->name = $val->validated('name');
				$region->description = $val->validated('description');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('region', $region, false);
		}

		$this->template->title = "Regions";
		$this->template->content = View::forge('region/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('region');

		if ($region = Model_Region::find($id))
		{
			$region->delete();

			Session::set_flash('success', 'Deleted region #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete region #'.$id);
		}

		Response::redirect('region');

	}

}
