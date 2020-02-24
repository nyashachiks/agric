<?php
class Controller_Conversion extends Controller_Template
{

	public function action_index()
	{
		$data['conversions'] = Model_Conversion::find('all');
		$this->template->title = "Conversions";
		$this->template->content = View::forge('conversion/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('conversion');

		if ( ! $data['conversion'] = Model_Conversion::find($id))
		{
			Session::set_flash('error', 'Could not find conversion #'.$id);
			Response::redirect('conversion');
		}

		$this->template->title = "Conversion";
		$this->template->content = View::forge('conversion/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Conversion::validate('create');

			if ($val->run())
			{
				$conversion = Model_Conversion::forge(array(
					'name' => Input::post('name'),
					'quantity' => Input::post('quantity'),
					'measurement_id' => Input::post('measurement_id'),
				));

				if ($conversion and $conversion->save())
				{
					Session::set_flash('success', 'Added conversion #'.$conversion->id.'.');

					Response::redirect('conversion');
				}

				else
				{
					Session::set_flash('error', 'Could not save conversion.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Conversions";
		$this->template->content = View::forge('conversion/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('conversion');

		if ( ! $conversion = Model_Conversion::find($id))
		{
			Session::set_flash('error', 'Could not find conversion #'.$id);
			Response::redirect('conversion');
		}

		$val = Model_Conversion::validate('edit');

		if ($val->run())
		{
			$conversion->name = Input::post('name');
			$conversion->quantity = Input::post('quantity');
			$conversion->measurement_id = Input::post('measurement_id');

			if ($conversion->save())
			{
				Session::set_flash('success', 'Updated conversion #' . $id);

				Response::redirect('conversion');
			}

			else
			{
				Session::set_flash('error', 'Could not update conversion #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$conversion->name = $val->validated('name');
				$conversion->quantity = $val->validated('quantity');
				$conversion->measurement_id = $val->validated('measurement_id');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('conversion', $conversion, false);
		}

		$this->template->title = "Conversions";
		$this->template->content = View::forge('conversion/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('conversion');

		if ($conversion = Model_Conversion::find($id))
		{
			$conversion->delete();

			Session::set_flash('success', 'Deleted conversion #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete conversion #'.$id);
		}

		Response::redirect('conversion');

	}

}
