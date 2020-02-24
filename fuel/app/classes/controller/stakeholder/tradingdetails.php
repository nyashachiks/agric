<?php
class Controller_Stakeholder_Tradingdetails extends Controller_Template
{

	public function action_index()
	{
		list(, $userid) = Auth::get_user_id();
		$data['stakeholder_Tradingdetails'] = Model_Stakeholder_Tradingdetail::query()
		->where('user_id',$userid)->get();
		$this->template->title = "Stakeholder_Tradingdetails";
		$this->template->content = View::forge('stakeholder/tradingdetails/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('stakeholder/tradingdetails');

		if ( ! $data['stakeholder_Tradingdetail'] = Model_Stakeholder_Tradingdetail::find($id))
		{
			Session::set_flash('error', 'Could not find stakeholder_Tradingdetail #'.$id);
			Response::redirect('stakeholder/tradingdetails');
		}

		$this->template->title = "Stakeholder_Tradingdetail";
		$this->template->content = View::forge('stakeholder/tradingdetails/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Stakeholder_Tradingdetail::validate('create');

			if ($val->run())
			{
				list(, $userid) = Auth::get_user_id();
				$stakeholder_Tradingdetail = Model_Stakeholder_Tradingdetail::forge(array(
					'name' => Input::post('name'),
					'additional_details' => Input::post('additional_details'),
					'user_id'=>$userid,
				));

				if ($stakeholder_Tradingdetail and $stakeholder_Tradingdetail->save())
				{
					Session::set_flash('success', 'Added stakeholder_Tradingdetail #'.$stakeholder_Tradingdetail->id.'.');

					Response::redirect('stakeholder/tradingdetails');
				}

				else
				{
					Session::set_flash('error', 'Could not save stakeholder_Tradingdetail.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Stakeholder_Tradingdetails";
		$this->template->content = View::forge('stakeholder/tradingdetails/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('stakeholder/tradingdetails');

		if ( ! $stakeholder_Tradingdetail = Model_Stakeholder_Tradingdetail::find($id))
		{
			Session::set_flash('error', 'Could not find stakeholder_Tradingdetail #'.$id);
			Response::redirect('stakeholder/tradingdetails');
		}

		$val = Model_Stakeholder_Tradingdetail::validate('edit');

		if ($val->run())
		{
			$stakeholder_Tradingdetail->name = Input::post('name');
			$stakeholder_Tradingdetail->additional_details = Input::post('additional_details');

			if ($stakeholder_Tradingdetail->save())
			{
				Session::set_flash('success', 'Updated stakeholder_Tradingdetail #' . $id);

				Response::redirect('stakeholder/tradingdetails');
			}

			else
			{
				Session::set_flash('error', 'Could not update stakeholder_Tradingdetail #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$stakeholder_Tradingdetail->name = $val->validated('name');
				$stakeholder_Tradingdetail->additional_details = $val->validated('additional_details');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('stakeholder_Tradingdetail', $stakeholder_Tradingdetail, false);
		}

		$this->template->title = "Stakeholder_Tradingdetails";
		$this->template->content = View::forge('stakeholder/tradingdetails/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('stakeholder/tradingdetails');

		if ($stakeholder_Tradingdetail = Model_Stakeholder_Tradingdetail::find($id))
		{
			$stakeholder_Tradingdetail->delete();

			Session::set_flash('success', 'Deleted stakeholder_Tradingdetail #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete stakeholder_Tradingdetail #'.$id);
		}

		Response::redirect('stakeholder/tradingdetails');

	}

}
