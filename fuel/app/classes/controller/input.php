<?php
class Controller_Input extends Controller_Template
{

	public function action_index()
	{
		$data['inputs'] = Model_Input::find('all');
		$this->template->title = "Inputs";
		$this->template->content = View::forge('input/index', $data);

	}
	public function action_indexview()
	{
		$data['inputs'] = Model_Input::find('all');
		$this->template->title = "Inputs";
		$this->template->content = View::forge('input/indexview', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('input');

		if ( ! $data['input'] = Model_Input::find($id))
		{
			Session::set_flash('error', 'Could not find input #'.$id);
			Response::redirect('input');
		}

		$this->template->title = "Input";
		$this->template->content = View::forge('input/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Input::validate('create');

			if ($val->run())
			{
				$input = Model_Input::forge(array(
					'name' => Input::post('name'),
					'activity_id' => Input::post('activity_id'),
					'unit' => Input::post('unit'),
					'cost_per_unit' => Input::post('cost_per_unit'),
					'quantity' => Input::post('quantity'),
					'total_cost' => Input::post('total_cost'),
				));

				if ($input and $input->save())
				{
					Session::set_flash('success', 'Added input #'.$input->id.'.');

					Response::redirect('input');
				}

				else
				{
					Session::set_flash('error', 'Could not save input.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Inputs";
		$this->template->content = View::forge('input/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('input');

		if ( ! $input = Model_Input::find($id))
		{
			Session::set_flash('error', 'Could not find input #'.$id);
			Response::redirect('input');
		}

		$val = Model_Input::validate('edit');

		if ($val->run())
		{
			$input->name = Input::post('name');
			$input->activity_id = Input::post('activity_id');
			$input->unit = Input::post('unit');
			$input->cost_per_unit = Input::post('cost_per_unit');
			$input->quantity = Input::post('quantity');
			$input->total_cost = Input::post('total_cost');

			if ($input->save())
			{
				Session::set_flash('success', 'Updated input #' . $id);

				Response::redirect('input');
			}

			else
			{
				Session::set_flash('error', 'Could not update input #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$input->name = $val->validated('name');
				$input->activity_id = $val->validated('activity_id');
				$input->unit = $val->validated('unit');
				$input->cost_per_unit = $val->validated('cost_per_unit');
				$input->quantity = $val->validated('quantity');
				$input->total_cost = $val->validated('total_cost');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('input', $input, false);
		}

		$this->template->title = "Inputs";
		$this->template->content = View::forge('input/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('input');

		if ($input = Model_Input::find($id))
		{
			$input->delete();

			Session::set_flash('success', 'Deleted input #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete input #'.$id);
		}

		Response::redirect('input');

	}

}
