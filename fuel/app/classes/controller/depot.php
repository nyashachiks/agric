<?php
class Controller_Depot extends Controller_Template
{

	public function action_index()
	{
		$data['depots'] = Model_Depot::find('all');
		$this->template->title = "Depots";
		$this->template->content = View::forge('depot/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('depot');

		if ( ! $data['depot'] = Model_Depot::find($id))
		{
			Session::set_flash('error', 'Could not find depot #'.$id);
			Response::redirect('depot');
		}

		$this->template->title = "Depot";
		$this->template->content = View::forge('depot/view', $data);

	}
	// shows location of depots on a google map
	public function action_geo()
	{
		$this->template->title = "Location of depots";
		$this->template->content = View::forge('dash/depots');

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Depot::validate('create');

			if ($val->run())
			{
				$depot = Model_Depot::forge(array(
					'plant' => Input::post('plant'),
					'short_name' => Input::post('short_name'),
					'name' => Input::post('name'),
					'city' => Input::post('city'),
				));

				if ($depot and $depot->save())
				{
					Session::set_flash('success', 'Added depot #'.$depot->id.'.');

					Response::redirect('depot');
				}

				else
				{
					Session::set_flash('error', 'Could not save depot.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Depots";
		$this->template->content = View::forge('depot/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('depot');

		if ( ! $depot = Model_Depot::find($id))
		{
			Session::set_flash('error', 'Could not find depot #'.$id);
			Response::redirect('depot');
		}

		$val = Model_Depot::validate('edit');

		if ($val->run())
		{
			$depot->plant = Input::post('plant');
			$depot->short_name = Input::post('short_name');
			$depot->name = Input::post('name');
			$depot->city = Input::post('city');

			if ($depot->save())
			{
				Session::set_flash('success', 'Updated depot #' . $id);

				Response::redirect('depot');
			}

			else
			{
				Session::set_flash('error', 'Could not update depot #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$depot->plant = $val->validated('plant');
				$depot->short_name = $val->validated('short_name');
				$depot->name = $val->validated('name');
				$depot->city = $val->validated('city');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('depot', $depot, false);
		}

		$this->template->title = "Depots";
		$this->template->content = View::forge('depot/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('depot');

		if ($depot = Model_Depot::find($id))
		{
			$depot->delete();

			Session::set_flash('success', 'Deleted depot #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete depot #'.$id);
		}

		Response::redirect('depot');

	}

}
