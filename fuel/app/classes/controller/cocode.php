<?php
class Controller_Cocode extends Controller_Template
{

	public function action_index()
	{
		$data['cocodes'] = Model_Cocode::find('all');
		$this->template->title = "Cocodes";
		$this->template->content = View::forge('cocode/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('cocode');

		if ( ! $data['cocode'] = Model_Cocode::find($id))
		{
			Session::set_flash('error', 'Could not find cocode #'.$id);
			Response::redirect('cocode');
		}

		$this->template->title = "Cocode";
		$this->template->content = View::forge('cocode/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Cocode::validate('create');

			if ($val->run())
			{
				$cocode = Model_Cocode::forge(array(
					'id' => Input::post('id'),
					'co_code' => Input::post('co_code'),
					'co_name' => Input::post('co_name'),
					'city' => Input::post('city'),
					'currency' => Input::post('currency'),
				));

				if ($cocode and $cocode->save())
				{
					Session::set_flash('success', 'Added cocode #'.$cocode->id.'.');

					Response::redirect('cocode');
				}

				else
				{
					Session::set_flash('error', 'Could not save cocode.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Cocodes";
		$this->template->content = View::forge('cocode/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('cocode');

		if ( ! $cocode = Model_Cocode::find($id))
		{
			Session::set_flash('error', 'Could not find cocode #'.$id);
			Response::redirect('cocode');
		}

		$val = Model_Cocode::validate('edit');

		if ($val->run())
		{
			$cocode->id = Input::post('id');
			$cocode->co_code = Input::post('co_code');
			$cocode->co_name = Input::post('co_name');
			$cocode->city = Input::post('city');
			$cocode->currency = Input::post('currency');

			if ($cocode->save())
			{
				Session::set_flash('success', 'Updated cocode #' . $id);

				Response::redirect('cocode');
			}

			else
			{
				Session::set_flash('error', 'Could not update cocode #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$cocode->id = $val->validated('id');
				$cocode->co_code = $val->validated('co_code');
				$cocode->co_name = $val->validated('co_name');
				$cocode->city = $val->validated('city');
				$cocode->currency = $val->validated('currency');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('cocode', $cocode, false);
		}

		$this->template->title = "Cocodes";
		$this->template->content = View::forge('cocode/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('cocode');

		if ($cocode = Model_Cocode::find($id))
		{
			$cocode->delete();

			Session::set_flash('success', 'Deleted cocode #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete cocode #'.$id);
		}

		Response::redirect('cocode');

	}

}
