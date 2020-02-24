<?php
class Controller_Bankdetails extends Controller_Template
{

	public function action_index()
	{
		$data['bankdetails'] = Model_Bankdetail::find('all');
		$this->template->title = "Bankdetails";
		$this->template->content = View::forge('bankdetails/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('bankdetails');

		if ( ! $data['bankdetail'] = Model_Bankdetail::find($id))
		{
			Session::set_flash('error', 'Could not find bankdetail #'.$id);
			Response::redirect('bankdetails');
		}

		$this->template->title = "Bankdetail";
		$this->template->content = View::forge('bankdetails/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Bankdetail::validate('create');

			if ($val->run())
			{
				$bankdetail = Model_Bankdetail::forge(array(
					'farmer_id' => Input::post('farmer_id'),
					'bank_name' => Input::post('bank_name'),
					'branch_name' => Input::post('branch_name'),
					'account_number' => Input::post('account_number'),
					'account_name' => Input::post('account_name'),
				));

				if ($bankdetail and $bankdetail->save())
				{
					Session::set_flash('success', 'Added bankdetail #'.$bankdetail->id.'.');

					Response::redirect('bankdetails');
				}

				else
				{
					Session::set_flash('error', 'Could not save bankdetail.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Bankdetails";
		$this->template->content = View::forge('bankdetails/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('bankdetails');

		if ( ! $bankdetail = Model_Bankdetail::find($id))
		{
			Session::set_flash('error', 'Could not find bankdetail #'.$id);
			Response::redirect('bankdetails');
		}

		$val = Model_Bankdetail::validate('edit');

		if ($val->run())
		{
			$bankdetail->farmer_id = Input::post('farmer_id');
			$bankdetail->bank_name = Input::post('bank_name');
			$bankdetail->branch_name = Input::post('branch_name');
			$bankdetail->account_number = Input::post('account_number');
			$bankdetail->account_name = Input::post('account_name');

			if ($bankdetail->save())
			{
				Session::set_flash('success', 'Updated bankdetail #' . $id);

				Response::redirect('bankdetails');
			}

			else
			{
				Session::set_flash('error', 'Could not update bankdetail #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$bankdetail->farmer_id = $val->validated('farmer_id');
				$bankdetail->bank_name = $val->validated('bank_name');
				$bankdetail->branch_name = $val->validated('branch_name');
				$bankdetail->account_number = $val->validated('account_number');
				$bankdetail->account_name = $val->validated('account_name');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('bankdetail', $bankdetail, false);
		}

		$this->template->title = "Bankdetails";
		$this->template->content = View::forge('bankdetails/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('bankdetails');

		if ($bankdetail = Model_Bankdetail::find($id))
		{
			$bankdetail->delete();

			Session::set_flash('success', 'Deleted bankdetail #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete bankdetail #'.$id);
		}

		Response::redirect('bankdetails');

	}

}
