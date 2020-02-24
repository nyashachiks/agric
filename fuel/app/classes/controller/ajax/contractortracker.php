<?php
class Controller_Ajax_Contractortracker extends Controller_Rest
{

	public function action_index()
	{
		$data['contractortrackers'] = Model_Contractortracker::find('all');
		$this->template->title = "Contractortrackers";
		$this->template->content = View::forge('contractortracker/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('contractortracker');

		if ( ! $data['contractortracker'] = Model_Contractortracker::find($id))
		{
			Session::set_flash('error', 'Could not find contractortracker #'.$id);
			Response::redirect('contractortracker');
		}

		$this->template->title = "Contractortracker";
		$this->template->content = View::forge('contractortracker/view', $data);

	}

	public function post_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Contractortracker::validate('create');

			if ($val->run())
			{
				$contractortracker = Model_Contractortracker::forge(array(
					'contracttracker_id' => Input::post('contracttracker_id'),
					'notes' => Input::post('notes'),
					'date' => Input::post('date'),
					'status' => Input::post('status'),
				));

				if ($contractortracker and $contractortracker->save())
				{
					return TRUE;
				}

				else
				{
					return FALSE;
				}
			}
			else
			{
				return $val->error();
			}
		}

		//$this->template->title = "Contractortrackers";
		//$this->template->content = View::forge('contractortracker/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('contractortracker');

		if ( ! $contractortracker = Model_Contractortracker::find($id))
		{
			Session::set_flash('error', 'Could not find contractortracker #'.$id);
			Response::redirect('contractortracker');
		}

		$val = Model_Contractortracker::validate('edit');

		if ($val->run())
		{
			$contractortracker->contracttracker_id = Input::post('contracttracker_id');
			$contractortracker->notes = Input::post('notes');
			$contractortracker->date = Input::post('date');
			$contractortracker->status = Input::post('status');

			if ($contractortracker->save())
			{
				Session::set_flash('success', 'Updated contractortracker #' . $id);

				Response::redirect('contractortracker');
			}

			else
			{
				Session::set_flash('error', 'Could not update contractortracker #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$contractortracker->contracttracker_id = $val->validated('contracttracker_id');
				$contractortracker->notes = $val->validated('notes');
				$contractortracker->date = $val->validated('date');
				$contractortracker->status = $val->validated('status');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('contractortracker', $contractortracker, false);
		}

		$this->template->title = "Contractortrackers";
		$this->template->content = View::forge('contractortracker/edit');

	}

	public function delete_note($id = null)
	{
		//is_null($id) and Response::redirect('contractortracker');

		if ($contractortracker = Model_Contractortracker::find($id))
		{
			$contractortracker->delete();
			return TRUE;
			//Session::set_flash('success', 'Deleted contractortracker #'.$id);
		}

		else
		{
			return FALSE;
			//Session::set_flash('error', 'Could not delete contractortracker #'.$id);
		}

		//Response::redirect('contractortracker');

	}

}
