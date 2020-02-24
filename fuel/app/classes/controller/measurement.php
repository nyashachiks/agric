<?php
class Controller_Measurement extends Controller_Template
{

	public function action_index()
	{
		$data['measurements'] = Model_Measurement::find('all');
		$this->template->title = "Measurements";
		$this->template->content = View::forge('measurement/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('measurement');

		if ( ! $data['measurement'] = Model_Measurement::find($id))
		{
			Session::set_flash('error', 'Could not find measurement #'.$id);
			Response::redirect('measurement');
		}

		$this->template->title = "Measurement";
		$this->template->content = View::forge('measurement/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Measurement::validate('create');

			if ($val->run())
			{
				$measurement = Model_Measurement::forge(array(
					'name' => Input::post('name'),
					'unit' => Input::post('unit'),
				));

				if ($measurement and $measurement->save())
				{
					Session::set_flash('success', 'Added measurement #'.$measurement->id.'.');

					Response::redirect('measurement');
				}

				else
				{
					Session::set_flash('error', 'Could not save measurement.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Measurements";
		$this->template->content = View::forge('measurement/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('measurement');

		if ( ! $measurement = Model_Measurement::find($id))
		{
			Session::set_flash('error', 'Could not find measurement #'.$id);
			Response::redirect('measurement');
		}

		$val = Model_Measurement::validate('edit');

		if ($val->run())
		{
			$measurement->name = Input::post('name');
			$measurement->unit = Input::post('unit');

			if ($measurement->save())
			{
				Session::set_flash('success', 'Updated measurement #' . $id);

				Response::redirect('measurement');
			}

			else
			{
				Session::set_flash('error', 'Could not update measurement #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$measurement->name = $val->validated('name');
				$measurement->unit = $val->validated('unit');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('measurement', $measurement, false);
		}

		$this->template->title = "Measurements";
		$this->template->content = View::forge('measurement/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('measurement');

		if ($measurement = Model_Measurement::find($id))
		{
			$measurement->delete();

			Session::set_flash('success', 'Deleted measurement #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete measurement #'.$id);
		}

		Response::redirect('measurement');

	}

}
