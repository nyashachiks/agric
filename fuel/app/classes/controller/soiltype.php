<?php
class Controller_Soiltype extends Controller_Template
{

	public function action_index()
	{
		$data['soiltypes'] = Model_Soiltype::find('all');
		$this->template->title = "Soiltypes";
		$this->template->content = View::forge('soiltype/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('soiltype');

		if ( ! $data['soiltype'] = Model_Soiltype::find($id))
		{
			Session::set_flash('error', 'Could not find soiltype #'.$id);
			Response::redirect('soiltype');
		}

		$this->template->title = "Soiltype";
		$this->template->content = View::forge('soiltype/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Soiltype::validate('create');

			if ($val->run())
			{
				$soiltype = Model_Soiltype::forge(array(
					'name' => Input::post('name'),
					'description' => Input::post('description'),
				));

				if ($soiltype and $soiltype->save())
				{
					Session::set_flash('success', 'Added soiltype #'.$soiltype->id.'.');

					Response::redirect('soiltype');
				}

				else
				{
					Session::set_flash('error', 'Could not save soiltype.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Soiltypes";
		$this->template->content = View::forge('soiltype/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('soiltype');

		if ( ! $soiltype = Model_Soiltype::find($id))
		{
			Session::set_flash('error', 'Could not find soiltype #'.$id);
			Response::redirect('soiltype');
		}

		$val = Model_Soiltype::validate('edit');

		if ($val->run())
		{
			$soiltype->name = Input::post('name');
			$soiltype->description = Input::post('description');

			if ($soiltype->save())
			{
				Session::set_flash('success', 'Updated soiltype #' . $id);

				Response::redirect('soiltype');
			}

			else
			{
				Session::set_flash('error', 'Could not update soiltype #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$soiltype->name = $val->validated('name');
				$soiltype->description = $val->validated('description');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('soiltype', $soiltype, false);
		}

		$this->template->title = "Soiltypes";
		$this->template->content = View::forge('soiltype/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('soiltype');

		if ($soiltype = Model_Soiltype::find($id))
		{
			$soiltype->delete();

			Session::set_flash('success', 'Deleted soiltype #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete soiltype #'.$id);
		}

		Response::redirect('soiltype');

	}

}
