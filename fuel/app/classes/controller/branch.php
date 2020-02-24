<?php
class Controller_Branch extends Controller_Base
{

	public function action_index()
	{
		$data['branches'] = Model_Branch::find('all');
		$this->template->title = "Branches";
		$this->template->content = View::forge('branch/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('branch');

		if ( ! $data['branch'] = Model_Branch::find($id))
		{
			Session::set_flash('error', 'Could not find branch #'.$id);
			Response::redirect('branches');
		}

		$this->template->title = "Branch";
		$this->template->content = View::forge('branch/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Branch::validate('create');

			if ($val->run())
			{
				$branch = Model_Branch::forge(array(
					'id' => Input::post('id'),
					'branch_code' => Input::post('branch_code'),
					'bank_name' => Input::post('bank_name'),
					'bank_address' => Input::post('bank_address'),
					'bank_city' => Input::post('bank_city'),
					'branch_name' => Input::post('branch_name'),
					'swift_code' => Input::post('swift_code'),
				));

				if ($branch and $branch->save())
				{
					Session::set_flash('success', 'Added branch #'.$branch->id.'.');

					Response::redirect('branch');
				}

				else
				{
					Session::set_flash('error', 'Could not save branch.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Branches";
		$this->template->content = View::forge('branch/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('branch');

		if ( ! $branch = Model_Branch::find($id))
		{
			Session::set_flash('error', 'Could not find branch #'.$id);
			Response::redirect('branch');
		}

		$val = Model_Branch::validate('edit');

		if ($val->run())
		{
			$branch->id = Input::post('id');
			$branch->branch_code = Input::post('branch_code');
			$branch->bank_name = Input::post('bank_name');
			$branch->bank_address = Input::post('bank_address');
			$branch->bank_city = Input::post('bank_city');
			$branch->branch_name = Input::post('branch_name');
			$branch->swift_code = Input::post('swift_code');

			if ($branch->save())
			{
				Session::set_flash('success', 'Updated branch #' . $id);

				Response::redirect('branch');
			}

			else
			{
				Session::set_flash('error', 'Could not update branch #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$branch->id = $val->validated('id');
				$branch->branch_code = $val->validated('branch_code');
				$branch->bank_name = $val->validated('bank_name');
				$branch->bank_address = $val->validated('bank_address');
				$branch->bank_city = $val->validated('bank_city');
				$branch->branch_name = $val->validated('branch_name');
				$branch->swift_code = $val->validated('swift_code');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('branch', $branch, false);
		}

		$this->template->title = "Branches";
		$this->template->content = View::forge('branch/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('branch');

		if ($branch = Model_Branch::find($id))
		{
			$branch->delete();

			Session::set_flash('success', 'Deleted branch #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete branch #'.$id);
		}

		Response::redirect('branches');

	}

}
